<?php

// PARTE 1: LÓGICA DO BACKEND (PHP)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Content-Type: application/json');
    $response = ['success' => false, 'message' => ''];
    $uploadDir = 'uploads/';
    if (!is_dir($uploadDir)) { if (!@mkdir($uploadDir, 0777, true)) { $response['message'] = 'Falha ao criar o diretório de uploads.'; echo json_encode($response); exit; } }
    if (!isset($_FILES['audio_data'])) { $response['message'] = 'Nenhum arquivo de áudio recebido.';
    } elseif ($_FILES['audio_data']['error'] !== UPLOAD_ERR_OK) { $response['message'] = 'Erro no upload. Código: ' . $_FILES['audio_data']['error'];
    } else {
        $fileName = 'gravacao_' . uniqid() . '.webm';
        $filePath = $uploadDir . $fileName;
        if (move_uploaded_file($_FILES['audio_data']['tmp_name'], $filePath)) {
            $response['success'] = true; $response['message'] = 'Arquivo enviado!'; $response['file_path'] = $filePath;
        } else { $response['message'] = 'Falha ao salvar. Verifique as permissões do diretório.'; }
    }
    echo json_encode($response);
    exit;
}

// ROTINA PARA LISTAR GRAVAÇÕES
$recordingsDir = 'uploads/';
$recordings = [];
if (is_dir($recordingsDir)) {
    $files = array_reverse(glob($recordingsDir . '*.webm'));
    if ($files) { foreach ($files as $file) { $recordings[] = $file; } }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Karaokê PHP - Correção para Mobile</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen p-4">

    <div class="bg-white rounded-lg shadow-xl p-6 w-full max-w-4xl">
        <div id="karaoke-section">
            <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">Karaokê: Photograph - Ed Sheeran</h1>
            <div class="aspect-w-16 aspect-h-9 mb-6 relative" style="padding-bottom: 56.25%;">
                <iframe id="youtubePlayer" width="100%" height="100%" src="https://www.youtube.com/embed/mgrKU6PwRcU?enablejsapi=1" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen class="absolute top-0 left-0 w-full h-full rounded-lg"></iframe>
            </div>
            <hr class="my-6 border-gray-300">
            <div class="flex flex-col items-center gap-4 mb-6">
                <div class="flex gap-4">
                    <button id="startButton" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg shadow-md transition duration-300 ease-in-out">Iniciar Karaokê</button>
                    <button id="stopButton" disabled class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-6 rounded-lg shadow-md transition duration-300 ease-in-out opacity-50 cursor-not-allowed">Parar e Enviar</button>
                </div>
                <p id="status" class="text-gray-700 text-lg font-medium">Status: Pronto para começar</p>
                <audio id="audioPlayback" controls class="mt-4 hidden w-full"></audio>
            </div>
        </div>

        <hr class="my-10 border-gray-300 border-dashed">

        <div id="playlist-section">
            <h2 class="text-2xl font-semibold text-gray-700 mb-4 text-center">Gravações da Comunidade</h2>
            <div class="max-h-96 overflow-y-auto pr-2">
                <?php if (empty($recordings)): ?>
                    <p class="text-center text-gray-500">Nenhuma gravação encontrada. Seja o primeiro!</p>
                <?php else: ?>
                    <ul class="space-y-4">
                        <?php foreach ($recordings as $recording): ?>
                            <li class="bg-gray-50 p-3 rounded-lg border border-gray-200 flex flex-col sm:flex-row items-center justify-between gap-4">
                                <span class="font-mono text-gray-800 text-sm"><?php echo htmlspecialchars(basename($recording)); ?></span>
                                <audio controls src="<?php echo htmlspecialchars($recording); ?>" class="w-full sm:w-64"></audio>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script>
        const startButton = document.getElementById('startButton');
        const stopButton = document.getElementById('stopButton');
        const status = document.getElementById('status');
        const audioPlayback = document.getElementById('audioPlayback');
        let player;
        let mediaRecorder;
        let audioChunks = [];

        const tag = document.createElement('script');
        tag.src = "https://www.youtube.com/iframe_api";
        const firstScriptTag = document.getElementsByTagName('script')[0];
        firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
        
        function onYouTubeIframeAPIReady() { player = new YT.Player('youtubePlayer', { events: { 'onStateChange': onPlayerStateChange } }); }
        function onPlayerStateChange(event) { if (event.data == YT.PlayerState.ENDED) { if (mediaRecorder && mediaRecorder.state === 'recording') { mediaRecorder.stop(); status.textContent = 'Vídeo terminou. Processando...'; } } }

        startButton.addEventListener('click', async () => {
            try {
                const stream = await navigator.mediaDevices.getUserMedia({ audio: true });
                
                // ===================================================================
                // INÍCIO DA CORREÇÃO PARA COMPATIBILIDADE MOBILE
                // ===================================================================
                const options = { mimeType: 'audio/webm;codecs=opus' };
                if (!MediaRecorder.isTypeSupported(options.mimeType)) {
                    console.warn(`"${options.mimeType}" não é suportado. Tentando alternativa.`);
                    options.mimeType = 'audio/webm';
                    if (!MediaRecorder.isTypeSupported(options.mimeType)) {
                        console.warn(`"${options.mimeType}" também não é suportado. Usando o padrão do navegador.`);
                        delete options.mimeType;
                    }
                }
                console.log('Usando as seguintes opções para MediaRecorder:', options);
                // ===================================================================
                // FIM DA CORREÇÃO
                // ===================================================================

                mediaRecorder = new MediaRecorder(stream, options); // Passa as 'options' para o construtor
                
                audioChunks = [];
                mediaRecorder.start();
                if (player) { player.seekTo(0); player.playVideo(); }
                
                startButton.disabled = true;
                startButton.classList.add('opacity-50', 'cursor-not-allowed');
                stopButton.disabled = false;
                stopButton.classList.remove('opacity-50', 'cursor-not-allowed');
                status.textContent = 'Status: Gravando voz...';
                audioPlayback.classList.add('hidden');

                mediaRecorder.addEventListener('dataavailable', event => audioChunks.push(event.data));
                mediaRecorder.addEventListener('stop', () => {
                    const audioBlob = new Blob(audioChunks, { type: options.mimeType || 'audio/webm' });
                    audioPlayback.src = URL.createObjectURL(audioBlob);
                    audioPlayback.classList.remove('hidden');
                    uploadRecording(audioBlob);
                    stream.getTracks().forEach(track => track.stop());
                });
            } catch (err) {
                status.textContent = 'Erro: Permissão para microfone negada.';
                console.error("Erro ao acessar microfone:", err);
            }
        });

        stopButton.addEventListener('click', () => {
            if (mediaRecorder && mediaRecorder.state === 'recording') {
                mediaRecorder.stop();
                if (player) { player.pauseVideo(); }
                startButton.disabled = false;
                startButton.classList.remove('opacity-50', 'cursor-not-allowed');
                stopButton.disabled = true;
                stopButton.classList.add('opacity-50', 'cursor-not-allowed');
                status.textContent = 'Status: Parado. Processando...';
            }
        });

        function uploadRecording(audioBlob) {
            const formData = new FormData();
            formData.append('audio_data', audioBlob, 'karaoke_recording.webm');
            status.textContent = 'Status: Enviando gravação para o servidor...';
            fetch('index.php', { method: 'POST', body: formData })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    status.textContent = `Status: Gravação enviada! A página será atualizada.`;
                    setTimeout(() => window.location.reload(), 2000);
                } else {
                    status.textContent = `Status: Erro no envio. ${data.message || 'Erro desconhecido.'}`;
                }
            })
            .catch(error => {
                status.textContent = `Status: Erro crítico ao enviar. Verifique o console (F12).`;
                console.error('Erro no fetch:', error);
            });
        }
    </script>
</body>
</html>