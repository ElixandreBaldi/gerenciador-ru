<?php

require_once('../Services/Connection.php');
require_once('../Services/SearchBuilder.php');

class Model
{
    /*
     CREATE DATABASE ru; USE ru;
    */

    /**
     * @var string Tabela referente ao modelo.
     */
    protected static $table = '';

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
    public static function find($id)
    {
        try {
            //echo 'SELECT * FROM ' . static::$table . ' WHERE ' . static::$primaryKey . '=' . $id . ' LIMIT 1';
            return Connection::getConnection()->query('SELECT * FROM ' . static::$table . ' WHERE ' . static::$primaryKey . '=' . $id . ' LIMIT 1');
        } catch (PDOException $e) {
            throw $e;
        }
    }

    public static function search ()
    {
        return new SearchBuilder(static::$table);
    }
    /**
     * Executa uma sql qualquer.
     *
     * @param string $sql
     */
    public static function sql($sql)
    {
        try {
            return Connection::getConnection()->query($sql);
        } catch (PDOException $e) {
            throw $e;
        }
    }
}

?>