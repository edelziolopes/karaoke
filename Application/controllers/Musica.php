<?php

use Application\core\Controller;

class Musica extends Controller
{
  public function index()
  {
    $Generos = $this->model('Generos');
    $todosGeneros = $Generos::listarTudo();

    $Musicas = $this->model('Musicas');
    $todasMusicas = $Musicas::listarTudo();

    $this->view('musica/index', [
      'generos' => $todosGeneros,
      'musicas' => $todasMusicas
    ]);
  }

    public function salvar()
  {
    $genero = $_POST['txt_genero'];
    $nome = $_POST['txt_nome'];
    $imagem = $_POST['txt_imagem'];
    $cantor = $_POST['txt_cantor'];
    $youtube = $_POST['txt_youtube'];

    $Musicas = $this->model('Musicas');
    $Musicas::salvar($genero, $nome, $imagem, $cantor, $youtube);
    $this->redirect('musica/index');
  } 
    public function editar()
  {
    $id = $_POST['id'];
    $genero = $_POST['genero'];
    $nome = $_POST['nome'];
    $imagem = $_POST['imagem'];
    $cantor = $_POST['cantor'];
    $youtube = $_POST['youtube'];

    $Musicas = $this->model('Musicas');
    $Musicas::editar($id, $genero, $nome, $imagem, $cantor, $youtube);
    $this->redirect('musica/index');
  } 
  public function excluir($id)
  {
    $Musicas = $this->model('Musicas');
    $Musicas::excluir($id);
    $this->redirect('musica/index');
  }

}
