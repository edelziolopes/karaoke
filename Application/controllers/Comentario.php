<?php

use Application\core\Controller;

class Comentario extends Controller
{
  public function index()
  {
    $Comentarios = $this->model('Comentarios');
    $data = $Comentarios::listarTudo();
    $this->view('comentario/index', ['comentarios' => $data]);
  }

  public function salvar($id_musica)
  {
    $id_usuario = $_POST['txt_usuario'];
    $comentario = $_POST['txt_comentario'];

    $Comentarios = $this->model('Comentarios');
    $Comentarios::salvar($id_usuario, $id_musica, $comentario);
    $this->redirect('home/musica/'.$id_musica);
  } 
  
    public function excluir($id)
    {
      $Comentarios = $this->model('Comentarios');
      $Comentarios::excluir($id);
      $this->redirect('comentario/index');
    }  

}
