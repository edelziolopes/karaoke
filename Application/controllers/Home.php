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
  public function cadastro()
  {
    $this->view('/home/cadastro');
  }
  public function login()
  {
    $this->view('/home/login');
  }

}
