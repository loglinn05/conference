<?php

namespace App\Core\Database;

class QueryBuilder
{
	private $pdo;

	function __construct($pdo)
	{
		$this->pdo = $pdo;
	}

	public function selectAll($table)
	{
		$statement = $this->pdo->prepare("SELECT * FROM {$table}");
		$statement->execute();
		return $statement->fetchAll(\PDO::FETCH_CLASS);
	}

	public function selectWhere($table, $condition) {
		$statement = $this->pdo->prepare("SELECT * FROM {$table} WHERE " . $condition);
		$statement->execute();
		return $statement->fetchAll(\PDO::FETCH_CLASS);
	}

	public function countAllItems($table)
	{
		$statement = $this->pdo->prepare("SELECT COUNT(*) FROM {$table}");
		$statement->execute();
		return $statement->fetchAll(\PDO::FETCH_CLASS);
	}

	public function insert($table, $parameters)
	{
		$sql = sprintf(
			"INSERT INTO %s (%s) VALUES (%s)",
			$table,
			implode(', ', array_keys($parameters)),
			":" . implode(', :', array_keys($parameters))
		);

		try {
			$statement = $this->pdo->prepare($sql);
			$statement->execute($parameters);
		} catch (\Exception $e) {
			die("Something went wrong during query execution.");
		}

		return $this->getIdAndEmailOfRecord($table, $parameters);
	}

	public function update($table, $parameters, $id)
	{
		$sql = "UPDATE {$table} SET ";
		$values = "";
		foreach ($parameters as $key => $value) {
			$value = preg_replace("#(['])#", "\\'", $value);
			$value = preg_replace("#([\"])#", '\\"', $value);
			$values .= "$key = '$value', ";
		}
		$sql .= trim($values, ", ") . " WHERE id = $id";

		try {
			$statement = $this->pdo->prepare($sql);
			$statement->execute($parameters);
		} catch (\Exception $e) {
			die("Something went wrong during query execution.");
		}

		return $this->getIdAndEmailOfRecord($table, $parameters);
	}

	private function getIdAndEmailOfRecord($table, $parameters) {
		$sql = "SELECT id, email FROM {$table} WHERE ";
		$values = "";
		foreach ($parameters as $key => $parameter) {
			$parameter = preg_replace("#(['])#", "\\'", $parameter);
			$parameter = preg_replace("#([\"])#", '\\"', $parameter);
			$values .= "$key = '$parameter' AND ";
		}
		$sql .= trim($values, " AND ");

		$statement = $this->pdo->prepare($sql);
		$statement->execute();
		return $statement->fetchAll(\PDO::FETCH_CLASS);
	}
}