<?php

class InsertBuilder
{
    /**
     * @var string
     */
    private $query;

    /**
     * @var boolean
     */
    private $timestamped;

    public function __construct($table)
    {
        $this->query = 'INSERT INTO '.$table;
    }

    public function values(array $values)
    {
        $fields = array_keys($values);
        $values = array_values($values);
        foreach ($values as $key => $val) {
            if (is_null($val)) {
                $values[$key] = 'NULL';
            } else {
                if (! ctype_digit($val)) {
                    $values[$key] = "'{$val}'";
                }
            }
        }
        $this->query .= "(".implode($fields, ",").") values (".implode($values, ",").")";

        return $this;
    }

    public function run()
    {
        $this->query .= ';';

        return Connection::getConnection()
            ->query($this->query, Connection::ROWCOUNT);
    }
}