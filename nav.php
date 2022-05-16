<?php
    require('config.php');
    session_start();
?>
<nav class="navbar navbar-expand-md navbar-dark bg-dark "  style="padding-bottom:10px;">
      <div class="container">
       <a class="navbar-brand" href="index.php"> <h1> Ask For Learn </h1></a>
       <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav">
           <span class="navbar-toggler-icon"></span>
       </button>
       <div class="collapse navbar-collapse" id="main_nav" style="padding-top:10px ;">
         <ul class="navbar-nav ms-auto">
             <li class="nav-item active"> <a class="nav-link" href="index.php">Home </a> </li> 
             <?php
             if (isset($_SESSION['id'])) {
              $getAllMyQuestions = $bdd->prepare('SELECT id_question,id_user, qst_title, msg  FROM question
               WHERE id_user = ? ORDER BY id_question DESC');
              $getAllMyQuestions->execute(array($_SESSION['id']));
                 echo"<li class='navbar-item active '><a class='nav-link' href='ProfilForConnectUser.php'> Page Profile</a></li> 
                 <li class='navbar-item active '><a class='nav-link' href='logout.php'>Log Out</a></li>   ";
             }else{
               echo"<li class='navbar-item active '><a class='nav-link' href='login.php'> login</a></li> 
               <li class='navbar-item active '><a class='nav-link' href='logout.php'></a></li>";
             }
             ?>
             <!-- <li class="navbar-item active "><a class="nav-link" href="login.php"> Login</a></li> 
             <li class="navbar-item active "><a class="nav-link" href=""> </a></li>    -->
         <form class="d-flex" method="GET">
           <input class="form-control me-2" type="search" placeholder="Search" name="search" aria-label="Search">
           <button class="btn btn-outline-success" type="submit">Search</button>
         </form>
         </ul>   
       </div>
       </div>
       </nav>