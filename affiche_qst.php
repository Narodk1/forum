<?php
require('config.php');
$getAllMyQuestions = $bdd->prepare('SELECT id_user, qst_title, msg FROM question WHERE id_user = ? ORDER BY id_user DESC');
$getAllMyQuestions->execute(array($_SESSION['id']));

?>