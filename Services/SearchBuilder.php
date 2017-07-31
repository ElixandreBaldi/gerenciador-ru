<?php

class SearchBuilder
{
    /**
     * @var string
     */
    private $query;

    private $countWhereStatements;

    private $count = false;

    private $sum = NULL;

    public function __construct($table)
    {
        $this->countWhereStatements = 0;
        $this->query = 'SELECT * FROM '.$table;
    }

    public function whereEqual($attribute, $value)
    {
        if ($this->countWhereStatements > 0) {
            $this->query .= ' AND ';
        } else {
            $this->query .= ' WHERE ';
        }
        $this->query .= $attribute.'= \''.$value.'\'';
        $this->countWhereStatements++;

        return $this;
    }

    public function whereDifferent($attribute, $value)
    {
        if ($this->countWhereStatements > 0) {
            $this->query .= ' AND ';
        } else {
            $this->query .= ' WHERE ';
        }
        $this->query .= $attribute.'<> \''.$value.'\'';
        $this->countWhereStatements++;

        return $this;
    }

    public function whereGreaterThan($attribute, $value)
    {
        if ($this->countWhereStatements > 0) {
            $this->query .= ' AND ';
        } else {
            $this->query .= ' WHERE ';
        }
        $this->query .= $attribute.'> \''.$value.'\'';
        $this->countWhereStatements++;

        return $this;
    }

    public function whereGreaterOrEqualThan($attribute, $value)
    {
        if ($this->countWhereStatements > 0) {
            $this->query .= ' AND ';
        } else {
            $this->query .= ' WHERE ';
        }
        $this->query .= $attribute.'>= \''.$value.'\'';
        $this->countWhereStatements++;

        return $this;
    }

    public function whereLessThan($attribute, $value)
    {
        if ($this->countWhereStatements > 0) {
            $this->query .= ' AND ';
        } else {
            $this->query .= ' WHERE ';
        }
        $this->query .= $attribute.'< \''.$value.'\'';
        $this->countWhereStatements++;

        return $this;
    }

    public function whereLessOrEqualThan($attribute, $value)
    {
        if ($this->countWhereStatements > 0) {
            $this->query .= ' AND ';
        } else {
            $this->query .= ' WHERE ';
        }
        $this->query .= $attribute.'<= \''.$value.'\'';
        $this->countWhereStatements++;

        return $this;
    }

    public function limit($limit)
    {
        $this->query .= ' LIMIT '.$limit;

        return $this;
    }

    public function count()
    {
        $this->query = str_replace('*', 'COUNT(*)', $this->query);
        $this->count = true;

        return $this;
    }

    public function sum($field)
    {
        $this->query = str_replace('*', 'SUM('.$field.')', $this->query);
        $this->sum = $field;

        return $this;
    }

    public function run()
    {
        $this->query .= ';';
        if ($this->count) {
            return Connection::getConnection()
                ->query($this->query)[0]['COUNT(*)'];
        } else if($this->sum)
            return floatval(Connection::getConnection()
                ->query($this->query)[0]['SUM('.$this->sum.')']);

        return Connection::getConnection()
            ->query($this->query);
    }
}

?>