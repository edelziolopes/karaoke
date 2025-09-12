<?php
    ob_start();
    require '../Application/autoload.php';
    use Application\core\App;
    use Application\core\Controller;
    $rota = filter_input(INPUT_SERVER, 'REQUEST_URI');
    session_start();
    $usuarioLogado = isset($_SESSION['usuario_logado']) ? $_SESSION['usuario_logado'] : null;
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <title>Karaokê - Terceiro Sistemas</title>
    <?php if ($rota === '/' || strpos($rota, '/home') === 0): ?>
      <!-- Tailwind + FontAwesome -->
      <script src="https://cdn.tailwindcss.com"></script>
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <?php else: ?>
      <!-- Bootstrap + FontAwesome -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <?php endif; ?>
    <link rel="stylesheet" href="/assets/css/styles.css">
  </head>
  <body class="bg-black text-white">

  <?php if ($rota === '/' || strpos($rota, '/home') === 0): ?>
    <!-- Navbar Tailwind -->
    <nav class="bg-gray-900 text-white shadow-md">
      <div class="container mx-auto px-4 py-3 flex justify-between items-center">
        <a href="/home" class="text-white font-bold text-xl flex items-center gap-2">
          <i class="fas fa-microphone"></i> Karaokê
        </a>
        <ul class="flex items-center space-x-6">
          <li><a href="/home" class="hover:text-yellow-400 flex items-center gap-1"><i class="fas fa-home"></i> Home</a></li>

          <li class="relative">
            <button id="admDropdownButton" class="flex items-center hover:text-yellow-400 focus:outline-none gap-1">
              <i class="fas fa-cog"></i> ADM <i class="fas fa-caret-down ml-1"></i>
            </button>
            <ul id="admDropdownMenu" class="absolute right-0 mt-2 w-44 bg-gray-800 rounded-lg shadow-lg hidden z-50">
              <li><a href="/genero" class="block px-4 py-2 hover:bg-gray-700 flex items-center gap-2"><i class="fas fa-music"></i> Gêneros</a></li>
              <li><a href="/musica" class="block px-4 py-2 hover:bg-gray-700 flex items-center gap-2"><i class="fas fa-headphones"></i> Músicas</a></li>
              <li><a href="/usuario" class="block px-4 py-2 hover:bg-gray-700 flex items-center gap-2"><i class="fas fa-users"></i> Usuários</a></li>
              <li><a href="/vinculo" class="block px-4 py-2 hover:bg-gray-700 flex items-center gap-2"><i class="fas fa-link"></i> Vínculos</a></li>
            </ul>
          </li>

          <li class="relative">
            <?php if ($usuarioLogado): ?>
              <button id="userDropdownButton" class="flex items-center hover:text-yellow-400 focus:outline-none gap-2">
                <?php if (!empty($usuarioLogado->foto)): ?>
                  <img src="/fotos/<?= htmlspecialchars($usuarioLogado->foto) ?>" alt="Foto" class="rounded-full w-[30px] h-[30px] object-cover">
                <?php else: ?>
                  <i class="fas fa-user-circle fa-lg"></i>
                <?php endif; ?>
                <span><?= htmlspecialchars($usuarioLogado->nome) ?></span>
                <i class="fas fa-caret-down ml-1"></i>
              </button>
              <ul id="userDropdownMenu" class="absolute right-0 mt-2 w-48 bg-gray-800 rounded-lg shadow-lg hidden z-50">
                <li><a href="/home/perfil" class="block px-4 py-2 hover:bg-gray-700 flex items-center gap-2"><i class="fas fa-user"></i> Perfil</a></li>
                <li><a href="/usuario/logout" class="block px-4 py-2 hover:bg-gray-700 flex items-center gap-2"><i class="fas fa-sign-out-alt"></i> Sair</a></li>
              </ul>
            <?php else: ?>
              <button id="userDropdownButton" class="flex items-center hover:text-yellow-400 focus:outline-none gap-1">
                <i class="fas fa-user"></i> Usuário <i class="fas fa-caret-down ml-1"></i>
              </button>
              <ul id="userDropdownMenu" class="absolute right-0 mt-2 w-48 bg-gray-800 rounded-lg shadow-lg hidden z-50">
                <li><a href="/home/login" class="block px-4 py-2 hover:bg-gray-700 flex items-center gap-2"><i class="fas fa-sign-in-alt"></i> Login</a></li>
                <li><a href="/home/cadastro" class="block px-4 py-2 hover:bg-gray-700 flex items-center gap-2"><i class="fas fa-user-plus"></i> Cadastrar</a></li>
              </ul>
            <?php endif; ?>
          </li>
        </ul>
      </div>
    </nav>

    <!-- Carrossel Tailwind -->
    <div class="relative w-full overflow-hidden">
      <div id="carousel" class="flex transition-transform duration-1000 ease-in-out">
        <img src="/assets/img/carrossel.png" class="w-full flex-shrink-0" alt="Imagem 1">
        <img src="/assets/img/carrossel.png" class="w-full flex-shrink-0" alt="Imagem 2">
      </div>
    </div>

  <?php else: ?>
    <!-- Navbar Bootstrap -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">
      <div class="container">
        <a class="navbar-brand" href="/home"><i class="fas fa-microphone"></i> Karaokê</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item"><a class="nav-link" href="/home"><i class="fas fa-home"></i> Home</a></li>
            <li class="nav-item"><a class="nav-link" href="/cadastro"><i class="fas fa-user-plus"></i> Cadastro</a></li>
            <li class="nav-item"><a class="nav-link" href="/login"><i class="fas fa-sign-in-alt"></i> Login</a></li>
            <li class="nav-item"><a class="nav-link" href="/genero"><i class="fas fa-music"></i> Gêneros</a></li>
            <li class="nav-item"><a class="nav-link" href="/musica"><i class="fas fa-headphones"></i> Músicas</a></li>
            <li class="nav-item"><a class="nav-link" href="/usuario"><i class="fas fa-users"></i> Usuários</a></li>
            <li class="nav-item"><a class="nav-link" href="/vinculo"><i class="fas fa-link"></i> Vínculos</a></li>
          </ul>
        </div>
      </div>
    </nav>
  <?php endif; ?>

  <?php
    $app = new App();
  ?>

  <?php if ($rota === '/' || strpos($rota, '/home') === 0): ?>
    <!-- Script Dropdown + Carrossel -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // --- LÓGICA DOS DROPDOWNS ---
      
      // Função genérica para controlar qualquer dropdown
      const setupDropdown = (buttonId, menuId) => {
        const button = document.getElementById(buttonId);
        const menu = document.getElementById(menuId);

        // Se o botão não existir na página (ex: usuário não logado), não faz nada
        if (!button || !menu) {
          return;
        }

        button.addEventListener('click', (event) => {
          // Impede que o clique no botão feche o menu imediatamente
          event.stopPropagation();
          // Alterna a visibilidade do menu
          menu.classList.toggle('hidden');
        });
      };

      // Configura os dois dropdowns usando a função
      setupDropdown('admDropdownButton', 'admDropdownMenu');
      setupDropdown('userDropdownButton', 'userDropdownMenu');

      // Fecha os menus se o usuário clicar fora deles
      window.addEventListener('click', () => {
        const admMenu = document.getElementById('admDropdownMenu');
        const userMenu = document.getElementById('userDropdownMenu');
        
        if (admMenu && !admMenu.classList.contains('hidden')) {
          admMenu.classList.add('hidden');
        }
        if (userMenu && !userMenu.classList.contains('hidden')) {
          userMenu.classList.add('hidden');
        }
      });

      // --- LÓGICA DO CARROSSEL ---
      const carousel = document.getElementById("carousel");
      if (carousel) { // Verifica se o carrossel existe na página
        const totalSlides = carousel.children.length;
        let index = 0;
        setInterval(() => {
          index = (index + 1) % totalSlides;
          carousel.style.transform = `translateX(-${index * 100}%)`;
        }, 5000);
      }
    });
  </script>
    <!-- imagem tailwind -->
     Explicar o funcionamento do site aqui
    <footer>
      <div class="bg-gray-900 shadow-inner mt-8 py-6">
        <div class="container mx-auto px-4 text-center text-gray-400">
          <p>&copy; <?php echo date("Y"); ?> Karaokê - Terceiro Sistemas. Todos os direitos reservados.</p>
        </div>
      </div>
    </footer>
  <?php else: ?>
    <!-- Scripts Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <?php endif; ?>
  </body>
</html>
