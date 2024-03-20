<?php
namespace app\controllers;

class Publication extends \app\core\Controller {


    function home() { //to change, this was just for me to test my login
        $this->view('Publications/index');
    }
}