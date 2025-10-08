<?php

use Application\core\Controller;

class Home extends Controller
{

  public function index()
  {
    $Generos = $this->model('Generos');
    $data = $Generos::listarTudo();
    $this->view('/home/index', ['generos' => $data]);
  }
  public function genero($id)
  {
    $Generos = $this->model('Generos');
    $dataGeneros = $Generos::listarTudo();

    $Musicas = $this->model('Musicas');
    $dataMusicas = $Musicas::listarGenero($id);

    $this->view('/home/genero', [
      'generos' => $dataGeneros,
      'musicas' => $dataMusicas      
    ]);
  }
  public function like($id){
    $Vinculos = $this->model('Vinculos');
    $dataVinculos = $Vinculos::like($id);

    redirect('/home/musica/'.$dataVinculos->id_musica);
  }

  public function musica($id)
  {
    $Musicas = $this->model('Musicas');
    $dataMusicas = $Musicas::listarMusica($id);
    
    $Comentarios = $this->model('Comentarios');
    $dataComentarios = $Comentarios::listarTudo($id);

    $Vinculos = $this->model('Vinculos');
    $dataVinculos = $Vinculos::listarTudo($id);

    $this->view('/home/musica', [
      'musica' => $dataMusicas, 
      'comentarios' => $dataComentarios,
      'vinculos' => $dataVinculos
    ]);
  }


  public function cadastro()
  {
    $this->view('/home/cadastro');
  }
  public function login()
  {
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          $email = $_POST['txt_email'];
          $senha = $_POST['txt_senha'];

          $Usuarios = $this->model('Usuarios');
          $usuario = $Usuarios::verificaLogin($email);

          if ($usuario && password_verify($senha, $usuario->senha)) {
              session_start();
              $_SESSION['usuario_logado'] = $usuario;
              $this->redirect('/home');
          } else {
              $this->view('/home/login', ['erro' => 'Email ou senha inválidos.']);
          }
      } else {
          $this->view('/home/login');
      }
  }
  public function cantar($id)
  {
      // Garante que o usuário esteja logado para acessar esta página
      if (!isset($_SESSION['usuario_logado'])) {
          $this->redirect('/home/login');
          return;
      }

      $Musicas = $this->model('Musicas');
      // Usamos listarMusica que já retorna os dados da música específica
      $dataMusica = $Musicas::listarMusica($id);

      // Se a música não for encontrada, redireciona para a home
      if (empty($dataMusica)) {
          $this->redirect('/home');
          return;
      }

      // Passa os dados da música (apenas o primeiro resultado) para a view
      $this->view('/home/cantar', ['musica' => $dataMusica[0]]);
  }

  public function salvarPerformance($id_musica)
  {
      // Valida se a requisição é válida
      if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_SESSION['usuario_logado']) || !isset($_FILES['audio_file']) || $_FILES['audio_file']['error'] != 0) {
          // Se a requisição for inválida, retorna um erro "Bad Request"
          http_response_code(400); 
          exit;
      }

      // Processa o upload
      $uploadDir = 'audios/';
      if (!is_dir($uploadDir)) {
          mkdir($uploadDir, 0777, true);
      }
      $fileName = uniqid() . '-' . time() . '.webm';
      $uploadFile = $uploadDir . $fileName;

      if (move_uploaded_file($_FILES['audio_file']['tmp_name'], $uploadFile)) {
          // Se o upload do arquivo funcionou, salva no banco
          $id_usuario = $_SESSION['usuario_logado']->id;
          $nota = rand(50, 100);
          $audio = $fileName;

          $Vinculos = $this->model('Vinculos');
          $Vinculos::salvar($id_usuario, $id_musica, $nota, $audio);

          // Se tudo deu certo, retorna um código "OK"
          http_response_code(200);
          exit;

      } else {
          // Se houve uma falha ao mover o arquivo, retorna um erro de servidor
          http_response_code(500); 
          exit;
      }
  }

}
