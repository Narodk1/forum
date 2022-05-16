<?php
require_once ('config.php');
if(isset($_POST['pseudo']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['password_retype'])){
    $pseudo=htmlspecialchars($_POST['pseudo']);
    $email=htmlspecialchars($_POST['email']);
    $password=htmlspecialchars($_POST['password']);
    $password_retype=htmlspecialchars($_POST['password_retype']);
    $date_inscri = date('d-m-Y');
    $check=$bdd->prepare('SELECT full_name,email,password from user where email=?');
    $check->execute(array($email));
    $data=$check->fetch();
    $row=$check->rowCount();
if($row==0){
    if(!empty($pseudo)&& !empty($email)&& !empty($password)&&!empty($password_retype)){
        if(strlen($pseudo)<=100){
            if (strlen($email)<=100) {
                if(filter_var($email,FILTER_VALIDATE_EMAIL)  ){
                    if($password==$password_retype){
                        $password = hash('sha256',$password);
                        // $ip=$_SERVER('REMOTE_ADDR');
                        $insert=$bdd->prepare('	INSERT INTO USER (full_name, email, password,date_inscri) VALUES(:full_name,:email,:password,:date_inscri)');
                        $insert->execute(array(
                            ':full_name'=>$pseudo,
                            ':email'=>$email,
                            ':password'=>$password,
                            ':date_inscri'=>$date_inscri
                        ));
                        header('location:login.php?reg_err=success');
    
                    }else{
                        header('location:login.php?reg_err=password');
                    }
    
                }else {
                    header('location:login.php?reg_err=email');
                }
    
            }else{
                header('location:login.php?reg_err=email_lenght');
            }
    
        }else{header('location:login.php?reg_err=pseudo_lenght');}
   
}
else{header('location:login.php?reg_err=emp');}  //empty field msg

}else {
    header('location: login.php?reg_err=already');// compte existe deja sg

}
}else{
header('location:login.php?');
}

