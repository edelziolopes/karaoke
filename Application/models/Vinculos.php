<?php

namespace Application\models;

use Application\core\Database;
use PDO;
class Vinculos
{
  public static function salvar($id_usario, $id_musica)
  {
      $conn = new Database();
      $result = $conn->executeQuery(
          'INSERT INTO tb_vinculos (id_usuario, id_musica)
           VALUES (:USUARIO, :MUSICA)',
          array(':USUARIO' => $id_usuario,
                ':MUSICA' => $id_musica)
      );
      return $result->rowCount();
  }

  public static function excluir($id)
  {
      $conn = new Database();
      $result = $conn->executeQuery('DELETE FROM tb_generos WHERE id = :ID', array(':ID' => $id));
      return $result->rowCount();
  }

  public static function listarTudo()
  {
      $conn = new Database();
      $result = $conn->executeQuery('SELECT * FROM tb_vinculos');
      return $result->fetchAll(PDO::FETCH_ASSOC);
  }

}
