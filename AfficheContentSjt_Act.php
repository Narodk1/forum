<?php
require('config.php');

if(isset($_GET['id']) AND !empty($_GET['id'])){

    $idOfTheQuestion = $_GET['id'];

    //Vérifier si la question existe
    $check = $bdd->prepare('SELECT * FROM question WHERE id_question = ?');
    $check->execute(array($idOfTheQuestion));

    if($check->rowCount() > 0){

        //Récupérer toutes les data de la questions
        $questionsInfos = $check->fetch();

        //Stocker les datas de la question dans des variables propres.
        $id=$questionsInfos['id_question'];
        $question_title = $questionsInfos['qst_title'];
        $question_msg = $questionsInfos['msg'];
        $question_id_author = $questionsInfos['id_user'];
        $question_categorie= $questionsInfos['categorie'];    
        $question_publication_date = $questionsInfos['date'];
    }else{
        $errorMsg = "Aucune question n'a été trouvée";
    }

}else{
    $errorMsg = "Aucune question n'a été trouvée";
}