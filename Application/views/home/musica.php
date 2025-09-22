<div class="bg-black text-white min-h-screen p-4 md:p-8 font-sans">
    
    <div class="container mx-auto">

        <?php 
        // Inicia um loop 'foreach' para iterar sobre cada música presente no array $data['musica'].
        // Para cada item, a variável $musica conterá os dados de uma música.
        foreach ($data['musica'] as $musica) { 
        ?>

            <div class="bg-gray-900 rounded-xl shadow-2xl overflow-hidden md:flex">
                
                <div class="md:flex-shrink-0">
                    <img class="h-64 w-full object-cover md:w-64" src="<?= htmlspecialchars($musica['imagem']) ?>" alt="Capa de <?= htmlspecialchars($musica['nome_musica']) ?>">
                </div>
                
                <div class="p-8 w-full grid grid-cols-1 md:grid-cols-2 md:gap-8 md:items-center">
                    
                    <div>
                        <div>
                            <div class="uppercase tracking-wide text-sm text-yellow-400 font-semibold"><?= htmlspecialchars($musica['nome_genero']) ?></div>
                            <h1 class="block mt-1 text-3xl md:text-4xl leading-tight font-bold text-white"><?= htmlspecialchars($musica['nome_musica']) ?></h1>
                            <p class="mt-2 text-gray-400 text-lg"><?= htmlspecialchars($musica['cantor']) ?></p>
                        </div>

                        <div class="mt-6">
                            <?php 
                            // Verifica se existe uma sessão ativa para 'usuario_logado'.
                            if (isset($_SESSION['usuario_logado'])): 
                            ?>
                                <a href="/home/cantar/<?= $musica['id'] ?>" class="inline-block bg-green-500 hover:bg-green-600 text-white font-bold py-3 px-6 rounded-lg transition duration-300 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-900 focus:ring-green-500">
                                    <i class="fas fa-microphone-alt mr-2"></i> Cantar Agora
                                </a>
                            <?php 
                            // Caso contrário (se o usuário não estiver logado).
                            else: 
                            ?>
                                <div class="bg-gray-800 border-l-4 border-yellow-500 p-4 rounded-r-lg">
                                    <p class="text-gray-300">
                                        <a href="/home/login" class="font-bold text-yellow-400 hover:underline">Faça login</a> ou <a href="/home/cadastro" class="font-bold text-yellow-400 hover:underline">cadastre-se</a> para cantar esta música.
                                    </p>
                                </div>
                            <?php 
                            // Finaliza a estrutura condicional 'if'.
                            endif; 
                            ?>
                        </div>
                    </div>

                    <?php 
                    // Verifica novamente se o usuário está logado para decidir se renderiza esta coluna.
                    if (isset($_SESSION['usuario_logado'])): 
                    ?>
                        <div class="mt-6 md:mt-0 w-full">
                            <div class="aspect-video">
                                <iframe class="w-full h-full" src="https://www.youtube.com/embed/<?= $musica['youtube'] ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                            </div>
                        </div>
                    <?php 
                    // Finaliza a estrutura condicional 'if' para a exibição do vídeo.
                    endif; 
                    ?>

                </div>
            </div>

            <div class="mt-12">
                <hr class="border-gray-700">

                <div class="mt-8">
                    <h3 class="text-2xl font-bold text-gray-100 mb-4">Deixe seu comentário</h3>
                    <?php if (isset($_SESSION['usuario_logado'])): ?>
                        <form action="/comentario/salvar/<?= $musica['id_musica'] ?>" method="POST">
                            <div class="flex items-start space-x-4">
                                <input type="hidden" name="txt_usuario" value="<?= $_SESSION['usuario_logado']->id ?>">
                                <img src="/fotos/<?= htmlspecialchars($_SESSION['usuario_logado']->foto) ?>" class="w-12 h-12 rounded-full object-cover">
                                <div class="flex-grow">
                                    <textarea name="txt_comentario" class="w-full bg-gray-800 border border-gray-700 rounded-lg p-3 text-gray-200 focus:outline-none focus:ring-2 focus:ring-yellow-400" rows="4" placeholder="Escreva o que você achou desta música..." required></textarea>
                                    <div class="text-right mt-2">
                                        <input type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-gray-900 font-bold py-2 px-6 rounded-lg transition duration-300" value="Enviar Comentário">
                                    </div>
                                </div>
                            </div>
                        </form>
                    <?php else: ?>
                        <div class="bg-gray-800 border-l-4 border-yellow-500 p-4 rounded-r-lg">
                            <p class="text-gray-300">
                                <a href="/home/login" class="font-bold text-yellow-400 hover:underline">Faça login</a> para deixar um comentário.
                            </p>
                        </div>
                    <?php 
                    // Finaliza o 'if' do formulário de comentário.
                    endif; 
                    ?>
                </div>

                <div class="mt-10">
                    <h3 class="text-2xl font-bold text-gray-100 mb-6">Comentários</h3>
                    <div class="space-y-6">
                        
                        <?php foreach ($data['comentarios'] as $comentario): ?>
                        <div class="flex items-start space-x-4">
                            <img src="/fotos/<?= htmlspecialchars($comentario['foto']) ?>" alt="Foto do usuário" class="w-12 h-12 rounded-full object-cover">
                            <div class="bg-gray-800 p-4 rounded-lg flex-grow">
                                <div class="flex justify-between items-center">
                                    <p class="font-bold text-white"><?= htmlspecialchars($comentario['nome']) ?></p>
                                    
                                    <div class="flex items-center space-x-4">
                                        <p class="text-xs text-gray-500"><?= date('d \d\e F, Y', strtotime($comentario['data'])) ?></p>
                                        
                                        <button class="bg-red-600 hover:bg-red-700 text-white text-xs font-semibold py-1 px-3 rounded-md transition-colors">
                                            Excluir 🗑️
                                        </button>
                                    </div>
                                </div>
                                <p class="mt-2 text-gray-300">
                                    <?= htmlspecialchars($comentario['comentario']) ?>
                                </p>
                            </div>
                        </div>
                        <?php endforeach; ?>

                        <?php if (empty($data['comentarios'])): ?>
                            <div class="bg-gray-800 p-4 rounded-lg text-center">
                                <p class="text-gray-500">Ainda não há comentários. Seja o primeiro a comentar!</p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

        <?php } ?>
    </div>
</div>