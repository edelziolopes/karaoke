<?php

namespace Application\models;

use Application\core\Database;
use PDO;
class Musicas
{
  public static function salvar($genero, $nome, $imagem, $cantor)
  {
      $conn = new Database();
      $result = $conn->executeQuery(
          'INSERT INTO tb_musicas
          (id_genero, nome, imagem, cantor) 
           VALUES (:GENERO, :NOME, :IMAGEM, :CANTOR)',
          array(
            ':GENERO' => $genero,
            ':NOME' => $nome,
            ':IMAGEM' => $imagem,
            ':CANTOR' => $cantor
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
