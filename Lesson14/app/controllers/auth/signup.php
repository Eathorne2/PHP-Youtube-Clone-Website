<?php

use \Core\Validator;

if(!empty($_POST))
{

	$val = new Validator($_POST);

	$val->setRules([
		'first_name'=>['required','min:3','max:30','alpha', 'no_space'],
		'last_name'=>['required','min:3','max:30','alpha', 'no_space'],
		'email'=>['required','email'],
		'password'=>['required','match:password_verify'],
	]);

	$errors = [];
	if($val->has_errors()){
		$errors = $val->errors;

		dd($errors);
	}else{
		//save to database
		dd("Save to DB");
	}
}

view('signup');