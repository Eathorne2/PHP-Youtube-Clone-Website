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

	public $primaryKey = 'id';

	public function __construct(array $data)
	{
		parent::__construct();
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
			
			$input_name = ucfirst($field);
			if(isset($rules['name']) || (count($rules) == 2 && is_string($rules[0]) && is_array($rules[1])))
			{
				$input_name = $rules['name'] ?? ($rules[0] ?? '');
				$rules = $rules['rules'] ?? ($rules[1] ?? []);
			}

			foreach ($rules as $rule) {

				$error_message = '';
				if(is_array($rule))
				{
					$error_message = $rule['error_message'] ?? ($rule[1] ?? '');
					$rule = $rule['rule'] ?? ($rule[0] ?? '');
				}

				$value = $this->data[$field] ?? null;
				$value = trim($value);

				$ruleParts = explode(':', $rule);
				$rule = $ruleParts[0];
				$param = $ruleParts[1] ?? null;
				if(method_exists($this, 'validate_'.$rule))
				{
					$method = 'validate_'.$rule;
					$this->$method($field, $value, $param, [
						'input_name'=>$input_name,
						'error_message'=>$error_message,
					]);
				}
			}
		}
	}

	public function has_errors()
	{
		return !empty($this->errors);
	}

	/*** validator methods **/

	protected function validate_required(string $field, string $value, ?string $param, array $meta)
	{
		if(empty($value))
			$this->errors[$field][] = empty($meta['error_message']) ? $meta['input_name']." is required":$meta['error_message'];
	}

	protected function validate_email(string $field, string $value, ?string $param, array $meta)
	{

		if(!filter_var($value,FILTER_VALIDATE_EMAIL))
			$this->errors[$field][] = empty($meta['error_message']) ? $meta['input_name']." is not valid":$meta['error_message'];

	}

	protected function validate_regex(string $field, string $value, ?string $param, array $meta)
	{
		if(!preg_match("/$param/", $value))
			$this->errors[$field][] = empty($meta['error_message']) ? $meta['input_name']." format is not valid":$meta['error_message'];
	}

	protected function validate_min(string $field, string $value, ?string $param, array $meta)
	{
		if(strlen($value) < $param)
			$this->errors[$field][] = empty($meta['error_message']) ? $meta['input_name']." must be at least ". $param ." characters long":$meta['error_message'];
	}

	protected function validate_max(string $field, string $value, ?string $param, array $meta)
	{
		if(strlen($value) > $param)
			$this->errors[$field][] = empty($meta['error_message']) ? $meta['input_name']." must NOT exceed ". $param ." characters":$meta['error_message'];
	}

	protected function validate_date(string $field, string $value, ?string $param, array $meta)
	{
		if(!strtotime($value))
			$this->errors[$field][] = empty($meta['error_message']) ? $meta['input_name']." is not valid":$meta['error_message'];
	}

	protected function validate_match(string $field, string $value, ?string $param, array $meta)
	{
		if($value !== ($this->data[$param] ?? ''))
			$this->errors[$field][] = empty($meta['error_message']) ? $meta['input_name']." should match ". ucfirst($param):$meta['error_message'];
	}

	protected function validate_alpha(string $field, string $value, ?string $param, array $meta)
	{
		if(!preg_match("/^[a-zA-Z ]+$/", $value))
			$this->errors[$field][] = empty($meta['error_message']) ? $meta['input_name']." should only contain letters":$meta['error_message'];
	}

	protected function validate_alpha_numeric(string $field, string $value, ?string $param, array $meta)
	{
		if(!preg_match("/^[a-zA-Z0-9 ]+$/", $value))
			$this->errors[$field][] = empty($meta['error_message']) ? $meta['input_name']." should only contain letters & numbers":$meta['error_message'];
	}

	protected function validate_no_space(string $field, string $value, ?string $param, array $meta)
	{
		if(preg_match("/[\s]+/", $value))
			$this->errors[$field][] = empty($meta['error_message']) ? $meta['input_name']." should not contain spaces":$meta['error_message'];
	}

	protected function validate_unique(string $field, string $value, ?string $param, array $meta)
	{
		if(!empty($this->data[$this->primaryKey]))
		{
			$sql = "select count(*) as total from $param where $field = :value && $this->primaryKey != :key limit 1";
			$row = $this->fetch($sql,['value'=>$value,'key'=>$this->data[$this->primaryKey]]);
		}else{

			$sql = "select count(*) as total from $param where $field = :value limit 1";
			$row = $this->fetch($sql,['value'=>$value]);
		}
		if($row->total > 0)
			$this->errors[$field][] = empty($meta['error_message']) ? $meta['input_name']." must be unique":$meta['error_message'];
	}


}