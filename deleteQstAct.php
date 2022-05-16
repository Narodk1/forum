<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<?php
session_start();
require('securityAction.php');

require('config.php');

if(isset($_GET['id']) AND !empty($_GET['id'])){

    $idOfTheQuestion = $_GET['id'];

    //Vérifier si la question existe
    $checkIfQuestionExists = $bdd->prepare('SELECT id_user FROM question WHERE id_question = ?');
    $checkIfQuestionExists->execute(array($idOfTheQuestion));

    if($checkIfQuestionExists->rowCount() > 0){

        $questionsInfos = $checkIfQuestionExists->fetch();
        if($questionsInfos['id_user'] == $_SESSION['id']){

            $deleteThisQuestion = $bdd->prepare('DELETE FROM question WHERE id_question = ?');
            $deleteThisQuestion->execute(array($idOfTheQuestion));

            header('Location: ProfilForConnectUser.php');

        }else{
           ?> <br><div class="alert alert-danger"style="width:50%"><strong>cet question ne vous appartient pas  ! </strong></div> 
        
     <?php
        }
       }else{
           ?>
        <br><div class="alert alert-danger"style="width:50%"><strong>Aucune question n'a été trouvée  ! </strong></div> 
  <?php  
    }


}else{?>
        <br><div class="alert alert-danger"style="width:50% "><strong>Aucune question n'a été trouvée  ! </strong></div> 
        <?php
}