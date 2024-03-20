<?php

namespace app\filters;

#[\Attribute]
 
class HasProfile implements \app\core\ActionFilter {
    
    public function redirected() {
    //instantiate the profile object
    $profile = new \app\models\Profile();
    //check if the user has a profile
    $profile = $profile->getUser($_SESSION['user_id']);
    
    if ($profile) { //if the user has a profile, return false. Else redirect the user to the creation page.
        return false;
    } else{
        header('location:/Profile/creation');
        return true;
    }
    }   
}
