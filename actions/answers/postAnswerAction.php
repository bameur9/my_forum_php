<?php

if(isset($_POST['validate'])){

    if(!empty($_POST['commentar'])){
        $user_answer = nl2br(htmlspecialchars($_POST['commentar']));
        $user_answer_date = date('d/m/Y');

        $bd->addAnswer(array(
            'id_author'=> $session,
            'pseudo_author'=>$_SESSION['pseudo'],
            'id_question' =>$id_question,
            'content' =>$user_answer,
            'date' =>$user_answer_date
        ));
    }
}



?>