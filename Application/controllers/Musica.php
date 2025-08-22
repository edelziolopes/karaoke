<?php

use Application\core\Controller;

class Musica extends Controller
{
  public function index()
  {
    $Generos = $this->model('Generos');
    $data = $Generos::listarTudo();

    $this->view('musica/index', ['generos' => $data]);
  }

    public function salvar()
  {
    $genero = $_POST['txt_genero'];
    $nome = $_POST['txt_nome'];
    $imagem = $_POST['txt_imagem'];
    $cantor = $_POST['txt_cantor'];

    $Musicas = $this->model('Musicas');
    $Musicas::salvar($genero, $nome, $imagem, $cantor);
    $this->redirect('musica/index');
  } 

}
