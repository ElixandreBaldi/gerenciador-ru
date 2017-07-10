<?php

class SearchBuilder
{
    private $query;

    private $countWhereStatements;

    public function __construct($table)
    {
        $this->countWhereStatements = 0;
        $this->query = 'SELECT * FROM '.$table;
    }

    public function whereEqual($attribute, $value)
    {
        if ($this->countWhereStatements > 0){
            $this->query .= ' AND ';
        } else {
            $this->query .= ' WHERE ';
        }
        $this->query .= $attribute . '= \'' . $value . '\'';
        $this->countWhereStatements++;

        return $this;
    }

    public function whereDifferent($attribute, $value)
    {
        if ($this->countWhereStatements > 0){
            $this->query .= ' AND ';
        } else {
            $this->query .= ' WHERE ';
        }
        $this->query .= $attribute . '<> \'' . $value . '\'';
        $this->countWhereStatements++;

        return $this;
    }

    public function whereGreaterThan($attribute, $value)
    {
        if ($this->countWhereStatements > 0){
            $this->query .= ' AND ';
        } else {
            $this->query .= ' WHERE ';
        }
        $this->query .= $attribute . '> \'' . $value . '\'';
        $this->countWhereStatements++;

        return $this;
    }

    public function whereGreaterOrEqualThan($attribute, $value)
    {
        if ($this->countWhereStatements > 0){
            $this->query .= ' AND ';
        } else {
            $this->query .= ' WHERE ';
        }
        $this->query .= $attribute . '>= \'' . $value . '\'';
        $this->countWhereStatements++;

        return $this;
    }

    public function whereLessThan($attribute, $value)
    {
        if ($this->countWhereStatements > 0){
            $this->query .= ' AND ';
        } else {
            $this->query .= ' WHERE ';
        }
        $this->query .= $attribute . '< \'' . $value . '\'';
        $this->countWhereStatements++;

        return $this;
    }

    public function whereLessOrEqualThan($attribute, $value)
    {
        if ($this->countWhereStatements > 0){
            $this->query .= ' AND ';
        } else {
            $this->query .= ' WHERE ';
        }
        $this->query .= $attribute . '<= \'' . $value . '\'';
        $this->countWhereStatements++;

        return $this;
    }

    public function limit($limit)
    {
        $this->query .= ' LIMIT ' . $limit;

        return $this;
    }

    public function run()
    {
        $this->query .= ';';
        return Connection::getConnection()->query($this->query);
    }
}

?>