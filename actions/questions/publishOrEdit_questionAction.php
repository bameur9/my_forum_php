<?php

//include_once('../database.php'); 
include('./actions/database.php'); 

$bd = new DataLayer();
$edit = false;
$values=[];

//Edit
if(isset($_GET['questionNr'])){
    $id_question = $_GET['questionNr'];
  
    foreach( $bd->getAllQuestions($_SESSION['id']) as $value){
      
            if( $id_question == $value['id']){
                $edit =true;
                $values['title'] = $value['title'];
                $values['description'] = $value['description'];
                $values['content'] = str_replace('<br />', '',$value['content']);
            }
    }
    if( !$edit){
        $alert = "danger";
        $msgAlert = 'Aktion nicht möglich';  
    }
}

//Publish
if(isset($_POST['validate'])){
    if(!empty($_POST['title']) && !empty($_POST['description']) && !empty($_POST['content'])){
        
        $question_title = htmlspecialchars($_POST['title']);

        $question_description =nl2br( htmlspecialchars($_POST['description']));

        $question_content = nl2br(htmlspecialchars($_POST['content']));

        $question_date = date('d/m/Y');
        $question_id_author =$_SESSION['id'];
        $question_pseudo_author = $_SESSION['pseudo'];

        if(!$edit){
           $quest= $bd->publishQuestion(array(
                "title" =>$question_title,
                "description" => $question_description,
                "content" =>  $question_content,
                "id_author" => $question_id_author,
                "pseudo_author" =>  $question_pseudo_author,
                "date" =>  $question_date,
            ));
        }else {
          
            $bd ->updateQuestion(array(
                'id'=>$_GET['questionNr'],
                "title" =>$question_title,
                "description" => $question_description,
                "content" =>  $question_content,
            ));
        }

        header('Location: ../../forum/');
    }
    else {
        $alert = "danger";
        $msgAlert = 'Füllen Sie die Felder aus';  
    }
}

