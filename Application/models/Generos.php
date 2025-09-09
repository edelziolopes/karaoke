<?php

namespace Application\models;

use Application\core\Database;
use PDO;
class Generos
{
  public static function salvar($nome, $imagem)
  {
      $conn = new Database();
      $result = $conn->executeQuery(
          'INSERT INTO tb_generos (nome, imagem) 
           VALUES (:NOME, :IMAGEM)',
          array(
            ':NOME' => $nome,
            ':IMAGEM' => $imagem,
            )
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
      $result = $conn->executeQuery('SELECT * FROM tb_generos');
      return $result->fetchAll(PDO::FETCH_ASSOC);
  }

}
