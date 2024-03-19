<?php
namespace app\controllers;

class User extends \app\core\Controller {
    
    function register() {
        //check if the user has submit its information
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = new \app\models\User();

            $user->username = $_POST['username'];
            $user->password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT); //secure the password
            $user->insert();

            //redirect to the User login once the client has registered
            header('location:/User/login');
        }
        else { //if the user has not submit its information redirect to the register page again
            $this->view('User/register');
        }
    }

    function login() {
        //make the user login page and check if it matches with what the user has registered
        //check for access filters 
    }

}