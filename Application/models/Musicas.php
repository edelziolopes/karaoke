<?php

namespace Application\models;

use Application\core\Database;
use PDO;
class Musicas
{
  public static function salvar($genero, $nome, $imagem, $cantor, $youtube)
  {
      $conn = new Database();
      $result = $conn->executeQuery(
          'INSERT INTO tb_musicas
          (id_genero, nome, imagem, cantor, youtube) 
           VALUES (:GENERO, :NOME, :IMAGEM, :CANTOR, :YOUTUBE)',
          array(
            ':GENERO' => $genero,
            ':NOME' => $nome,
            ':IMAGEM' => $imagem,
            ':CANTOR' => $cantor,
            ':YOUTUBE' => $youtube
          )
      );
      return $result->rowCount();
  }

  public static function excluir($id)
  {
      $conn = new Database();
      $result = $conn->executeQuery('DELETE FROM tb_musicas WHERE id = :ID', array(':ID' => $id));
      return $result->rowCount();
  }

  public static function listarTudo()
  {
      $conn = new Database();
      $result = $conn->executeQuery('SELECT * FROM tb_musicas');
      return $result->fetchAll(PDO::FETCH_ASSOC);
  }
  public static function listarGenero($id)
  {
      $conn = new Database();
      $result = $conn->executeQuery('SELECT * FROM tb_musicas WHERE id_genero = :ID', array(':ID' => $id));
      return $result->fetchAll(PDO::FETCH_ASSOC);
  }
  public static function listarMusica($id)
  {
      $conn = new Database();
      $result = $conn->executeQuery(
        'SELECT m.id AS id_musica, m.nome AS nome_musica, m.cantor, m.imagem, g.nome AS nome_genero FROM tb_musicas AS m JOIN tb_generos AS g ON m.id_genero = g.id WHERE m.id = :ID', 
        array(':ID' => $id)
      );
      return $result->fetchAll(PDO::FETCH_ASSOC);
  }

}
