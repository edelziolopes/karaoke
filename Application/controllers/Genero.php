<?php

use Application\core\Controller;

class Genero extends Controller
{
  public function index()
  {
    $Generos = $this->model('Generos');
    $data = $Generos::listarTudo();
    $this->view('genero/index', ['generos' => $data]);
  }

  public function salvar()
  {
    $nome = $_POST['txt_nome'];
    $imagem = $_POST['txt_imagem'];

    $Generos = $this->model('Generos');
    $Generos::salvar($nome, $imagem);
    $this->redirect('genero/index');
  } 
  
    public function excluir($id)
    {
      $Generos = $this->model('Generos');
      $Generos::excluir($id);
      $this->redirect('genero/index');
    }  

}
