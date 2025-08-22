<?php

use \Auth\User;
use \Auth\Session;

$data['errors'] = [];
if(!empty($_POST))
{

	//get user row
	$user = new User;
	$ses = new Session;
	if($row = $user->getByEmail($_POST['email']))
	{
		if(password_verify($_POST['password'], $row->password))
		{

			//success
			$ses->auth($row);
			redirect('admin');
		}else{
			flashMessage(mode: 'fail',msg: 'Wrong email or password');
		}

	}else{
		//failed to login	
		flashMessage(mode: 'fail',msg: 'Wrong email or password');
	}

}


$template = new \Core\Template;
$template->render('login',$data);