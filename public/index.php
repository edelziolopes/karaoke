<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <title>Simple Framework</title>
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
  </head>
  <body>
    <ul>
      <li><a href="/home">Home</a></li>
      <li><a href="/genero">Generos</a></li>
      <li><a href="/musica">Músicas</a></li>
      <li><a href="/vinculo">Vinculos</a></li>
      <li><a href="/usuario">Usuário</a></li>
    </ul>

  <?php
    require '../Application/autoload.php';

    use Application\core\App;
    use Application\core\Controller;

    $app = new App();

  ?>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="/assets/js/jquery.slim.min.js"></script>
  <script src="/assets/js/bootstrap.min.js"></script>
  </body>
</html>
