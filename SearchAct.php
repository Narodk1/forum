<?php

require('config.php');

//Récupérer les questions par défaut sans recherche
$getAllQuestions = $bdd->query('SELECT id_question, user.id_user, qst_title, msg, tags,categorie,date, full_name FROM question 
 join user on (question.id_user=user.id_user) ORDER BY question.id_question DESC');

//Vérifier si une recherche a été rentrée par l'utlisateur
if(isset($_GET['search']) AND !empty($_GET['search'])){

    //La recherche
    $usersSearch = $_GET['search'];

    $getAllQuestions = $bdd->query('SELECT id_question, user.id_user, qst_title, msg, categorie ,tags,date,full_name FROM question 
     join user on (question.id_user=user.id_user) WHERE qst_title LIKE "%'.$usersSearch.'%" or categorie LIKE "%'.$usersSearch.'%"  ORDER BY question.id_question DESC');

}