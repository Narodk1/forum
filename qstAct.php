<?php
session_start();
require('config.php');
$question_title = htmlspecialchars($_POST['titleqst']);
$question_tags = htmlspecialchars($_POST['tags']);
$question_categorie = htmlspecialchars($_POST['categorie']);
$question_msg = nl2br(htmlspecialchars($_POST['msg']));
$question_date = date('d/m/Y');
$question_id_author = $_SESSION['id'];
//Valider le formulaire
if (isset($_POST['publish']) && !empty($_SESSION['id'])) {
    if (!empty($question_categorie) && !empty($question_msg) && !empty($question_title)) {

        //Insérer la question sur la question
        $insertQuestionOnWebsite = $bdd->prepare('INSERT INTO question( id_user, msg,qst_title,categorie,tags,date)VALUES(?, ?, ?, ?, ?,?)');
        $insertQuestionOnWebsite->execute(
            array(
                $question_id_author,
                $question_msg,
                $question_title,
                $question_categorie,
                $question_tags,
                $question_date
            )
        );
        header('location:index.php');
    } else {
        echo "Veuillez compléter tous les champs..."; //il est deja verifier en jS
    }
} else {
    header('location:login.php');
}
