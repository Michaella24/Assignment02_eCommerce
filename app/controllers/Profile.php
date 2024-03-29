<?php
namespace app\controllers;

#[\app\filters\Login] //check if the user is logged in before hand
class Profile extends \app\core\Controller {

    #[\app\filters\HasProfile]
    public function profilePage() {
        // Get the user profile
        $userProfile = new \app\models\Profile();
        $userProfile = $userProfile->getUser($_SESSION['user_id']);
        
        // Get the publications associated with the user profile
        $publicationsModel = new \app\models\Publication();
        $publications = $publicationsModel->getByProfile($userProfile->profile_id);

        $comments = $publicationsModel->getCommentByProfile($userProfile->profile_id);
        
        // Prepare the data to pass to the view
        $data = [
            'profile' => $userProfile,
            'publications' => $publications,
            'comments' => $comments,
        ];
        
        // Pass data to the view
        $this->view("Profile/home", $data);
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
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        //modify the profile information
        $profile->first_name = $_POST['first_name'];
        $profile->middle_name = $_POST['middle_name'];
        $profile->last_name = $_POST['last_name'];
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
        //check if the user has submit the delete
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $profile->delete();
            header('location:/Profile/creation');
        }
        else {
            $this->view('Profile/delete',$profile);
        }
        //call the delete method
        
        //redirect the user to the publication page or Profile creation ?
        

        // if($_SERVER['REQUEST_METHOD'] === 'POST'){
		// 	$profile->delete();
		// 	header('location:/Profile/index');
		// }else{
		// 	$this->view('Profile/delete',$profile);
		// }
    }
}