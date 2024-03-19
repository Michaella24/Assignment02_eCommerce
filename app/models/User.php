<?php

namespace app\models;

class User extends app\core\Model {
    public username;
    public password_hash;


   //insert
    public function insert() {
        //sql statement
        $SQL = 'INSERT INTO user (username, password_hash) VALUES (:username, :password_hash)';
        //prepare statement
        $STATEMENT = self::$_conn->prepare($SQL);
        //execute
        $STATEMENT->execute($data);
    }
   //delete (we are not actually deleting because of dependencies but rather deactivating the account)
    public function delete() {
        $SQL = 'DELETE user WHERE user_id = :user_id';
        $STATEMENT = self::$_conn->prepare($SQL);
        $data = ['user_id'=>$this->user_id, 'active'=>0]; //deactivate the user
        $STATEMENT->execute($data)
    }
    //DO I REALLY NEED A DELETE ??
}