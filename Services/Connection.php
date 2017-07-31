<?php

class Connection
{
    const FETCHALL = 1;

    const ROWCOUNT = 2;

    /**
     * @var \PDO Variavel de conexao.
     */
    private $db;

    /**
     * @var \Connection|null A propria conexao.
     */
    private static $instance = null;

    /**
     * Connection constructor.
     * Privado devido ao DesignPattern Singleton
     */
    private function __construct()
    {
        try {
            $this->db = new PDO('mysql:host=localhost;dbname=ru;charset=utf8mb4', 'root', 'root');
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            self::$instance = $this;
        } catch (PDOException $e) {
            throw $e;
        }
    }

    /**
     * Privado. Exclui a possibilidade de clone.
     */
    private function __clone()
    {
    }

    /**
     * Retorna a conexao singleton.
     *
     * @return \Connection|null
     */
    public static function getConnection()
    {
        if (is_null(self::$instance)) {
            return new Connection();
        }

        return self::$instance;
    }

    /**
     * Executa uma query qualquer. Retorna os resultados.
     *
     * @param $query
     * @return array|int
     */
    public function query($query, $modifier = self::FETCHALL)
    {
        try {
            $query = $this->db->query($query);
            if ($modifier == self::FETCHALL) {
                return $query->fetchAll(PDO::FETCH_ASSOC);
            } else {
                if ($modifier == self::ROWCOUNT) {
                    return $query->rowCount();
                }
            }
        } catch (PDOException $e) {
            throw $e;
        }

        return -1;
    }
}

?>