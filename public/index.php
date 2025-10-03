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
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <title>Karaokê - Terceiro Sistemas</title>
    <?php if ($rota === '/' || strpos($rota, '/home') === 0): ?>
      <script src="https://cdn.tailwindcss.com"></script>
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <?php else: ?>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <?php endif; ?>
    <link rel="stylesheet" href="/assets/css/styles.css">
  </head>
  <body class="bg-black text-white">

  <?php if ($rota === '/' || strpos($rota, '/home') === 0): ?>
    <nav class="bg-gray-900 text-white shadow-md">
      <div class="container mx-auto px-4 py-3">
        <div class="flex justify-between items-center">
          <a href="/home" class="text-white font-bold text-xl flex items-center gap-2">
            <i class="fas fa-microphone"></i> Karaokê
          </a>
          
          <ul class="hidden md:flex items-center space-x-6">
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

          <div class="md:hidden">
            <button id="mobile-menu-button" class="text-white focus:outline-none">
              <i class="fas fa-bars fa-lg"></i>
            </button>
          </div>
        </div>
      </div>
      
      <div id="mobile-menu" class="hidden md:hidden px-4 pb-3">
        <ul class="flex flex-col space-y-2">
          <li><a href="/home" class="block py-2 px-2 rounded hover:bg-gray-700 flex items-center gap-2"><i class="fas fa-home"></i> Home</a></li>
          <li class="border-t border-gray-700 pt-2">
            <span class="px-2 text-gray-400 text-sm font-bold">ADM</span>
          </li>
          <li><a href="/genero" class="block py-2 px-2 rounded hover:bg-gray-700 flex items-center gap-2"><i class="fas fa-music"></i> Gêneros</a></li>
          <li><a href="/musica" class="block py-2 px-2 rounded hover:bg-gray-700 flex items-center gap-2"><i class="fas fa-headphones"></i> Músicas</a></li>
          <li><a href="/usuario" class="block py-2 px-2 rounded hover:bg-gray-700 flex items-center gap-2"><i class="fas fa-users"></i> Usuários</a></li>
          <li><a href="/vinculo" class="block py-2 px-2 rounded hover:bg-gray-700 flex items-center gap-2"><i class="fas fa-link"></i> Vínculos</a></li>
          <li class="border-t border-gray-700 pt-2">
            <span class="px-2 text-gray-400 text-sm font-bold">Usuário</span>
          </li>
          <?php if ($usuarioLogado): ?>
            <li><a href="/home/perfil" class="block py-2 px-2 rounded hover:bg-gray-700 flex items-center gap-2"><i class="fas fa-user"></i> Perfil</a></li>
            <li><a href="/usuario/logout" class="block py-2 px-2 rounded hover:bg-gray-700 flex items-center gap-2"><i class="fas fa-sign-out-alt"></i> Sair</a></li>
          <?php else: ?>
            <li><a href="/home/login" class="block py-2 px-2 rounded hover:bg-gray-700 flex items-center gap-2"><i class="fas fa-sign-in-alt"></i> Login</a></li>
            <li><a href="/home/cadastro" class="block py-2 px-2 rounded hover:bg-gray-700 flex items-center gap-2"><i class="fas fa-user-plus"></i> Cadastrar</a></li>
          <?php endif; ?>
        </ul>
      </div>
    </nav>
    
    <div class="relative w-full overflow-hidden">
      <div id="carousel" class="flex transition-transform duration-1000 ease-in-out">
        <img src="/assets/img/carrossel.png" class="w-full flex-shrink-0" alt="Imagem 1">
        <img src="/assets/img/carrossel.png" class="w-full flex-shrink-0" alt="Imagem 2">
      </div>
    </div>

  <?php else: ?>
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
  <main class="container mx-auto px-4 py-12">
    <div class="text-center mb-12">
        <h1 class="text-4xl md:text-5xl font-bold text-yellow-400 mb-4">Projeto Karaokê: A Voz da Tecnologia</h1>
        <p class="text-lg md:text-xl text-gray-300 max-w-3xl mx-auto">
            Uma aplicação desenvolvida para a Feira de Ciências da <strong>Escola Estadual Deputado Domingos de Figueiredo</strong>, unindo música, competição e inteligência artificial.
        </p>
    </div>

    <div class="mb-16 p-8 bg-gray-900 rounded-lg shadow-xl border border-gray-700 text-center">
        <h2 class="text-3xl font-semibold text-white mb-4"><i class="fas fa-trophy text-yellow-400"></i> O Desafio do Melhor Cantor</h2>
        <p class="text-gray-300 text-lg">
            Aqueça sua voz e participe! No dia <strong>30 de Outubro</strong>, vamos premiar os <strong>5 melhores cantores</strong>. O grande diferencial? Sua performance será analisada em tempo real por uma <strong>Inteligência Artificial</strong> que avalia sua afinação e precisão rítmica, garantindo uma competição justa e inovadora.
        </p>
    </div>

    <div class="text-left max-w-4xl mx-auto mb-16">
        <h2 class="text-3xl font-semibold text-yellow-400 mb-6 text-center">Arquitetura e Tecnologias</h2>
        <div class="bg-gray-900 p-6 rounded-lg border border-gray-700 shadow-lg">
            <p class="text-gray-300 mb-4">
                Este APP foi estruturado sobre o padrão de arquitetura <strong>MVC (Model-View-Controller)</strong>, que promove a separação de responsabilidades entre a lógica de negócio (Model), a interface do usuário (View) e o controle da aplicação (Controller). Essa abordagem resulta em um código mais organizado, escalável e de fácil manutenção.
            </p>
            <ul class="list-none space-y-3">
                <li class="flex items-start"><i class="fas fa-cogs text-yellow-400 mt-1 mr-3"></i><span class="text-gray-200"><strong>Backend:</strong> Construído em <strong>PHP</strong>, gerenciando todas as regras de negócio, autenticação e interações com o servidor.</span></li>
                <li class="flex items-start"><i class="fas fa-database text-yellow-400 mt-1 mr-3"></i><span class="text-gray-200"><strong>Banco de Dados:</strong> Utiliza <strong>MySQL</strong> para a persistência e gerenciamento de dados como usuários, músicas e pontuações.</span></li>
                <li class="flex items-start"><i class="fas fa-desktop text-yellow-400 mt-1 mr-3"></i><span class="text-gray-200"><strong>Frontend:</strong> A interface principal foi desenvolvida com <strong>Tailwind CSS</strong>, um framework utility-first que permite a criação de designs modernos e responsivos com agilidade.</span></li>
                <li class="flex items-start"><i class="fas fa-robot text-yellow-400 mt-1 mr-3"></i><span class="text-gray-200"><strong>Inteligência Artificial:</strong> O coração do projeto. Um sistema de IA processa o áudio do cantor para fornecer uma pontuação precisa da performance vocal.</span></li>
            </ul>
        </div>
    </div>

    <div>
        <h2 class="text-3xl font-semibold text-yellow-400 mb-8 text-center">Equipe Desenvolvedora - 3º Ano Sistemas</h2>
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-6 gap-8 text-center">
            
            <div class="flex flex-col items-center">
                <div class="w-28 h-28 bg-gray-800 rounded-full flex items-center justify-center mb-3 border-2 border-gray-700 shadow-md">
                    <i class="fas fa-user fa-3x text-gray-500"></i>
                </div>
                <h3 class="font-medium text-white text-lg">Isaac</h3>
            </div>

            <div class="flex flex-col items-center">
                <div class="w-28 h-28 bg-gray-800 rounded-full flex items-center justify-center mb-3 border-2 border-gray-700 shadow-md">
                    <i class="fas fa-user fa-3x text-gray-500"></i>
                </div>
                <h3 class="font-medium text-white text-lg">Pedro</h3>
            </div>

            <div class="flex flex-col items-center">
                <div class="w-28 h-28 bg-gray-800 rounded-full flex items-center justify-center mb-3 border-2 border-gray-700 shadow-md">
                    <i class="fas fa-user fa-3x text-gray-500"></i>
                </div>
                <h3 class="font-medium text-white text-lg">Guilherme</h3>
            </div>

            <div class="flex flex-col items-center">
                <div class="w-28 h-28 bg-gray-800 rounded-full flex items-center justify-center mb-3 border-2 border-gray-700 shadow-md">
                    <i class="fas fa-user fa-3x text-gray-500"></i>
                </div>
                <h3 class="font-medium text-white text-lg">Kauã</h3>
            </div>

            <div class="flex flex-col items-center">
                <div class="w-28 h-28 bg-gray-800 rounded-full flex items-center justify-center mb-3 border-2 border-gray-700 shadow-md">
                    <i class="fas fa-user fa-3x text-gray-500"></i>
                </div>
                <h3 class="font-medium text-white text-lg">Francisco</h3>
            </div>

            <div class="flex flex-col items-center">
                <div class="w-28 h-28 bg-gray-800 rounded-full flex items-center justify-center mb-3 border-2 border-gray-700 shadow-md">
                    <i class="fas fa-user fa-3x text-gray-500"></i>
                </div>
                <h3 class="font-medium text-white text-lg">Hélio</h3>
            </div>

        </div>
    </div>
</main>
<?php endif; ?>

  <?php if ($rota === '/' || strpos($rota, '/home') === 0): ?>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
      // --- LÓGICA DO MENU MOBILE (HAMBURGER) ---
      const mobileMenuButton = document.getElementById('mobile-menu-button');
      const mobileMenu = document.getElementById('mobile-menu');

      if (mobileMenuButton && mobileMenu) {
        mobileMenuButton.addEventListener('click', () => {
          mobileMenu.classList.toggle('hidden');
        });
      }

      // --- LÓGICA DOS DROPDOWNS ---
      const setupDropdown = (buttonId, menuId) => {
        const button = document.getElementById(buttonId);
        const menu = document.getElementById(menuId);
        if (!button || !menu) return;

        button.addEventListener('click', (event) => {
          event.stopPropagation();
          menu.classList.toggle('hidden');
        });
      };

      setupDropdown('admDropdownButton', 'admDropdownMenu');
      setupDropdown('userDropdownButton', 'userDropdownMenu');

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
      if (carousel) {
        const totalSlides = carousel.children.length;
        let index = 0;
        setInterval(() => {
          index = (index + 1) % totalSlides;
          carousel.style.transform = `translateX(-${index * 100}%)`;
        }, 5000);
      }
    });
  </script>
    <footer>
      <div class="bg-gray-900 shadow-inner mt-8 py-6">
        <div class="container mx-auto px-4 text-center text-gray-400">
          <p>&copy; <?php echo date("Y"); ?> Karaokê - Terceiro Sistemas. Todos os direitos reservados.</p>
        </div>
      </div>
    </footer>
  <?php else: ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <?php endif; ?>
  </body>
</html>