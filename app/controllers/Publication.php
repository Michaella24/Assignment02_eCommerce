<?php
namespace app\controllers;

//#[\app\filters\Login]
class Publication extends \app\core\Controller {

    function index($id1) {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $publicationComment = new \app\models\Publication();
    
            $publicationComment->profile_id = 1;
            $publicationComment->publication_id = $id1;
            $publicationComment->text = $_POST['comment'];
    
            $publicationComment->uploadComment($id1);
            header("location:/Publication/index/$id1");
            exit();
        }
    
        // If it's not a POST request, continue with the rest of the function
        $publication = new \app\models\Publication();
    
        // Get the publication details
        $publicationDetails = $publication->get($id1);
    
        // Get the comment headers for the publication
        $commentHeaders = $publication->getComments($id1);
    
        // Pass both publication details and comment headers to the view
        $data = [
            'publication' => $publicationDetails,
            'commentHeaders' => $commentHeaders
        ];
    
        // Pass data to the view
        $this->view("Publication/index", $data);
    }
    
    

    function create(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            $publication = new \app\models\Publication();

            $publication->profile_id = 1;
            $publication->publication_title = $_POST['title'];
            $publication->publication_text = $_POST['content'];
            $publication->publication_status = 1;

            $publication->insert();

            header('location:/Publication/home');

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

    function logout(){
        session_destroy();

        header("Location:/Publication/home");
        exit();
    }
}