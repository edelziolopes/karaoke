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
    $foto = $_FILES['txt_foto'];

    $timestamp = date('YmdHis');
    $fotoName = $timestamp . '.jpg';
    $uploadPath = '../public/fotos/' . $fotoName;
    if (move_uploaded_file($foto['tmp_name'], $uploadPath)) {
      $Usuarios = $this->model('Usuarios');
      $Usuarios::salvar($nome, $email, $senha, $turma, $fotoName);
      $this->redirect('usuario/index');
    }
  } 
  
  public function cadastro()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['txt_nome'];
    $email = $_POST['txt_email'];
    $senha = $_POST['txt_senha'];
    $turma = $_POST['txt_turma'];
    $foto = $_FILES['txt_foto'];
        
    $timestamp = date('YmdHis');
    $fotoName = $timestamp . '.jpg';
    $uploadPath = '../public/fotos/' . $fotoName;
    if (move_uploaded_file($foto['tmp_name'], $uploadPath)) {
      $Usuarios = $this->model('Usuarios');
      $Usuarios::salvar($nome, $email, $senha, $turma, $fotoName);
      $this->redirect('home/login');
    }} else {
      $this->view('home/cadastro');
    }
  } 

  
  public function excluir($id)
  {
    $Usuarios = $this->model('Usuarios');
    $Usuarios::excluir($id);
    $this->redirect('usuario/index');
  }  

  public function logout()
  {
      session_start();
      session_unset();
      session_destroy();
      $this->redirect('/home');
  }

}
