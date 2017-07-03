<?php

class Connection
{
    /**
     * @var \PDO Variavel de conexao.
     */
    private $db;

    private static $instance = null;

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

    public static function getConnection()
    {
        if (is_null(self::$instance)){
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
            return $this->db->query($query)->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e){
            throw $e;
        }
    }
}

?>