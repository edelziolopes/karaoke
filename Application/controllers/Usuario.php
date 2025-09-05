<?php

use Application\core\Controller;

class Usuario extends Controller
{
  public function index()
  {
    $Usuarios = $this->model('Usuarios');
    $data = $Usuarios::listarTudo();
    $this->view('usuario/index', ['usuarios' => $data]);
  }
  public function salvar()
  {
    $nome = $_POST['txt_nome'];
    $email = $_POST['txt_email'];
    $senha = $_POST['txt_senha'];
    $turma = $_POST['txt_turma'];
    $foto = $_POST['txt_foto'];

    $Usuarios = $this->model('Usuarios');
    $Usuarios::salvar($nome, $email, $senha, $turma, $foto);
    $this->redirect('usuario/index');
  } 
  
    public function excluir($id)
    {
      $Usuarios = $this->model('Usuarios');
      $Usuarios::excluir($id);
      $this->redirect('usuario/index');
    }  
  public function login()
  {
    $usuario = $_POST['txt_usuario'] ?? '';
    $senha = $_POST['txt_senha'] ?? '';

    $Usuarios = $this->model('Usuarios');
    $user = $Usuarios::verificarLogin($usuario, $senha);

    if ($user) {
      setcookie('usuario', $user['nome'], time() + 3600, '/');
      $this->redirect('home');
    } else {
      $this->redirect('usuario/login');
    }
  }
  public function sair()
  {
    setcookie('usuario', '', time() - 3600, '/');
    $this->redirect('home');
  }  
  public function cadastro()
  {
    $this->view('usuario/cadastro');
  }

}
