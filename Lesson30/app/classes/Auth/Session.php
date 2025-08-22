<?php

namespace Auth;

/**
 * Session class
 */
class Session
{
	protected $userKey = UNIQUE;

	public function __construct()
	{
		if(empty(session_id()))
			session_start();

	}

	public function set(string $key, mixed $value):void
	{
		$_SESSION[$this->userKey][$key] = $value;
	}

	public function get(string $key):mixed
	{
		if(!empty($_SESSION[$this->userKey][$key]))
			return $_SESSION[$this->userKey][$key];

		return null;
	}

	public function remove(string $key):bool
	{
		if(!empty($_SESSION[$this->userKey][$key]))
		{
			$data = $_SESSION[$this->userKey][$key];
			unset($_SESSION[$this->userKey][$key]);
			return $data;
		}

		return false;
	}

	public function destroy()
	{
		session_regenerate_id();
		session_destroy();
	}

	public function auth(object|array $row):bool
	{
		$_SESSION[$this->userKey]['USER'.$this->userKey] = $row;
		return true;
	}

	public function user(?string $key = null):array|object|string
	{
		if(!empty($_SESSION[$this->userKey]['USER'.$this->userKey]))
		{
			if(empty($key))
				return $_SESSION[$this->userKey]['USER'.$this->userKey];

			$data = (array)$_SESSION[$this->userKey]['USER'.$this->userKey];
			
			if(!empty($data[$key]))
				return $data[$key];
		}

		return '';
	}

	public function isLoggedIn():bool
	{
		if(!empty($_SESSION[$this->userKey]['USER'.$this->userKey]))
			return true;

		return false;
	}

	public function logout()
	{
		if(!empty($_SESSION[$this->userKey]['USER'.$this->userKey]))
			unset($_SESSION[$this->userKey]['USER'.$this->userKey]);

		$this->destroy();
	}


}