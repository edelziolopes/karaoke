<?php
    ob_start();
    require '../Application/autoload.php';
    use Application\core\App;
    use Application\core\Controller;
    $rota = filter_input(INPUT_SERVER, 'REQUEST_URI');
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
    <nav class="bg-gray-900 shadow-md">
      <div class="container mx-auto px-4 py-3 flex justify-between items-center">
        <a href="/home" class="text-white font-bold text-xl flex items-center gap-2">
          <i class="fas fa-microphone"></i> Karaokê
        </a>
        <ul class="flex space-x-6">
          <li><a href="/home" class="hover:text-yellow-400 flex items-center gap-1"><i class="fas fa-home"></i> Home</a></li>
          <li><a href="/cadastro" class="hover:text-yellow-400 flex items-center gap-1"><i class="fas fa-user-plus"></i> Cadastro</a></li>
          <li><a href="/login" class="hover:text-yellow-400 flex items-center gap-1"><i class="fas fa-sign-in-alt"></i> Login</a></li>

          <!-- ADM Dropdown -->
          <li class="relative group">
            <button id="admDropdown" class="flex items-center hover:text-yellow-400 focus:outline-none gap-1">
              <i class="fas fa-cog"></i> ADM <i class="fas fa-caret-down ml-1"></i>
            </button>
            <ul id="admMenu" class="absolute left-0 mt-2 w-44 bg-gray-800 text-white rounded-lg shadow-lg hidden z-50">
              <li><a href="/genero" class="block px-4 py-2 hover:bg-gray-700 flex items-center gap-2"><i class="fas fa-music"></i> Gêneros</a></li>
              <li><a href="/musica" class="block px-4 py-2 hover:bg-gray-700 flex items-center gap-2"><i class="fas fa-headphones"></i> Músicas</a></li>
              <li><a href="/usuario" class="block px-4 py-2 hover:bg-gray-700 flex items-center gap-2"><i class="fas fa-users"></i> Usuários</a></li>
              <li><a href="/vinculo" class="block px-4 py-2 hover:bg-gray-700 flex items-center gap-2"><i class="fas fa-link"></i> Vínculos</a></li>
            </ul>
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
      document.addEventListener("DOMContentLoaded", () => {
        const button = document.getElementById("admDropdown");
        const menu = document.getElementById("admMenu");

        button.addEventListener("click", () => {
          menu.classList.toggle("hidden");
        });

        document.addEventListener("click", (e) => {
          if (!button.contains(e.target) && !menu.contains(e.target)) {
            menu.classList.add("hidden");
          }
        });

        // Carrossel automático
        const carousel = document.getElementById("carousel");
        const totalSlides = carousel.children.length;
        let index = 0;
        setInterval(() => {
          index = (index + 1) % totalSlides;
          carousel.style.transform = `translateX(-${index * 100}%)`;
        }, 5000);
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
