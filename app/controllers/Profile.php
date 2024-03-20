<?php
namespace app\controllers;

#[\app\filters\Login] //check if the user is logged in before hand
class Profile extends \app\core\Controller {

    #[\app\filters\HasProfile]
    public function profilePage() {
    //instantiate the profile object 
    $profile = new \app\models\Profile();
    //get the information of the profile
    $profile = $profile->getUser($_SESSION['user_id']); //get the id from the current logged in user session

    //send the data to the view and display it
    $this->view('Profile/home',$profile);
    }

    public function create() {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            //instantiate the profile object
            $profile = new \app\models\Profile;
            //fetch the data given from the user through post
            $profile->user_id = $_SESSION['user_id'];
            $profile->first_name = $_POST['first_name'];
            $profile->middle_name = $_POST['middle_name'];
            $profile->last_name = $_POST['last_name'];
            //call the insert method from the profile object
            $profile->insert();
            //redirect the user to the Profile home page
            header('location:/Profile/home');
        }
        //else redirect the user to the Profile creation page
        else {
            $this->view('Profile/creation');
        }
    }

    public function modify() {
        //instantiate the profile object
        $profile = new \app\models\Profile;
        //get the profile of the user
        $profile = $profile->getUser($_SESSION['user_id']);
        //check if user submitted the information
        if ($_SERVER['REQUEST_METHOD' === 'POST']) {
        //modify the profile information
        $profile->first_name = $_POST['first_name'];
        $profile->first_name = $_POST['middle_name'];
        $profile->first_name = $_POST['last_name'];
        //call the update function from the profile object
        $profile->update();
        //redirect the user to the profile home page
        header('location:/Profile/home');
        }
        else {
            $this->view('Profile/modify', $profile); //send the profile bcs you want the view to have the data displayed already so that the user can change it
        }
        //else redirect the user to the Profile modify page
    }

    public function delete() {
        //instantiate the profile object
        $profile = new \app\models\Profile();
        //get the profile of the user   
        $profile = $profile->getUser($_SESSION['user_id']);
        //call the delete method
        $profile->delete();
        //redirect the user to the publication page or Profile creation ?
        header('location:/Profile/delete');
    }
}