<?php
try {
    $bdd=new PDO('mysql:host=localhost;dbname=pfe;charset=utf8','root','Grammaire1?');
} catch (Exception $e) {
    die('erreur '.$e->getMessage());
}
?>