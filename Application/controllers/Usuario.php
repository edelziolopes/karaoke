<?php

use Application\core\Controller;

class Usuario extends Controller
{
  public function index()
  {
    $this->view('usuario/index');
  }

}
