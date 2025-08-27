<?php

use Application\core\Controller;

class Home extends Controller
{
  /*
  * chama a view index.php do  /home   ou somente   /
  */
  public function index()
  {
    $Generos = $this->model('Generos');
    $data = $Generos::listarTudo();
    $this->view('home/index', ['generos' => $data]);
  }

}
