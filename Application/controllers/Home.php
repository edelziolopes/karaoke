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
  public function musica($id)
  {
    $Musicas = $this->model('Musicas');
    $dataMusicas = $Musicas::listarMusica($id);
    
    $Comentarios = $this->model('Comentarios');
    $dataComentarios = $Comentarios::listarTudo($id);

    $Vinculos = $this->model('Vinculos');
    $dataVinculos = $Vinculos::listarTudo();

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

}
