<?php

require('config.php');
require('securityAction.php');

//Validation du formulaire
if(isset($_POST['modify'])){

    //Vérification des champs empty est deja fait en JS 
    if(!empty($_POST['titleqst']) AND !empty($_POST['msg']) AND !empty($_POST['categorie'])){

     
        $new_question_title = htmlspecialchars($_POST['titleqst']);
        $new_question_msg = nl2br(htmlspecialchars($_POST['msg']));
        $new_question_categorie = htmlspecialchars($_POST['categorie']);
        $new_question_tags = htmlspecialchars($_POST['tags']);

        //Modifier les informations de la question qui possède l'id rentré en paramètre dans l'URL
        $editQuestion = $bdd->prepare('UPDATE question SET qst_title = ?, msg = ?, tags = ?, categorie = ? WHERE id_question = ?');
        $editQuestion->execute(array(
            $new_question_title ,
            $new_question_msg,         
            $new_question_tags,
            $new_question_categorie,
            $idOfQuestion
            )
        );

        //Redirection vers la page d'affichage des questions de l'utilisateur
        header('Location: ProfilForConnectUser.php');

    }else{
        $errorMsg = "Veuillez compléter tous les champs...";
    }

}