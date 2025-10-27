<div class="bg-gray-900 text-white p-6 md:p-8 font-sans">
  <!-- Título da seção -->
  <div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl md:text-3xl font-bold text-gray-100">Gêneros</h2>
    <!-- Botões de navegação do carrossel -->
    <div class="flex space-x-2">
      <button id="scroll-left-btn" class="p-2 rounded-full bg-gray-800 text-gray-400 hover:bg-gray-700 hover:text-white transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-900 focus:ring-gray-500">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
          <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
        </svg>
      </button>
      <button id="scroll-right-btn" class="p-2 rounded-full bg-gray-800 text-gray-400 hover:bg-gray-700 hover:text-white transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-900 focus:ring-gray-500">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
          <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
        </svg>
      </button>
    </div>
  </div>

  <!-- Carrossel deslizante de Gêneros -->
  <div id="genres-carousel" class="flex overflow-x-auto gap-4 p-2 -m-2 scrollbar-hide scroll-smooth">
    <?php foreach ($data['generos'] as $genero) { ?>
      <!-- Card do Gênero -->
      <a href="/home/genero/<?= $genero['id'] ?>#<?= $genero['id'] ?>" class="flex-shrink-0 w-32 md:w-40 group cursor-pointer" id="genre-<?= $genero['id'] ?>">
        <div class="relative w-full h-32 md:h-40 overflow-hidden rounded-full shadow-lg">
          <img src="<?= $genero['imagem'] ?>" alt="Imagem de <?= $genero['nome'] ?>" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-300">
          <div class="absolute inset-0 rounded-full ring-2 ring-inset ring-gray-600 group-hover:ring-white transition-colors duration-200"></div>
        </div>
        <div class="mt-4 text-center">
          <h3 class="text-lg font-semibold text-gray-200 group-hover:text-white transition-colors duration-200 truncate">
            <?= $genero['nome'] ?>
          </h3>
          <p class="text-sm text-gray-400">Gênero</p>
        </div>
      </a>
    <?php } ?>
  </div>

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

  <div class="text-gray-200 p-8 font-sans">
    <div class="text-center mb-12">
      <h2 class="text-4xl font-bold text-yellow-400">Avisos Importantes</h2>
      <p class="text-gray-400 mt-2">Fique por dentro de todos os detalhes do nosso evento!</p>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

      <div class="bg-black p-6 rounded-xl shadow-lg border border-gray-700 hover:border-yellow-400 transition-all duration-300">
        <div class="flex items-center mb-4">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-yellow-400 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
          <h3 class="text-2xl font-semibold text-white">O Desafio</h3>
        </div>
        <p class="text-gray-300">
          Participe do nosso <strong>"Desafio do Melhor Cantor"</strong> no dia <strong>30 de Outubro</strong>. O evento acontecerá na Feira de Ciências da <strong>Escola Estadual Deputado Domingos de Figueiredo</strong>.
        </p>
      </div>

      <div class="bg-black p-6 rounded-xl shadow-lg border border-gray-700 hover:border-yellow-400 transition-all duration-300">
        <div class="flex items-center mb-4">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-yellow-400 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M12 6V3m0 18v-3m6-6h3m-3 6h3M6 12H3m9-9V3" /></svg>
          <h3 class="text-2xl font-semibold text-white">Avaliação com IA</h3>
        </div>
        <p class="text-gray-300">
          Uma <strong>Inteligência Artificial</strong> analisará sua performance em tempo real, avaliando critérios como <strong>afinação</strong> e <strong>precisão rítmica</strong> para garantir uma competição inovadora e justa.
        </p>
      </div>

      <div class="bg-black p-6 rounded-xl shadow-lg border border-gray-700 hover:border-yellow-400 transition-all duration-300">
        <div class="flex items-center mb-4">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-yellow-400 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z" /></svg>
          <h3 class="text-2xl font-semibold text-white">Premiação</h3>
        </div>
        <p class="text-gray-300">
          Aqueça a sua voz e dê o seu melhor! Os <strong>5 melhores cantores</strong>, de acordo com a pontuação da nossa IA, serão reconhecidos e premiados no evento. Não fique de fora!
        </p>
      </div>

    </div>
  </div>
  <div class="mt-20">
    <h2 class="text-3xl font-semibold text-yellow-400 mb-10 text-center">Equipe Desenvolvedora - 3º Ano Sistemas</h2>
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-6 gap-8 text-center">

      <div class="flex flex-col items-center group relative">
        <div class="w-32 h-32 bg-gray-800 rounded-full flex items-center justify-center mb-4 border-2 border-gray-700 shadow-lg overflow-hidden">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-500" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" /></svg>
        </div>
        <h3 class="font-medium text-white text-lg">Isaac</h3>
        <span class="absolute bottom-full mb-2 hidden group-hover:block px-3 py-1 bg-gray-700 text-white text-sm rounded-md shadow-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300">Função: Desenvolvedor Backend</span>
      </div>

      <div class="flex flex-col items-center group relative">
        <div class="w-32 h-32 bg-gray-800 rounded-full flex items-center justify-center mb-4 border-2 border-gray-700 shadow-lg overflow-hidden">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-500" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" /></svg>
        </div>
        <h3 class="font-medium text-white text-lg">Pedro</h3>
        <span class="absolute bottom-full mb-2 hidden group-hover:block px-3 py-1 bg-gray-700 text-white text-sm rounded-md shadow-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300">Função: Desenvolvedor Frontend</span>
      </div>

      <div class="flex flex-col items-center group relative">
        <div class="w-32 h-32 bg-gray-800 rounded-full flex items-center justify-center mb-4 border-2 border-gray-700 shadow-lg overflow-hidden">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-500" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" /></svg>
        </div>
        <h3 class="font-medium text-white text-lg">Guilherme</h3>
        <span class="absolute bottom-full mb-2 hidden group-hover:block px-3 py-1 bg-gray-700 text-white text-sm rounded-md shadow-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300">Função: Gerente de Banco de Dados</span>
      </div>

      <div class="flex flex-col items-center group relative">
        <div class="w-32 h-32 bg-gray-800 rounded-full flex items-center justify-center mb-4 border-2 border-yellow-400 shadow-lg overflow-hidden">
          <img src="https://jornalvozativa.com/wp-content/uploads/2024/06/jornal-voz-ativa-ouro-preto-mg-minas-gerais-op-materia-ha-15-anos-michael-jackson-nos-deixava-relembre-10-momentos-que-marcaram-a-carreira-do-astro-do-pop-25062024164823.jpg" alt="Foto de Michael Jackson" class="w-full h-full object-cover">
        </div>
        <h3 class="font-medium text-white text-lg">Kauã</h3>
        <span class="absolute bottom-full mb-2 hidden group-hover:block px-3 py-1 bg-gray-700 text-white text-sm rounded-md shadow-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300">Função: Especialista em IA</span>
      </div>

      <div class="flex flex-col items-center group relative">
        <div class="w-32 h-32 bg-gray-800 rounded-full flex items-center justify-center mb-4 border-2 border-gray-700 shadow-lg overflow-hidden">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-500" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" /></svg>
        </div>
        <h3 class="font-medium text-white text-lg">Francisco</h3>
        <span class="absolute bottom-full mb-2 hidden group-hover:block px-3 py-1 bg-gray-700 text-white text-sm rounded-md shadow-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300">Função: Designer UX/UI</span>
      </div>

      <div class="flex flex-col items-center group relative">
        <div class="w-32 h-32 bg-gray-800 rounded-full flex items-center justify-center mb-4 border-2 border-gray-700 shadow-lg overflow-hidden">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-500" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" /></svg>
        </div>
        <h3 class="font-medium text-white text-lg">Hélio</h3>
        <span class="absolute bottom-full mb-2 hidden group-hover:block px-3 py-1 bg-gray-700 text-white text-sm rounded-md shadow-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300">Função: Testador e Qualidade</span>
      </div>

    </div>
  </div>
</main>

  <!-- Lógica JavaScript para navegação -->
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const carousel = document.getElementById('genres-carousel');
      const scrollLeftBtn = document.getElementById('scroll-left-btn');
      const scrollRightBtn = document.getElementById('scroll-right-btn');
      const scrollAmount = 300; // Ajuste este valor para controlar a quantidade de rolagem

      scrollRightBtn.addEventListener('click', () => {
        carousel.scrollBy({ left: scrollAmount, behavior: 'smooth' });
      });

      scrollLeftBtn.addEventListener('click', () => {
        carousel.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
      });
    });
  </script>
  
  <!-- Estilos para esconder a barra de rolagem, compatível com navegadores modernos -->
  <style>
    .scrollbar-hide::-webkit-scrollbar {
      display: none;
    }
    .scrollbar-hide {
      -ms-overflow-style: none; /* IE and Edge */
      scrollbar-width: none;  /* Firefox */
    }
  </style>
</div>
