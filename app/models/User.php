<?php

namespace app\models;

use PDO;

class User extends \app\core\Model {
    public $user_id;
    public $username;
    public $password_hash;


   //insert
    public function insert() {
        //sql statement
        $SQL = 'INSERT INTO user (username, password_hash) VALUES (:username, :password_hash)';
        //prepare statement
        $STATEMENT = self::$_conn->prepare($SQL);
        //insert the data
        $data = [
            'username' => $this->username,
            'password_hash' => $this->password_hash
        ];
        //execute
        $STATEMENT->execute($data);
    }
   //delete (we are not actually deleting because of dependencies but rather deactivating the account)
    public function delete() {
        $SQL = 'DELETE user WHERE user_id = :user_id';
        $STATEMENT = self::$_conn->prepare($SQL);
        $data = ['user_id'=>$this->user_id, 'active'=>0]; //deactivate the user
        $STATEMENT->execute($data);
    }
    //DO I REALLY NEED A DELETE ?? not necessary but could be nice

    //read all the data to check if a user is actually logged in

    //get the username

    public function getUsername($username) {
        $SQL = 'SELECT * FROM user WHERE username = :username'; //sql statement
        $STATEMENT = self::$_conn->prepare($SQL);  //prepare the statement
        $STATEMENT->execute(['username' => $username]); //pass the data you have and execute the statement
        $STATEMENT->setFetchMode(PDO::FETCH_CLASS, 'app\models\User'); //fetch the data you are looking for
        return $STATEMENT->fetch(); //return the data for your specific user
    }
}