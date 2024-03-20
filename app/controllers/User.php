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
        
        //1 check if the user has submitted data
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            //retrieve the submitted data to check if it match what the db
            $username = $_POST['username'];
            $password = $_POST['password'];

            //instantiate user

            $user = new \app\models\User();

            $user = $user->getUsername($username); //check if that username exists in the db
            //check if the user exists 

            if($user && password_verify($password, $user->password_hash)) {
                //then add the user id to the session to know that he is the one being logged in
                $_SESSION['user_id'] = $user->user_id;

                header('location:/Publication/home'); //to change to the actual home page for the user
            }
            else {
                //probably means wrong entries by the user so redirect to login
                header('location:/User/login');
            }
        }
        else { //if the user hasnt logged in yet, display the login page
            $this->view('User/login');
        }
    }

    function logout() {
        //destroy the user's session to say that the user is logged off
        session_destroy();

        //redirect the user
        header('location:/User/login');
    }


}