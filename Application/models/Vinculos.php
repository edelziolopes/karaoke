<?php

namespace Application\models;

use Application\core\Database;
use PDO;
class Vinculos
{
  public static function salvar($usuario, $musica, $nota, $audio)
  {
      $conn = new Database();
      $result = $conn->executeQuery(
          'INSERT INTO tb_vinculos (id_usuario, id_musica, nota, audio)
           VALUES (:USUARIO, :MUSICA, :NOTA, :AUDIO)',
          array(':USUARIO' => $usuario,
                ':MUSICA' => $musica,
                ':NOTA' => $nota,
                ':AUDIO' => $audio)
      );
      return $result->rowCount();
  }

  public static function excluir($id)
  {
      $conn = new Database();
      $result = $conn->executeQuery('DELETE FROM tb_vinculos WHERE id = :ID', array(':ID' => $id));
      return $result->rowCount();
  }

  public static function listarTudo2($id)
  {
      $conn = new Database();
      $result = $conn->executeQuery('SELECT
                                        v.*,
                                        u.nome AS nome_usuario,
                                        u.turma,
                                        u.foto,
                                        m.nome AS nome_musica
                                    FROM
                                        tb_vinculos AS v
                                    INNER JOIN
                                        tb_usuarios AS u ON v.id_usuario = u.id
                                    INNER JOIN
                                        tb_musicas AS m ON v.id_musica = m.id
                                    WHERE v.id_musica = :ID
                                    ORDER BY v.id DESC', array(':ID' => $id));
      return $result->fetchAll(PDO::FETCH_ASSOC);
  }
  public static function listarTudo()
  {
      $conn = new Database();
      $result = $conn->executeQuery('SELECT
                                        v.*,
                                        u.nome AS nome_usuario,
                                        u.turma,
                                        u.foto,
                                        m.nome AS nome_musica
                                    FROM
                                        tb_vinculos AS v
                                    INNER JOIN
                                        tb_usuarios AS u ON v.id_usuario = u.id
                                    INNER JOIN
                                        tb_musicas AS m ON v.id_musica = m.id
                                    
                                    ORDER BY v.id DESC');
      return $result->fetchAll(PDO::FETCH_ASSOC);
  }

    public static function like($id)
    {
        $sql = 'UPDATE tb_vinculos 
                SET `like` = `like` + 1 
                WHERE id = :ID';

        $conn = new Database();
        $result = $conn->executeQuery(
            $sql,
            array(':ID' => $id)
        );
        return $result->rowCount();
    }
    public static function unlike($id)
    {
        $sql = 'UPDATE tb_vinculos 
                SET `like` = `like` - 1 
                WHERE id = :ID';

        $conn = new Database();
        $result = $conn->executeQuery(
            $sql,
            array(':ID' => $id)
        );
        return $result->rowCount();
    }
} 

?>
