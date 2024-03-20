<?php
namespace app\models;

use PDO;

class Publication extends \app\core\Model {
    public $publication_id; // PK
    public $profile_id; // FK
    public $publication_title;
    public $publication_text;
    public $timestamp;
    public $publication_status;

    // publication_comment
    public $text;

    function insert(){
        $SQL = 'INSERT INTO publication(profile_id,publication_title,publication_text,timestamp,publication_status) VALUES (:profile_id,:publication_title,:publication_text,NOW(),:publication_status)';
        
        $STMT = self::$_conn->prepare($SQL);

        $STMT->execute(
            ['profile_id'=>$this->profile_id,
            'publication_title'=>$this->publication_title,
            'publication_text'=>$this->publication_text,
            'publication_status'=>$this->publication_status
        ]
        );
    }

    public function get($id) {
        $SQL = 'SELECT * FROM publication WHERE publication_id = :publication_id';
        $STMT = self::$_conn->prepare($SQL);

        $STMT->execute(
            [
                'publication_id'=>$id,
            ]
        );

        $STMT->setFetchMode(PDO::FETCH_CLASS,'app\models\Publication');
        return $STMT->fetch();
    }
        

    public function getAll(){
        $publicationIds = []; // Where all the links will be stored

        $SQL = 'SELECT p.publication_id, p.publication_title, u.username 
        FROM publication p
        JOIN profile pr ON p.profile_id = pr.profile_id
        JOIN user u ON pr.user_id = u.user_id';

        $STMT = self::$_conn->prepare($SQL);

        $STMT->execute();

        while ($row = $STMT->fetch(PDO::FETCH_ASSOC)) {
            $publicationId = $row['publication_id'];
            $publicationTitle = $row['publication_title'];
            $username = $row['username'];
        
            // Concatenate the username to the anchor text
            $link = "<a href='/Publication/index/$publicationId'><h5>$publicationTitle</h5>by $username</a>";

            $publicationIds[] = $link;
        }

        return $publicationIds;

    }

    public function uploadComment($publicationId){
        $SQL = 'INSERT INTO publication_comment(profile_id,publication_id,timestamp,text) VALUES (:profile_id,:publication_id,NOW(),:text)';

        $STMT = self::$_conn->prepare($SQL);

        $STMT->execute(
            [
                'profile_id'=>$this->profile_id,
                'publication_id'=>$publicationId,
                'text'=>$this->text,
            ]
            );
    }



}