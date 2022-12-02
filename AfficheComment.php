<?php
require('config.php');
//afficher les commentaire
$getrepOfQst= $bdd->prepare('SELECT user.id_user, full_name,id_question, rep_msg,date_rep FROM reponse
join user on(user.id_user=reponse.id_user) WHERE id_question = ? ORDER BY id_reponse asc');
$getrepOfQst->execute(array($idOfTheQuestion)); 
