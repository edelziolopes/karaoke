<?php

use Application\core\Controller;

class Vinculo extends Controller
{
  public function index()
  {
    $Usuarios = $this->model('Usuarios');
    $dataUsuarios = $Usuarios::listarTudo();
    
    $Musicas = $this->model('Musicas');
    $dataMusicas = $Musicas::listarTudo();
    
    $Vinculos = $this->model('Vinculos');
    $dataVinculos = $Vinculos::listarTudo();

    $this->view('vinculo/index', [
      'usuarios' => $dataUsuarios,
      'musicas' => $dataMusicas,
      'vinculos' => $dataVinculos
    ]);
  }

}
