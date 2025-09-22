<?php

namespace Application\models;

use Application\core\Database;
use PDO;
class Comentarios
{
  public static function salvar($id_usuario, $id_musica, $comentario)
  {
      $conn = new Database();
      $result = $conn->executeQuery(
          'INSERT INTO tb_comentarios (id_usuario, id_musica, comentario) 
           VALUES (:ID_USUARIO, :ID_MUSICA, :COMENTARIO)',
          array(
            ':ID_USUARIO' => $id_usuario,
            ':ID_MUSICA' => $id_musica,
            ':COMENTARIO' => $comentario
          )
      );
      return $result->rowCount();
  }

  public static function excluir($id)
  {
      $conn = new Database();
      $result = $conn->executeQuery('DELETE FROM tb_comentarios WHERE id = :ID', array(':ID' => $id));
      return $result->rowCount();
  }

  public static function listarTudo($musica)
  {
      $conn = new Database();
      $result = $conn->executeQuery('SELECT 
            c.id,
            c.id_musica,
            c.comentario,
            c.data,
            u.nome,
            u.turma,
            u.foto
        FROM 
            tb_comentarios AS c
        INNER JOIN 
            tb_usuarios AS u 
        ON c.id_usuario = u.id
        WHERE c.id_musica = :MUSICA
        ORDER BY c.data DESC', 
        array(':MUSICA' => $musica));
      return $result->fetchAll(PDO::FETCH_ASSOC);
  }

}
