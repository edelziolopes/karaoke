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

}
