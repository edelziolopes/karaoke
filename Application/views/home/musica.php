<div class="bg-black text-white min-h-screen p-4 md:p-8 font-sans">
    <div class="container mx-auto">

        <?php foreach ($data['musica'] as $musica) { ?>

            <div class="bg-gray-900 rounded-xl shadow-2xl overflow-hidden md:flex">
                <div class="md:flex-shrink-0">
                    <img class="h-64 w-full object-cover md:w-64" src="<?= htmlspecialchars($musica['imagem']) ?>" alt="Capa de <?= htmlspecialchars($musica['nome_musica']) ?>">
                </div>
                <div class="p-8 flex flex-col justify-center">
                    <div>
                        <div class="uppercase tracking-wide text-sm text-yellow-400 font-semibold"><?= htmlspecialchars($musica['nome_genero']) ?></div>
                        <h1 class="block mt-1 text-3xl md:text-4xl leading-tight font-bold text-white"><?= htmlspecialchars($musica['nome_musica']) ?></h1>
                        <p class="mt-2 text-gray-400 text-lg"><?= htmlspecialchars($musica['cantor']) ?></p>
                    </div>

                    <div class="mt-6">
                        <?php if (isset($_SESSION['usuario_logado'])): ?>
                            <a href="/home/cantar/<?= $musica['id'] ?>" class="inline-block bg-green-500 hover:bg-green-600 text-white font-bold py-3 px-6 rounded-lg transition duration-300 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-900 focus:ring-green-500">
                                <i class="fas fa-microphone-alt mr-2"></i> Cantar Agora
                            </a>
                        <?php else: ?>
                            <div class="bg-gray-800 border-l-4 border-yellow-500 p-4 rounded-r-lg">
                                <p class="text-gray-300">
                                    <a href="/home/login" class="font-bold text-yellow-400 hover:underline">Faça login</a> ou <a href="/home/cadastro" class="font-bold text-yellow-400 hover:underline">cadastre-se</a> para cantar esta música.
                                </p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="mt-12">
                <hr class="border-gray-700">

                <div class="mt-8">
                    <h3 class="text-2xl font-bold text-gray-100 mb-4">Deixe seu comentário</h3>
                    <?php if (isset($_SESSION['usuario_logado'])): ?>
                        <form action="/musica/comentar/<?= $musica['id'] ?>" method="POST">
                            <div class="flex items-start space-x-4">
                                <img src="/uploads/foto/<?= htmlspecialchars($_SESSION['usuario_logado']->foto) ?>" alt="Sua foto" class="w-12 h-12 rounded-full object-cover">
                                <div class="flex-grow">
                                    <textarea name="comentario" class="w-full bg-gray-800 border border-gray-700 rounded-lg p-3 text-gray-200 focus:outline-none focus:ring-2 focus:ring-yellow-400" rows="4" placeholder="Escreva o que você achou desta música..." required></textarea>
                                    <div class="text-right mt-2">
                                        <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-gray-900 font-bold py-2 px-6 rounded-lg transition duration-300">
                                            Enviar Comentário
                                        </button>
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
                    <?php endif; ?>
                </div>

                <div class="mt-10">
                    <h3 class="text-2xl font-bold text-gray-100 mb-6">Comentários</h3>
                    <div class="space-y-6">
                        
                        <?php /* foreach ($data['comentarios'] as $comentario): */ ?>
                        <div class="flex items-start space-x-4">
                            <img src="/uploads/foto/exemplo.jpg" alt="Foto do usuário" class="w-12 h-12 rounded-full object-cover">
                            <div class="bg-gray-800 p-4 rounded-lg flex-grow">
                                <div class="flex justify-between items-center">
                                    <p class="font-bold text-white">Nome do Usuário</p>
                                    <p class="text-xs text-gray-500">12 de Setembro, 2025</p>
                                </div>
                                <p class="mt-2 text-gray-300">
                                    Este é um exemplo de comentário para mostrar como a listagem ficaria. Adorei essa música!
                                </p>
                            </div>
                        </div>
                        <?php /* endforeach; */ ?>

                        <?php /* if (empty($data['comentarios'])): */ ?>
                        <div class="bg-gray-800 p-4 rounded-lg text-center">
                            <p class="text-gray-500">Ainda não há comentários. Seja o primeiro a comentar!</p>
                        </div>
                        <?php /* endif; */ ?>
                    </div>
                </div>
            </div>

        <?php } ?>
    </div>
</div>