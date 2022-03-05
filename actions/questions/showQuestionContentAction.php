<?php
require('actions/database.php');
$bd = new datalayer();

$questionExist =false;
$search_question ="";
$getAllQuestions=[];
$session = $_SESSION['id'];

if(isset( $_GET['search']) && !empty($_GET['search']) ){
    $search_question = $_GET['search'];
    $getAllQuestions = $bd-> readAndSearchAllQuestions($search_question);
}

if(isset($_GET['questionNr']) && !empty($_GET['questionNr'])){
    $id_question = $_GET['questionNr'];
    $getAllQuestions = $bd-> readAndSearchAllQuestions($search_question);
    foreach($getAllQuestions as $question){
        if($question['id'] === $id_question){
            $questionExist =true;
            $question_titel = $question['title'];
            $question_Content =  str_replace('<br />','',$question['content']);
            $question_description = str_replace('<br />','',$question['description']);
            $question_date = $question['date'];
            $question_pseudo_Author = $question['pseudo_author'];
            $question_id_Author = $question['id_author'];

            if($session === $question_id_Author ){
              $question_pseudo_Author ="ich";
            }
            
        }
    }
   
    if(!$questionExist){
        $alert = "danger";
        $msgAlert = 'Die Frage existiert nicht!';  
    }
   
} 


?>