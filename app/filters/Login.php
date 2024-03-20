<?php
namespace app\filters;

#[\Attribute]  //to use for the profile
class Login implements \app\core\ActionFilter{

	public function redirected(){
		//make sure that the user is logged in
		if(!isset($_SESSION['user_id'])){
			header('location:/User/login');
			return true;
		}
		return false;//not denied
	}

}