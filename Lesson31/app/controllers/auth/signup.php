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
		'channel_name'=>[
			'name'=>'Channel Name',
			'rules'=>[
				['required','Channel name is required'],
				['alpha_numeric','Channel name cant have symbols'],
				['max:100']
			]
		],
		'last_name'=>['Last Name',[['required','Last name is required'],'min:3','max:30','alpha', 'no_space']],
		'gender'=>['Gender',[['required','Gender is required']]],
		'dob'=>['Date of Birth',[['required','Enter your date of birth']]],
		'country_id'=>['Country',[['required','Please select a Country']]],
		'terms'=>['Terms',[['required','Please accept the terms & conditions']]],
		'email'=>['required','email','unique:users'],
		'password'=>['Password',['required',['match:password_verify','Make sure the passwords match']]],
	]);


	if($val->has_errors()){
		$data['errors'] = $val->errors;

	}else{
		//save to database
		$user = new User;
		if($id = $user->create($_POST))
		{
			//create the channel
			$channel = new \Auth\Channel;
			$_POST['user_id'] = $id;
			$_POST['name'] = $_POST['channel_name'];
			$_POST['slug'] = $channel->createSlug($_POST['channel_name']);
			$_POST['handle'] = $channel->createHandle($_POST['channel_name']);

			$folder = 'uploads/';
			if(!file_exists($folder))
				mkdir($folder,0777,true);

			$imagefilename = $folder.$_POST['slug'].'jpg';
			$_POST['image'] = $imagefilename;

			$image = imagecreatetruecolor(150, 150);
			$grey = imagecolorallocate($image, 128, 128, 128);
			imagefill($image, 0, 0, $grey);
			imagejpeg($image,$imagefilename);
			imagedestroy($image);

			$channel->create($_POST);

			//success
			flashMessage(mode: 'success',msg: 'Signup complete. Please login to continue');
			redirect('login');
		}else{
			//failed to insert	
		}
	}
}

$country = new Country;
$data['countries'] = $country->getAll();

$template = new \Core\Template;
$template->render('signup',$data);