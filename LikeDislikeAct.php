<?php
require('config.php');
if(isset($_GET['t'],$_GET['id']) and !empty($_GET['t'])and !empty($_GET['id']) ){
    $getid = (int) $_GET['id'];
   $gett = (int) $_GET['t'];
   $sessionid = 5;
   $check = $bdd->prepare('SELECT id FROM articles WHERE id = ?');
   $check->execute(array($getid));
   if($check->rowCount() == 1) {
       
   }
}