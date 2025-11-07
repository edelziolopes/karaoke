<?php
// teste.php

echo "Iniciando teste de shell_exec...<br>";

if (function_exists('shell_exec')) {
    echo "Função shell_exec() EXISTE.<br>";
    
    // Tenta executar um comando simples e seguro (listar arquivos)
    $output = shell_exec('ls -l'); 
    // Se estiver no Windows, troque 'ls -l' por 'dir'
    // $output = shell_exec('dir'); 

    if ($output === null) {
        echo "Comando executou, mas não retornou nada (talvez esteja desabilitado no php.ini).<br>";
    } else if (empty($output)) {
         echo "Comando executou, mas não retornou nada (provavelmente desabilitado).<br>";
    } else {
        echo "<b>SUCESSO! shell_exec() está funcionando!</b><br>";
        echo "<pre>$output</pre>";
    }

} else {
    echo "<b>FALHA: Função shell_exec() NÃO EXISTE ou está desabilitada.</b>";
}
?>