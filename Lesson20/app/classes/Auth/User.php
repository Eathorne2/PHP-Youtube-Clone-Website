<?php

namespace Auth;

use \Core\Database;

/**
 * User class
 */
class User extends Database
{
	protected $allowedInsertColumns = [
		'first_name',
		'last_name',
		'email',
		'gender',
		'password',
		'dob',
		'country_id',
		'date_created',
	];

	protected $allowedUpdateColumns = [
		'first_name',
		'last_name',
		'email',
		'email_verify',
		'image',
		'gender',
		'password',
		'dob',
		'channel_id',
		'deleted',
		'country_id',
		'date_updated',
		'date_deleted',
	];

	public function create(array $data)
	{
		foreach ($data as $key => $value) {
			if(!in_array($key, $this->allowedInsertColumns))
				unset($data[$key]);
		}

		$data['date_created'] = date("Y-m-d H:i:s");
		$data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

		return $this->insert('users',$data);
	}

	public function getByEmail(array $data)
	{
		// code...
	}

	public function getById(array $data)
	{
		// code...
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