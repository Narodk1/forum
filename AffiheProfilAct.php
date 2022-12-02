<?php
require('config.php');

//Récupérer l'identifiant de l'utilisateur
if(isset($_GET['idu']) AND !empty($_GET['idu'])){

    //L'id de l'utilisateur
    $idOfUser = $_GET['idu'];

    //Vérifier si l'utilisateur existe
    $checkIfUserExists = $bdd->prepare('SELECT id_user,full_name,email,date_inscri FROM user WHERE id_user = ?');
    $checkIfUserExists->execute(array($idOfUser));

    if($checkIfUserExists->rowCount() > 0){
        
        //Récupérer toutes les données de l'utilisateur
        $usersInfos = $checkIfUserExists->fetch();
        $user_id=$usersInfos['id_user'];
        $user_pseudo = $usersInfos['full_name'];
        $user_email = $usersInfos['email'];
        $user_date=$usersInfos['date_inscri'];

        
    }else{
        $errorMsg = "Aucun utilisateur trouvé";
    }
}else{
    $errorMsg = "Aucun utilisateur trouvé";
}