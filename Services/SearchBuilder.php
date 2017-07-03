<?php

require_once('../Services/Connection.php');

class SearchBuilder
{
	private $table;

	private $equal = [];

	private $different = [];

	private $greater = [];

	private $greaterOrEqual = [];

	private $less = [];

	private $lessOrEqual = [];

	private $limit = null;

	public function __construct($table)
	{
		$this->table = $table;				
	}

	public function whereEqual ($attribute, $value)
	{
		array_push($this->equal,[
			'attribute' => $attribute,
			'value' => $value
		]);

		return $this;
	}

	public function whereDifferent ($attribute, $value)
	{
		array_push($this->different,[
			'attribute' => $attribute,
			'value' => $value
		]);

		return $this;
	}	

	public function whereGreaterThan ($attribute, $value)
	{
		array_push($this->greater,[
			'attribute' => $attribute,
			'value' => $value
		]);

		return $this;
	}

	public function whereGreaterOrEqualThan ($attribute, $value)
	{
		array_push($this->greaterOrEqual,[
			'attribute' => $attribute,
			'value' => $value
		]);

		return $this;
	}

	public function whereLessThan ($attribute, $value)
	{
		array_push($this->less,[
			'attribute' => $attribute,
			'value' => $value
		]);

		return $this;
	}

	public function whereLessOrEqualThan ($attribute, $value)
	{
		array_push($this->lessOrEqual,[
			'attribute' => $attribute,
			'value' => $value
		]);

		return $this;
	}

	public function limit ($limit)
	{
		$this->limit = $limit;
		return $this;
	}

	public function run ()
	{
		$query = 'SELECT * FROM '. $this->table .' WHERE ';	
		$queryOld = 'SELECT * FROM '. $this->table .' WHERE ';

		foreach ($this->equal as $equal) {
			$query .= $equal['attribute'].' = \''.$equal['value'].'\' AND ';
		}

		foreach ($this->different as $different) {
			$query .= $different['attribute'].' <> \''.$different['value'].'\' AND ';
		}

		foreach ($this->greater as $greater) {
			$query .= $greater['attribute'].' > \''.$greater['value'].'\' AND ';
		}

		foreach ($this->greaterOrEqual as $greaterOrEqual) {
			$query .= $greaterOrEqual['attribute'].' >= \''.$greaterOrEqual['value'].'\' AND ';
		}

		foreach ($this->less as $less) {
			$query .= $less['attribute'].' < \''.$less['value'].'\' AND ';
		}

		foreach ($this->lessOrEqual as $lessOrEqual) {
			$query .= $lessOrEqual['attribute'].' <= \''.$lessOrEqual['value'].'\' AND ';
		}

		$queryNew = $query;
		$query = '';
		for ($i=0; $i < strlen($queryNew) - 4; $i++) { 
			$query .= $queryNew[$i];
		}

		if(!is_null($this->limit))
		{
			$query .= 'LIMIT '. $this->limit;
		}

		$query .= ';';

		echo $query;

		//return Connection::getConnection()->query('SELECT * FROM ' . static::$table . ' WHERE ' . static::$primaryKey . '=' . $id . ' LIMIT 1');

	}
}

?>