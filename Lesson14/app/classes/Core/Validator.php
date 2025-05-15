<?php

namespace Core;

/**
 * Validator class
 */
class Validator extends Database
{
	
	protected $data = [];
	protected $rules = [];
	public $errors = [];

	public function __construct(array $data)
	{
		$this->data = $data;
	}

	public function setRules(array $rules)
	{
		$this->rules = $rules;
		$this->validate();
	}

	protected function validate()
	{
		$this->errors = [];

		foreach ($this->rules as $field => $rules) {
			
			foreach ($rules as $rule) {

				$value = $this->data[$field] ?? null;
				$value = trim($value);

				$ruleParts = explode(':', $rule);
				$rule = $ruleParts[0];
				$param = $ruleParts[1] ?? null;
				if(method_exists($this, 'validate_'.$rule))
				{
					$method = 'validate_'.$rule;
					$this->$method($field, $value, $param);
				}
			}
		}
	}

	public function has_errors()
	{
		return !empty($this->errors);
	}

	/*** validator methods **/

	protected function validate_required(string $field, string $value, ?string $param)
	{
		if(empty($value))
			$this->errors[$field][] = ucfirst($field)." is required";
	}

	protected function validate_email(string $field, string $value, ?string $param)
	{

		if(!filter_var($value,FILTER_VALIDATE_EMAIL))
			$this->errors[$field][] = ucfirst($field)." is not valid";

	}

	protected function validate_regex(string $field, string $value, ?string $param)
	{
		if(!preg_match("/$param/", $value))
			$this->errors[$field][] = ucfirst($field)." format is not valid";
	}

	protected function validate_min(string $field, string $value, ?string $param)
	{
		if(strlen($value) < $param)
			$this->errors[$field][] = ucfirst($field)." must be at least ". $param ." characters long";
	}

	protected function validate_max(string $field, string $value, ?string $param)
	{
		if(strlen($value) > $param)
			$this->errors[$field][] = ucfirst($field)." must NOT exceed ". $param ." characters";
	}

	protected function validate_date(string $field, string $value, ?string $param)
	{
		if(!strtotime($value))
			$this->errors[$field][] = ucfirst($field)." is not valid";
	}

	protected function validate_match(string $field, string $value, ?string $param)
	{
		if($value !== ($this->data[$param] ?? ''))
			$this->errors[$field][] = ucfirst($field)." should match ". ucfirst($param);
	}

	protected function validate_alpha(string $field, string $value, ?string $param)
	{
		if(!preg_match("/^[a-zA-Z ]+$/", $value))
			$this->errors[$field][] = ucfirst($field)." should only contain letters";
	}

	protected function validate_alpha_numeric(string $field, string $value, ?string $param)
	{
		if(!preg_match("/^[a-zA-Z0-9 ]+$/", $value))
			$this->errors[$field][] = ucfirst($field)." should only contain letters & numbers";
	}

	protected function validate_no_space(string $field, string $value, ?string $param)
	{
		if(preg_match("/[\s]+/", $value))
			$this->errors[$field][] = ucfirst($field)." should not contain spaces";
	}


}