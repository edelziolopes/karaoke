<?php

namespace Application\models;

use Application\core\Database;
use PDO;
class Usuarios
{
    public static function salvar($nome, $turma, $foto)
    {
        $conn = new Database();
        $result = $conn->executeQuery(
            'INSERT INTO tb_usuarios (nome, turma, foto)
            VALUES (:NOME, :TURMA, :FOTO)',
            array(
            ':NOME' => $nome,
            ':TURMA' => $turma,
            ':FOTO' => $foto
            )
        );
        return $result->rowCount();
    }

    public static function excluir($id)
    {
        $conn = new Database();
        $result = $conn->executeQuery('DELETE FROM tb_usuarios WHERE id = :ID', array(':ID' => $id));
        return $result->rowCount();
    }
    public static function verificarLogin($usuario, $senha)
    {
        $conn = new Database();
        $result = $conn->executeQuery(
            'SELECT * FROM tb_usuarios WHERE usuario = :USUARIO LIMIT 1',
            array(':USUARIO' => $usuario)
        );
        $user = $result->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($senha, $user['senha'])) {
            return $user;
        }
        return false;
    }
    public static function listarTudo()
    {
        $conn = new Database();
        $result = $conn->executeQuery('SELECT * FROM tb_usuarios');
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

}
