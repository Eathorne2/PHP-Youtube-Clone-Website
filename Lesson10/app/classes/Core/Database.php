<?php

namespace Core;

use \PDO;

/**
 * Database class
 */
class Database
{
	protected $con = null;

	public function __construct()
	{
		$str = DB_DRIVER.':hostname='.DB_HOST.';dbname='.DB_NAME;
 
		try{
			$con = new PDO($str, DB_USER, DB_PASS);
			$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$this->con = $con;

		}catch(PDOException $e){
			die('could not connect. Error:'.$e->getMessage());
		}
	}

	public function query(string $sql, array $data = [])
	{
		$stm = $this->con->prepare($sql);
		$stm->execute($data);
		return $stm;
	}

	public function fetch(string $sql, array $data)
	{
		return $this->query($sql, $data)->fetch(PDO::FETCH_OBJ);

	}

	public function fetchAll(string $sql, array $data)
	{
		return $this->query($sql, $data)->fetchAll(PDO::FETCH_OBJ);
	}

	public function insert(string $table, array $data)
	{
		$keys = array_keys($data);
		$sql = "insert into $table (".implode(',', $keys).") values (:".implode(',:', $keys).")";
		$this->query($sql, $data);

		return $this->con->lastInsertId();
	}

	public function update(string $table, array $data, string $where, array $whereParams = [])
	{
		$sql = "update users set id = :id, email = :email where $where";
		$arr = array_merge($data,$whereParams);
		return $this->query($sql, $arr)->rowCount();

	}

	public function delete(string $table, string $where, array $whereParams = [])
	{
		$sql = "delete from $table where $where";
		return $this->query($sql, $whereParams)->rowCount();
	}
}