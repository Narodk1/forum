<?php
require_once 'config.php';

if(!empty($_POST['email'])){
    $email = htmlspecialchars($_POST['email']); 
    $token=uniqid();
        $url = "http://localhost/pfe/mdp_change.php/token?t=$token";
        $msg="voici votre lien pour renitialisation de mot de passe : ".$url;
        $header="From:narododo007@gmail.com";
        $sbjt='mot de passe oublier';
        if (mail( $email,$sbjt, $msg , $header) ) {
            $sql="UPDATE user set tokken=? where email=? ";
            $st=$bdd->prepare($sql);
            $st->execute([$token,$email]);
           echo "mail envoyer"; 
        }else{
          echo "une erreur de bzaf" ;
            }
    }else{
        echo "remplissez les champs";
        #header('Location: ../index.php');
        #die();
    }

?>




<!-- 
// session_start();
// require_once('config.php');
// if(isset($_POST['em']) ){
//     $token=uniqid();
//     $url="http://localhost/pfe/mdp_change.php";
//     $msg="voici votre lien pour renitialisation de mot de passe :".$url;
//     $header="From:narododo007@gmail.com";
//     $sbjt='mot de passe oublier';
//     $email=htmlspecialchars($_POST['em']);
//     $check=$bdd->prepare('SELECT full_name,email,password from user where email=?');
//     $check->execute(array($email));
//     $data=$check->fetch();//apporter line par line
//     $row=$check->rowCount();
//     if($row==1){
//         if (mail( $email,$sbjt, $msg , $header) ) {
//             $sql="UPDATE user set token=? where email=?";
//             $stmt=$bdd->prepare($sql);
//             $stmt->execute([$token,$_POST['email_fr']]);
//            echo "mail envoyer";  
//            $_SESSION['une']=true;   
//        }else{
//         $_SESSION['une']=false; 
//            echo "une erreur de bzaf" ;
//        }
//     }else {
//         echo "cette email existe pas ";
//     }
// }
?> -->