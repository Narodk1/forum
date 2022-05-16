<?php

require('config.php');

if(isset($_POST['validate']) and !empty($_SESSION['id'])){

    if(!empty($_POST['comment'])){

        $user_answer = nl2br(htmlspecialchars($_POST['comment']));
        $reponse_date = date('d/m/Y');
        $insertcomment = $bdd->prepare('INSERT INTO reponse(id_user, id_question, rep_msg,date_rep)VALUES(?,?, ?, ?)');
        $insertcomment->execute(array($_SESSION['id'], $idOfTheQuestion, $user_answer,$reponse_date));

    }else{
        echo 'replissez le champs';
    }

}