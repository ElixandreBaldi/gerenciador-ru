<?php

class Connection
{
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
            $this->db = new PDO('mysql:host=localhost;dbname=ru;charset=utf8mb4', 'root', 'vertrigo');
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
     * @return array
     */
    public function query($query)
    {
        try {
            return $this->db->query($query)
                ->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw $e;
        }
    }
}

?>