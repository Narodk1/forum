<?php 
session_start();
require_once ('config.php');
if(isset($_POST['email_Login']) && isset($_POST['password'])){
    $email=htmlspecialchars($_POST['email_Login']);
    $password=htmlspecialchars($_POST['password']);
    $check=$bdd->prepare('SELECT id_user,full_name,password from user where email=?');
    $check->execute(array($email));
    $data=$check->fetch();//apporter line par line
    $row=$check->rowCount();
    
    if(!empty($password)&& !empty($email)){
        if($row==1){
           $_SESSION['logout']=1;
           if(filter_var($email,FILTER_VALIDATE_EMAIL)){            
            $password = hash('sha256',$password);
                if ($data['password']===$password) {
                    $_SESSION['id']=$data['id_user'];
                    header('location:index.php');
                } 
                else {
                header('location:login.php?login_err=password ');
                $_SESSION['logout']=null; }
            }  else { header('location:login.php?login_err=em');}
        }else {header('location:login.php?login_err=already');
        $_SESSION['logout']=null;}
    }
    else{header('location:login.php?login_err=empt'); }

}else{ header('location:login.php');}
