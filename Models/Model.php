<?php

require_once('../Services/Connection.php');

class Model
{
    /*
     CREATE DATABASE ru; USE ru;
    */

    /**
     * @var string Tabela referente ao modelo.
     */
    protected static $table;

    /**
     * @var string Atributo chave primaria do modelo.
     */
    protected static $primaryKey = 'id';

    /**
     * Procura por um modelo com a chave primaria especificada.
     *
     * @param $id
     * @return array
     */
    public static function find($id, $table)
    {
        $conn = new Connection();
        try {
            return $conn->query('SELECT * FROM ' . $table . ' WHERE ' . Model::$primaryKey . '=' . $id . ' LIMIT 1');
        } catch (PDOException $e) {
            throw $e;
        }
    }

    /**
     * Executa uma sql qualquer.
     *
     * @param string $sql
     */
    public static function sql($sql)
    {
        // $sql
    }
}

?>