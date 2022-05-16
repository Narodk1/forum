<?php
include 'config.php';
$getRecentUser = $bdd->query('SELECT full_name from user  having(max(id_user)) order by id_user asc');
$Ruser=$getRecentUser->fetch();