<?php

require('config.php');

//Vérifier si l'id de la question est bien passé en paramètre dans l'URL
if(isset($_GET['id']) AND !empty($_GET['id'])){

    $idOfQuestion = $_GET['id'];

    //Vérifier si la question existe
    $checkIfQuestionExists = $bdd->prepare('SELECT * FROM question WHERE id_question = ?');
    $checkIfQuestionExists->execute(array($idOfQuestion));

    if($checkIfQuestionExists->rowCount() > 0){

        //Récupérer les données de la question
        $questionInfos = $checkIfQuestionExists->fetch();
        if($questionInfos['id_user'] == $_SESSION['id']){//verifier si le user est le meme 
            
            $question_title = $questionInfos['qst_title'];
            $question_msg= $questionInfos['msg'];
            $question_categorie = $questionInfos['categorie'];
            $qst_tag= $questionInfos['tags'];
            $question_msg = str_replace('<br />', '', $question_msg);
        }else{
            $errorMsg = "Vous n'êtes pas l'auteur de cette question";
        }

    }else{
        $errorMsg = "Aucune question n'a été trouvée";
    }

}else{
    $errorMsg = "Aucune question n'a été trouvée";
}