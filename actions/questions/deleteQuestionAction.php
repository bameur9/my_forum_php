<?php

require('../database.php');

$bd = new datalayer();

$edit =false;
if(isset($_GET['questionNr']) && !empty($_GET['questionNr'])){
    $id_question = $_GET['questionNr'];
    foreach( $bd->getAllQuestions($_SESSION['id']) as $value){
      
        if( $id_question == $value['id']){
           $bd-> deleteQuestion($id_question);  
           header('Location: ../../my_questions.php'); 
        }
}

}else{
    $alert = "danger";
    $msgAlert = 'Keine Frage gefunden!';  
}





?>