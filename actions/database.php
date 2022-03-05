<?php
if (!isset($_SESSION)) { session_start(); }

//Configuration
define("DB_USER", "root"); 
define("DB_PASSWORD", "");
define("HOST", "localhost");
define("DB_NAME", "forum");

class DataLayer{
    private $connection;

    function __construct()
    {
        $var = "mysql:host =".HOST.";db_name=".DB_NAME.";charset=utf8;";

        try{    //DB_USER & DB_PASSWORD sind in Config
                $this->connection = new PDO($var,DB_USER, DB_PASSWORD);
        }catch(PDOException $e){
               echo $e->getMessage();

        }
    }

    public function checkIfUserAlreadyExists ($pseudo){
        $sql = "SELECT * FROM ".DB_NAME.".`users` WHERE pseudo = :pseudo";
        try{
            $result = $this->connection->prepare($sql);
            $result->execute(array(':pseudo'=>$pseudo));

            if($result -> rowCount() == 0){
                return NULL;
            }else
             return $result->fetch();
            
        }catch(PDOException $e){
            return  $e->getMessage();
        }
    }

    public function addUsers($users){
        $sql = "INSERT INTO ".DB_NAME.".`users` (pseudo, firstname, lastname, password) VALUES (:pseudo, :firstname, :lastname, :password)";
        try{
            $result = $this->connection->prepare($sql);
            $data = $result->execute(array(
                ':pseudo'=>$users["pseudo"],
                ':firstname' => $users["firstname"],
                ':lastname' => $users["lastname"],
                ':password' => $users["password"]));
            
            if($data){
                return $this->connection->lastInsertId();;
            }else false;
        }catch(PDOException $e){
            return  $e->getMessage();
        }
    }

    public function getInfosOfThisUserReq($id){
        $sql = "SELECT * FROM ".DB_NAME.".`users` WHERE id = :id";
        try{
            $result = $this->connection->prepare($sql);
            $result->execute(array(':id'=>$id));

            while($data = $result->fetch(PDO::FETCH_ASSOC)){
                $user =[];
                $user['id']= $data['id'];
                $user['pseudo']= $data['pseudo'];
                $user['firstname']= $data['firstname'];
                $user['lastname']= $data['lastname'];

            }
            return $user;  
        }catch(PDOException $e){
            return  $e->getMessage();
        }
    }


    public function publishQuestion($post){
        $sql = "INSERT INTO ".DB_NAME.".`questions` (title, description,content, id_author, pseudo_author, date) VALUES (:title, :description, :content ,:id_author, :pseudo_author, :date)";
        try{
            $result = $this->connection->prepare($sql);
            $data = $result->execute(array(
                ':title'=>$post["title"],
                ':description' => $post["description"],
                ':content' => $post["content"],
                ':id_author' => $post["id_author"],
                ':pseudo_author' => $post["pseudo_author"],
                ':date' => $post["date"]
            )
            );
            
            if($data){
                return $this->connection->lastInsertId();;
            }else false;
        }catch(PDOException $e){
            return  $e->getMessage();
        }

    }


    public function getAllQuestions($id){
        $sql = "SELECT id, title, description,date ,content FROM ".DB_NAME.".`questions` WHERE id_author= :id ORDER BY id DESC";
        try{
            $result = $this->connection->prepare($sql);

            $result->execute(array(':id' =>$id));
            
           return $result->fetchAll(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            
            return  $e->getMessage();
        }
    }

    public function updateQuestion($post){
        $sql = "UPDATE ".DB_NAME.".`questions` SET title = :title, description = :description,content= :content WHERE id = :id";
        try{
            $result = $this->connection->prepare($sql);
            $data = $result->execute(array(
                ':id' =>$post['id'],
                ':title'=>$post["title"],
                ':description' => $post["description"],
                ':content' => $post["content"],
            )
            );
            
            if($data){
                return $this->connection->lastInsertId();;
            }else false;
        }catch(PDOException $e){
            return  $e->getMessage();
        }
    }

    public function deleteQuestion($id_question){
        $sql = "DELETE FROM ".DB_NAME.".`questions`  WHERE  id= :id";
        try{
            $result = $this->connection->prepare($sql);
            $data = $result->execute(array(':id' =>$id_question));
        }catch(PDOException $e){
            return  $e->getMessage();
        }
    }

    function readAndSearchAllQuestions($usersSearch ){
        if(empty($usersSearch)){
            $sql = "SELECT id, title, description, content, date ,id_author, pseudo_author  FROM ".DB_NAME.".`questions` ORDER BY id DESC LIMIT 0,5";
        }else{
            $sql = "SELECT id, title, description, content, date, id_author, pseudo_author FROM ".DB_NAME.".`questions` WHERE title LIKE '%".$usersSearch."%' ORDER BY id DESC";
        }
        
        try{
            $result = $this->connection->query($sql);
            
           return $result->fetchAll(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            return  $e->getMessage();
        }
    }

    public function addAnswer($commentar){
        $sql = "INSERT INTO ".DB_NAME.".`answers` (id_author,pseudo_author, id_question,content, date) VALUES (:id_author,:pseudo_author, :id_question, :content, :date)";
        try{
            $result = $this->connection->prepare($sql);
            $data = $result->execute(array(
                ':id_author'=>$commentar["id_author"],
                ':pseudo_author'=>$commentar["pseudo_author"],
                ':id_question' => $commentar["id_question"],
                ':content' => $commentar["content"],
                ':date' => $commentar["date"]));
            
            if($data){
                return $this->connection->lastInsertId();;
            }else false;
        }catch(PDOException $e){
            return  $e->getMessage();
        }
    }


    function showAllCommentare($id_question ){
        $sql = "SELECT * FROM ".DB_NAME.".`answers` WHERE id_question = :id_question ORDER BY id DESC";
        
        try{
            $result = $this->connection->prepare($sql);
            $result->execute(array(":id_question"=>$id_question));
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            return  $e->getMessage();
        }
    }
    
}



?>