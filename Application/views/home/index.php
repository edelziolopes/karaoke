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
