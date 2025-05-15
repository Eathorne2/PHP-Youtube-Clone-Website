<?php

use \Core\Validator;

if(!empty($_POST))
{

	$val = new Validator($_POST);

	$val->setRules([
		'first_name'=>[
			'name'=>'My First Name',
			'rules'=>[
				[
					'rule'=>'required',
					'error_message'=>'Please add a first name'
				],
				['min:3','Text must be at least 3 chars long'],
				'max:30',
				'alpha',
				'no_space'
			]
		],
		'last_name'=>['Sir name',[['required','Dis name is required'],'min:3','max:30','alpha', 'no_space']],
		'email'=>['required','email'],
		'password'=>['Password',['required',['match:password_verify','Make sure the passwords match']]],
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