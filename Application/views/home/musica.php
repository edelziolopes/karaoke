<?php
// Garante que a data seja exibida em português
setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt', 'portuguese');
?>
<div class="bg-black text-white min-h-screen p-4 md:p-8 font-sans">

    <div class="container mx-auto">

        <?php foreach ($data['musica'] as $musica) { ?>

            <div class="bg-gray-900 rounded-xl shadow-2xl overflow-hidden md:flex">
                <div class="md:flex-shrink-0 md:w-[20%]">
                    <img class="h-full w-full object-cover" src="<?= htmlspecialchars($musica['imagem']) ?>" alt="Capa de <?= htmlspecialchars($musica['nome_musica']) ?>">
                </div>
                <div class="p-8 md:w-[30%]">
                    <div>
                        <div class="uppercase tracking-wide text-sm text-yellow-400 font-semibold"><?= htmlspecialchars($musica['nome_genero']) ?></div>
                        <h1 class="block mt-1 text-3xl md:text-4xl leading-tight font-bold text-white"><?= htmlspecialchars($musica['nome_musica']) ?></h1>
                        <p class="mt-2 text-gray-400 text-lg"><?= htmlspecialchars($musica['cantor']) ?></p>
                    </div>
                    <div class="mt-6">
                        <?php if (isset($_SESSION['usuario_logado'])) : ?>
                            <button id="recordBtn" data-musica-id="<?= $musica['id_musica'] ?>" class="w-full text-center bg-green-500 hover:bg-green-600 text-white font-bold py-3 px-6 rounded-lg transition duration-300 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-900 focus:ring-green-500 disabled:bg-gray-500 disabled:cursor-not-allowed">
                                <i class="fas fa-microphone-alt mr-2"></i> Cantar Agora
                            </button>
                            <p id="recording-status" class="text-yellow-400 text-center mt-2 h-6"></p>
                        <?php else : ?>
                            <div class="bg-gray-800 border-l-4 border-yellow-500 p-4 rounded-r-lg">
                                <p class="text-gray-300">
                                    <a href="/home/login" class="font-bold text-yellow-400 hover:underline">Faça login</a> ou <a href="/home/cadastro" class="font-bold text-yellow-400 hover:underline">cadastre-se</a> para cantar.
                                </p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <?php if (isset($_SESSION['usuario_logado'])) : ?>
                    <div class="p-8 md:p-0 md:w-[50%]">
                        <div class="aspect-video h-full">
                            <iframe id="youtube-player" class="w-full h-full" src="https://www.youtube.com/embed/<?= $musica['youtube'] ?>?enablejsapi=1" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

            <div class="mt-12">
                <hr class="border-gray-700">

                <div class="mt-8">
                    <h3 class="text-2xl font-bold text-gray-100 mb-6">Performances dos Usuários 🎤</h3>
                    <?php if (!empty($data['vinculos'])) : ?>
                        <div class="grid md:grid-cols-2 gap-6">
                            <?php foreach ($data['vinculos'] as $vinculo) : ?>
                                <div class="bg-gray-800 rounded-lg overflow-hidden flex">
                                    <div class="w-1/3 md:w-1/4 flex-shrink-0">
                                        <img src="/fotos/<?= htmlspecialchars($vinculo['foto']) ?>" alt="Foto de <?= htmlspecialchars($vinculo['nome_usuario']) ?>" class="h-full w-full object-cover">
                                    </div>
                                    <div class="flex-grow p-4 flex flex-col justify-between">
                                        <div>
                                            <div class="flex justify-between items-start mb-2">
                                                <div>
                                                    <p class="font-bold text-white text-lg"><?= htmlspecialchars($vinculo['nome_usuario']) ?></p>
                                                    <span class="inline-block bg-blue-500 text-white text-xs font-semibold px-2 py-1 rounded-full mt-1">
                                                        <?= htmlspecialchars($vinculo['turma']) ?>
                                                    </span>
                                                </div>
                                                <p class="text-xs text-gray-500 flex-shrink-0 mt-1">
                                                    <?= strftime('%d/%m/%Y', strtotime($vinculo['data'])) ?>
                                                </p>
                                            </div>
                                            <audio controls class="w-full mt-2 user-performance-audio">
                                                <source src="/audios/<?= htmlspecialchars($vinculo['audio']) ?>" type="audio/mpeg">
                                                Seu navegador não suporta o elemento de áudio.
                                            </audio>
                                        </div>
                                        <div class="like-interaction flex items-center justify-center space-x-4 mt-4 pt-3 border-t border-gray-700" data-vinculo-id="<?= $vinculo['id'] ?>" data-user-vote="none">
                                            <a href="/home/like/<?= $musica['id_musica'] ?>/<?= $vinculo['id'] ?>" class="like-btn text-gray-400 hover:text-green-500 text-xl transition-colors"><i class="fas fa-thumbs-up"></i></a>
                                            <span class="like-count font-bold text-lg text-white w-8 text-center"><?= $vinculo['like'] ?? 0 ?></span>
                                            <a href="/home/dislike/<?= $vinculo['id'] ?>" class="dislike-btn text-gray-400 hover:text-red-500 text-xl transition-colors"><i class="fas fa-thumbs-down"></i></a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php else : ?>
                        <div class="bg-gray-800 p-4 rounded-lg text-center">
                            <p class="text-gray-500">Ninguém cantou esta música ainda. Seja o primeiro!</p>
                        </div>
                    <?php endif; ?>
                </div>

                <hr class="border-gray-700 mt-12">

                <div class="mt-8">
                    <h3 class="text-2xl font-bold text-gray-100 mb-4">Deixe seu comentário</h3>
                    <?php if (isset($_SESSION['usuario_logado'])) : ?>
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
                    <?php else : ?>
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
                        <?php if (!empty($data['comentarios'])) : ?>
                            <?php foreach ($data['comentarios'] as $comentario) : ?>
                                <div class="flex items-start space-x-4">
                                    <img src="/fotos/<?= htmlspecialchars($comentario['foto']) ?>" alt="Foto do usuário" class="w-12 h-12 rounded-full object-cover">
                                    <div class="bg-gray-800 p-4 rounded-lg flex-grow">
                                        <div class="flex justify-between items-center">
                                            <p class="font-bold text-white"><?= htmlspecialchars($comentario['nome']) ?></p>
                                            <div class="flex items-center space-x-4">
                                                <p class="text-xs text-gray-500"><?= strftime('%d de %B, %Y', strtotime($comentario['data'])) ?></p>
                                                <?php if (isset($_SESSION['usuario_logado']) && $comentario['id_usuario'] == $_SESSION['usuario_logado']->id) : ?>
                                                    <a href="/comentario/excluir/<?= $comentario['id'] ?>/<?= $musica['id_musica'] ?>" class="bg-red-600 hover:bg-red-700 text-white text-xs font-semibold py-1 px-3 rounded-md transition-colors">
                                                        Excluir 🗑️
                                                    </a>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <p class="mt-2 text-gray-300"><?= htmlspecialchars($comentario['comentario']) ?></p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else : ?>
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

<script>
    // 1. Carrega a API IFrame Player do YouTube de forma assíncrona.
    var tag = document.createElement('script');
    tag.src = "https://www.youtube.com/iframe_api";
    var firstScriptTag = document.getElementsByTagName('script')[0];
    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

    // 2. Variáveis Globais
    let player;
    let mediaRecorder;
    let audioChunks = [];
    const recordBtn = document.getElementById('recordBtn');
    const statusEl = document.getElementById('recording-status');

    // 3. Função chamada pela API do YouTube quando estiver pronta.
    function onYouTubeIframeAPIReady() {
        if (document.getElementById('youtube-player')) {
            player = new YT.Player('youtube-player', {
                // ### CORREÇÃO: Adiciona a origem para evitar erros de cross-origin ###
                playerVars: {
                    'origin': window.location.origin
                },
                events: {
                    'onStateChange': onPlayerStateChange
                }
            });
        }
        setupPerformanceAudioListeners();
    }

    // 4. Listener do botão de gravação
    if (recordBtn) {
        recordBtn.addEventListener('click', async () => {
            if (!mediaRecorder || mediaRecorder.state === 'inactive') {
                // INICIAR GRAVAÇÃO
                try {
                    const stream = await navigator.mediaDevices.getUserMedia({ audio: true });
                    mediaRecorder = new MediaRecorder(stream);
                    mediaRecorder.ondataavailable = event => audioChunks.push(event.data);
                    mediaRecorder.onstop = uploadAudio;
                    mediaRecorder.start();
                    if (player && typeof player.playVideo === 'function') player.playVideo();
                    updateUI('recording');
                } catch (err) {
                    statusEl.textContent = 'Erro: Permissão para microfone negada.';
                    console.error("Erro ao acessar microfone:", err);
                }
            } else {
                // PARAR GRAVAÇÃO
                mediaRecorder.stop();
                if (player && typeof player.stopVideo === 'function') player.stopVideo();
                updateUI('stopped');
            }
        });
    }

    // 5. Função para enviar o áudio gravado
    function uploadAudio() {
        statusEl.textContent = 'Enviando sua performance, aguarde...';
        updateUI('stopped');

        const musicaId = recordBtn.dataset.musicaId;
        const audioBlob = new Blob(audioChunks, { type: 'audio/webm' });
        const formData = new FormData();
        formData.append('audio_file', audioBlob, 'performance.webm');

        fetch(`/home/salvarPerformance/${musicaId}`, {
            method: 'POST',
            body: formData
        })
        .then(response => {
            if (response.ok) {
                statusEl.textContent = 'Sucesso! Atualizando a página...';
                window.location.reload();
            } else {
                throw new Error('O servidor respondeu com um erro.');
            }
        })
        .catch(error => {
            console.error('Falha ao enviar performance:', error);
            statusEl.textContent = 'Ocorreu um erro ao enviar. Tente novamente.';
            updateUI('initial');
        });
        
        audioChunks = [];
    }

    // 6. Função para parar a gravação se o vídeo do YouTube terminar
    function onPlayerStateChange(event) {
        if (event.data === YT.PlayerState.ENDED && mediaRecorder && mediaRecorder.state === 'recording') {
            mediaRecorder.stop();
            updateUI('stopped');
        }
    }

    // 7. Função para atualizar a UI do botão de gravação
    function updateUI(state) {
        if (!recordBtn) return;
        if (state === 'recording') {
            recordBtn.innerHTML = '<i class="fas fa-stop-circle mr-2"></i> Parar Gravação';
            recordBtn.classList.remove('bg-green-500', 'hover:bg-green-600');
            recordBtn.classList.add('bg-red-500', 'hover:bg-red-600');
            statusEl.textContent = 'Gravando... 🎤';
            recordBtn.disabled = false;
        } else if (state === 'stopped') {
            recordBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i> Enviando...';
            recordBtn.disabled = true;
        } else { // 'initial' state
            recordBtn.innerHTML = '<i class="fas fa-microphone-alt mr-2"></i> Cantar Agora';
            recordBtn.classList.remove('bg-red-500', 'hover:bg-red-600');
            recordBtn.classList.add('bg-green-500', 'hover:bg-green-600');
            recordBtn.disabled = false;
        }
    }

    // 8. Função para sincronizar os áudios de performance com o vídeo
    function setupPerformanceAudioListeners() {
        const audioElements = document.querySelectorAll('.user-performance-audio');

        audioElements.forEach(audio => {
            audio.addEventListener('play', () => {
                audioElements.forEach(otherAudio => {
                    if (otherAudio !== audio) {
                        otherAudio.pause();
                    }
                });
                
                if (player && typeof player.playVideo === 'function') {
                    player.playVideo();
                }
            });

            audio.addEventListener('pause', () => {
                if (player && typeof player.pauseVideo === 'function') {
                    player.pauseVideo();
                }
            });

            audio.addEventListener('ended', () => {
                if (player && typeof player.pauseVideo === 'function') {
                    player.pauseVideo();
                }
            });
        });
    }

</script>
