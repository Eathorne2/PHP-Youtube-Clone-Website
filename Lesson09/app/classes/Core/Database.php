<?php

namespace Core;

use \PDO;

/**
 * Database class
 */
class Database
{
	private $con = null;

	public function __construct()
	{
		$str = DB_DRIVER.':'.DB_HOST.';'.DB_NAME;

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

	public function fetch()
	{


	}

	public function fetchAll()
	{

	}

	public function insert(string $table, array $data)
	{
		$keys = array_keys($data);
		$sql = "insert into $table (".implode(',', $keys).") values (:".implode(',:', $keys).")";
		return $this->query($sql, $data);

	}

	public function update(string $table, array $data, string $where, array $whereParams = [])
	{
		$sql = "update users set id = :id, email = :email where $where";
		$arr = array_merge($data,$whereParams);
		return $this->query($sql, $arr);
	}

	public function delete(string $table, string $where, array $whereParams = [])
	{
		$sql = "delete from $table where $where";
		return $this->query($sql, $whereParams);
	}
}