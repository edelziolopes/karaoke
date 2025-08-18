<?php

use Application\core\Controller;

class Musica extends Controller
{
  public function index()
  {
    $this->view('musica/index');
  }

}
