<?php

namespace app\models;

use PDO;

class Profile extends \app\core\Model{
    public $profile_id; //pk
    public $user_id; //fk
    public $first_name;
    public $middle_name = '';
    public $last_name;

    //CRUD

    public function insert() {
        //create the sql statement
        $SQL = 'INSERT INTO profile (user_id,first_name,middle_name,last_name) VALUES (:user_id,:first_name,:middle_name,:last_name)';
        //prepare the sql statement
        $STATEMENT = self::$_conn->prepare($SQL);
        //store data in a variable
        $data = [
            'user_id' => $this->user_id,
            'first_name' => $this->first_name,
            'middle_name' => $this->middle_name,
            'last_name' => $this->last_name,
        ];
        $STATEMENT->execute($data);
        //execute the statement
    }

    //update
    public function update() {
    $SQL = 'UPDATE profile SET first_name=:first_name, middle_name=:middle_name, last_name =:last_name WHERE profile_id=:profile_id';
    //prepare statement
    $STATEMENT = self::$_conn->prepare($SQL);
    $data = [
        'profile_id' => $this->profile_id,
        'first_name' => $this->first_name,
        'middle_name' => $this->middle_name,
        'last_name' => $this->last_name,
    ];
    $STATEMENT->execute($data);
    }

    //getUsers

    
    public function getUser($user_id) {
        //sql statement
        $SQL = 'SELECT * FROM profile WHERE user_id = :user_id';
        //prepare statement
        $STATEMENT = self::$_conn->prepare($SQL);
        //execute statement
        $STATEMENT->execute(['user_id' => $user_id]);
        //choose fetching mode
        $STATEMENT->setFetchMode(PDO::FETCH_CLASS, 'app\models\Profile');
        //return the fetch result
        return $STATEMENT->fetch();
    }
    //delete 

    public function delete() {
        //sql statement
        $SQL = 'DELETE FROM profile WHERE profile_id = :profile_id';
        //prepare statement
        $STATEMENT = self::$_conn->prepare($SQL);
        //execute the statement by also providing the profile id
        $STATEMENT->execute(['profile_id' => $this->profile_id]);

        header('location:/Profile/creation');
    }
}