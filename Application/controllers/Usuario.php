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
    $turma = $_POST['txt_turma'];
    $foto = $_POST['txt_foto'];

    $Usuarios = $this->model('Usuarios');
    $Usuarios::salvar($nome, $turma, $foto);
    $this->redirect('usuario/index');
  } 
  
    public function excluir($id)
    {
      $Usuarios = $this->model('Usuarios');
      $Usuarios::excluir($id);
      $this->redirect('usuario/index');
    }  

}
