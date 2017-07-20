<?php

class Model
{
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
     * @return mixed
     */
    public static function find($id)
    {
        try {
            $result = static::search()
                ->whereEqual(static::$primaryKey, $id)
                ->limit(1)
                ->run();
            if ((count($result) == 0) || is_null($result)) {
                return null;
            }

            return static::instanceByArray($result[0]);
        } catch (PDOException $e) {
            throw $e;
        }
    }

    /**
     * Inicializa um select no banco de dados.
     *
     * @return \SearchBuilder
     */
    public static function search()
    {
        return new SearchBuilder(static::$table);
    }

    /**
     * Inicializa um insert no banco de dados.
     *
     * @return \InsertBuilder
     */
    public static function insert()
    {
        return new InsertBuilder(static::$table);
    }

    /**
     * Deve ser implementado em todas as classes filhas
     *
     * @param $data
     * @return mixed
     */
    public static function instanceByArray(array $data)
    {
        return null;
    }
}

?>