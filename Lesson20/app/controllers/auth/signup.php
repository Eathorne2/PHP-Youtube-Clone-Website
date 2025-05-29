<?php

use \Core\Validator;
use \Auth\User;
use \Auth\Country;

$data['errors'] = [];
if(!empty($_POST))
{

	$val = new Validator($_POST);

	$val->setRules([
		'first_name'=>[
			'name'=>'First Name',
			'rules'=>[
				['required','Please add a first name'],
				['min:3','Name must be at least 3 characters long'],
				['max:30','Name must not exceed 30 characters'],
				'alpha',
				'no_space'
			]
		],
		'last_name'=>['Last Name',[['required','Last name is required'],'min:3','max:30','alpha', 'no_space']],
		'gender'=>['Gender',[['required','Gender is required']]],
		'dob'=>['Date of Birth',[['required','Enter your date of birth']]],
		'country_id'=>['Country',[['required','Please select a Country']]],
		'terms'=>['Terms',[['required','Please accept the terms & conditions']]],
		'email'=>['required','email'],
		'password'=>['Password',['required',['match:password_verify','Make sure the passwords match']]],
	]);


	if($val->has_errors()){
		$data['errors'] = $val->errors;

	}else{
		//save to database
		$user = new User;
		if($id = $user->create($_POST))
		{
			//success
			redirect('login');
		}else{
			//failed to insert	
		}
	}
}

$country = new Country;
$data['countries'] = $country->getAll();

view('signup',$data);