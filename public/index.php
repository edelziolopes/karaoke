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
  <main class="container mx-auto px-4 py-12 text-gray-200">
      <div class="text-center mb-16">
          <h1 class="text-4xl md:text-5xl font-bold text-yellow-400 mb-4">Projeto Karaokê: A Voz da Tecnologia</h1>
          <p class="text-lg md:text-xl text-gray-300 max-w-3xl mx-auto">
              Uma aplicação desenvolvida para a Feira de Ciências da <strong>Escola Estadual Deputado Domingos de Figueiredo</strong>, unindo música, competição e inteligência artificial.
          </p>
      </div>

      <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 mb-16">
          
          <div class="bg-gray-900 p-8 rounded-lg shadow-xl border border-gray-700 flex flex-col items-center text-center">
              <div class="flex-shrink-0 mb-4">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-yellow-400" viewBox="0 0 24 24" fill="currentColor">
                    <path fill-rule="evenodd" d="M15.625 3.125a.625.625 0 01.625.625v1.875c0 .345-.28.625-.625.625H8.375a.625.625 0 01-.625-.625V3.75a.625.625 0 01.625-.625h7.25zM8.125 8.125a.625.625 0 01.625-.625h6.5a.625.625 0 01.625.625v.625a.625.625 0 01-.625.625h-6.5a.625.625 0 01-.625-.625V8.125zM12 11.25a.625.625 0 01.625.625v5.875a.625.625 0 01-1.25 0V11.875a.625.625 0 01.625-.625zM12 1.25C6.891 1.25 2.75 5.391 2.75 10.5c0 5.108 4.141 9.25 9.25 9.25s9.25-4.142 9.25-9.25C21.25 5.391 17.109 1.25 12 1.25zm0 1.25a8 8 0 100 16 8 8 0 000-16z" clip-rule="evenodd" />
                  </svg>
              </div>
              <h2 class="text-3xl font-semibold text-white mb-4">O Desafio do Melhor Cantor</h2>
              <p class="text-gray-300 text-lg leading-relaxed">
                  Aqueça sua voz e participe! No dia <strong>30 de Outubro</strong>, vamos premiar os <strong>5 melhores cantores</strong>. O grande diferencial? Sua performance será analisada em tempo real por uma <strong>Inteligência Artificial</strong> que avalia sua afinação e precisão rítmica, garantindo uma competição justa e inovadora.
              </p>
          </div>
          
          <div class="bg-gray-900 p-8 rounded-lg shadow-xl border border-gray-700">
              <h2 class="text-3xl font-semibold text-yellow-400 mb-6 text-center">Arquitetura e Tecnologias</h2>
              <p class="text-gray-300 mb-6">
                  Este APP foi estruturado sobre o padrão <strong>MVC (Model-View-Controller)</strong>, resultando em um código mais organizado, escalável e de fácil manutenção.
              </p>
              <ul class="space-y-4">
                  <li class="flex items-start">
                      <div class="flex-shrink-0">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-400 mt-1 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" /></svg>
                      </div>
                      <span class="text-gray-200"><strong>Backend (PHP):</strong> Gerencia todas as regras de negócio, autenticação e interações com o servidor.</span>
                  </li>
                  <li class="flex items-start">
                      <div class="flex-shrink-0">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-400 mt-1 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7a8 8 0 0116 0" /></svg>
                      </div>
                      <span class="text-gray-200"><strong>Banco de Dados (MySQL):</strong> Utilizado para persistência de usuários, músicas e pontuações.</span>
                  </li>
                  <li class="flex items-start">
                      <div class="flex-shrink-0">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-400 mt-1 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z" /></svg>
                      </div>
                      <span class="text-gray-200"><strong>Frontend (Tailwind CSS):</strong> Interface moderna e responsiva criada com agilidade e precisão.</span>
                  </li>
                  <li class="flex items-start">
                      <div class="flex-shrink-0">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-400 mt-1 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                      </div>
                      <span class="text-gray-200"><strong>Inteligência Artificial:</strong> Processa o áudio do cantor para fornecer uma pontuação precisa da performance.</span>
                  </li>
              </ul>
          </div>
      </div>

      <div>
          <h2 class="text-3xl font-semibold text-yellow-400 mb-10 text-center">Equipe Desenvolvedora - 3º Ano Sistemas</h2>
          <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-6 gap-8 text-center">
              
              <div class="flex flex-col items-center">
                  <div class="w-32 h-32 bg-gray-800 rounded-full flex items-center justify-center mb-4 border-2 border-gray-700 shadow-lg overflow-hidden">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-500" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" /></svg>
                  </div>
                  <h3 class="font-medium text-white text-lg">Isaac</h3>
              </div>
              
              <div class="flex flex-col items-center">
                  <div class="w-32 h-32 bg-gray-800 rounded-full flex items-center justify-center mb-4 border-2 border-gray-700 shadow-lg overflow-hidden">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-500" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" /></svg>
                  </div>
                  <h3 class="font-medium text-white text-lg">Pedro</h3>
              </div>

              <div class="flex flex-col items-center">
                  <div class="w-32 h-32 bg-gray-800 rounded-full flex items-center justify-center mb-4 border-2 border-gray-700 shadow-lg overflow-hidden">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-500" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" /></svg>
                  </div>
                  <h3 class="font-medium text-white text-lg">Guilherme</h3>
              </div>

              <div class="flex flex-col items-center">
                  <div class="w-32 h-32 bg-gray-800 rounded-full flex items-center justify-center mb-4 border-2 border-yellow-400 shadow-lg overflow-hidden">
                      <img src="https://jornalvozativa.com/wp-content/uploads/2024/06/jornal-voz-ativa-ouro-preto-mg-minas-gerais-op-materia-ha-15-anos-michael-jackson-nos-deixava-relembre-10-momentos-que-marcaram-a-carreira-do-astro-do-pop-25062024164823.jpg" alt="Foto de Michael Jackson" class="w-full h-full object-cover">
                  </div>
                  <h3 class="font-medium text-white text-lg">Kauã</h3>
              </div>

              <div class="flex flex-col items-center">
                  <div class="w-32 h-32 bg-gray-800 rounded-full flex items-center justify-center mb-4 border-2 border-gray-700 shadow-lg overflow-hidden">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-500" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" /></svg>
                  </div>
                  <h3 class="font-medium text-white text-lg">Francisco</h3>
              </div>

              <div class="flex flex-col items-center">
                  <div class="w-32 h-32 bg-gray-800 rounded-full flex items-center justify-center mb-4 border-2 border-gray-700 shadow-lg overflow-hidden">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-500" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" /></svg>
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