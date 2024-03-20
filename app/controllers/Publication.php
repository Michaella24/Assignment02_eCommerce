<?php
namespace app\controllers;

//#[\app\filters\Login]
class Publication extends \app\core\Controller {


    function index($id1){
        $publication = new \app\models\Publication();

        $publication = $publication->get($id1);

        $this->view('Publication/index',$publication);
    }

    function create(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            $publication = new \app\models\Publication();

            $publication->profile_id = 1;
            $publication->publication_title = $_POST['title'];
            $publication->publication_text = $_POST['content'];
            $publication->publication_status = 1;

            $publication->insert();

            header('location:/Publication/index');

        }else{
            $this->view('Publication/create');
        }
    }

    function loadAll(){
        $publications = [];
        $publication = new \app\models\Publication();

        $publications = $publication->getAll();

        $this->view('Publication/home',['publications' => $publications]);
    }

}