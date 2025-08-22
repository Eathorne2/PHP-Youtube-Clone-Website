<?php

namespace Auth;

use \Core\Database;

/**
 * Channel class
 */
class Channel extends Database
{
	protected $allowedInsertColumns = [
		'user_id',
		'name',
		'description',
		'tags',
		'image',
		'cover',
		'country_id',
		'handle',
		'slug',
		'date_created',

	];

	protected $allowedUpdateColumns = [
		'name',
		'description',
		'tags',
		'image',
		'cover',
		'deleted',
		'country_id',
		'handle',
		'slug',
		'date_updated',
		'date_deleted',
	];

	public function createSlug(string $str):string
	{
		$str = strtolower($str);
		$str = preg_replace("/[^a-zA-Z0-9\-\_]/", '', $str);
		$str = preg_replace("/\s+/", '', $str);
		return $str;
	}

	public function createHandle(string $str):string
	{
		$str = strtolower($str);
		$str = preg_replace("/[^a-zA-Z0-9\-\_]/", '', $str);
		$str = preg_replace("/\s+/", '', $str);
		return $str;
	}

	

	public function create(array $data)
	{
		foreach ($data as $key => $value) {
			if(!in_array($key, $this->allowedInsertColumns))
				unset($data[$key]);
		}

		$data['date_created'] = date("Y-m-d H:i:s");

		return $this->insert('channel',$data);
	}

	public function getChannels(string $user_id)
	{
		return $this->fetchAll('select * from channel where deleted = 0 AND user_id = :user_id',['user_id'=>$user_id]);
	}

	public function getById(int $id)
	{
		return $this->fetch('select * from channel where id = :id limit 1',['id'=>$id]);
	}

	public function updateById(array $data)
	{
		// code...
	}

	
	public function deleteById(array $data)
	{
		// code...
	}

	
}