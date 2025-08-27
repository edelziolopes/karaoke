<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <title>Simple Framework</title>
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
  </head>
    <style>
        .genre-card-container {
            display: flex;
            justify-content: center;
            gap: 2rem;
            flex-wrap: wrap;
        }
        .genre-circle {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            overflow: hidden;
            position: relative;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease-in-out;
            margin-bottom: 1rem; /* Espaçamento entre as linhas */
        }
        .genre-circle:hover {
            transform: scale(1.05);
        }
        .genre-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .genre-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .genre-link {
            color: #fff;
            text-decoration: none;
            font-weight: bold;
            font-size: 1.25rem;
            text-transform: uppercase;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.7);
        }
        .genre-card {
            display: none; /* Inicia com todos os cards escondidos */
        }
        .d-flex.justify-content-center.mt-4 {
            gap: 1rem;
        }
    </style>   
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
