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

				$ruleParts = explode(':', $rule);
				$rule = $ruleParts[0];
				$param = $ruleParts[1] ?? null;
				if(method_exists($this, 'validate_'.$rule))
				{
					$method = 'validate_'.$rule;
					$this->$method($field,$param);
				}
			}
		}
	}

	public function has_errors()
	{
		return !empty($this->errors);
	}

	/*** validator methods **/

	protected function validate_required(string $field, ?string $param)
	{
		if(empty($this->data[$field]))
			$this->errors[$field][] = ucfirst($field)." is required";
	}

	protected function validate_email(string $field, ?string $param)
	{
		if(empty($this->data[$field]))
			$this->errors[$field][] = ucfirst($field)." is required";
	}

	protected function validate_regex(string $field, ?string $param)
	{
		if(empty($this->data[$field]))
			$this->errors[$field][] = ucfirst($field)." is required";
	}

	


}