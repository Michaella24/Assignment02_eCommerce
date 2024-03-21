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

    public function getComments($publicationId) {
        $commentHeaders = []; // Initialize an empty array to store comment headers
    
        $SQL = 'SELECT profile_id, timestamp, text FROM publication_comment WHERE publication_id = :publication_id';
    
        $STMT = self::$_conn->prepare($SQL);
    
        $STMT->execute([
            'publication_id' => $publicationId
        ]);
    
        while ($row = $STMT->fetch(PDO::FETCH_ASSOC)) {
            $profile_id = $row['profile_id'];
            $timestamp = $row['timestamp'];
            $text = $row['text'];
    
            // Construct comment header string and append it to the array
            $commentHeader = "<h5 style='font-size: 20px; font-weight: 400;'>Comment by $profile_id at $timestamp</h5>$text";
            $commentHeaders[] = $commentHeader;
        }
    
        return $commentHeaders; // Return the array of comment headers
    }

    //search method

    public function search($userSearch, $userSearchType) {
        $searchArray = [];
        if ($userSearchType === 'Search by Title') {

            $SQL = 'SELECT p.publication_id, p.publication_title, u.username 
            FROM publication p
            JOIN profile pr ON p.profile_id = pr.profile_id
            JOIN user u ON pr.user_id = u.user_id
            WHERE publication_title =:publication_title';
            
        $STATEMENT = self::$_conn->prepare($SQL);
        
        $STATEMENT->execute([
            'publication_title' => $userSearch
        ]);
        }
        else if  ($userSearchType === 'Search by Content'){
            $SQL = 'SELECT p.publication_id, p.publication_title, u.username 
            FROM publication p
            JOIN profile pr ON p.profile_id = pr.profile_id
            JOIN user u ON pr.user_id = u.user_id
            WHERE publication_text =:publication_text';
        
        $STATEMENT = self::$_conn->prepare($SQL);
        
        $STATEMENT->execute([
            'publication_text' => $userSearch
        ]);
        }
        
       
                while($row = $STATEMENT->fetch(PDO::FETCH_ASSOC)) {
                    $publication_id = $row['publication_id'];
                    $publication_title = $row['publication_title'];
                    $username = $row['username'];
                    $link = "<a href='/Publication/index/$publication_id'><h5>$publication_title</h5>by $username</a>";

                    $searchArray[] = $link;
                }
                return $searchArray;


    }
    
    
    



}