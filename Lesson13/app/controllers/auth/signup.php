<?php

use \Core\Validator;

if(!empty($_POST))
{

	$val = new Validator($_POST);

	$val->setRules([
		'username'=>['required','min:3','max:30','alpha'],
		'email'=>['required','email'],
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