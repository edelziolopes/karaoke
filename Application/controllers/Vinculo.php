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

  public function salvar()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST['usuario'];
    $musica = $_POST['musica'];
    $nota = $_POST['nota'];
    $audio = $_POST['audio'];
        
    $Vinculos = $this->model('Vinculos');
    $Vinculos::salvar($usuario, $musica, $nota, $audio);
    $this->redirect('vinculo/index');
    
    } else {
      $this->view('vinculo/index');
    }
  }

}
