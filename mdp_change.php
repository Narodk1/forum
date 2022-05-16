
<!doctype html>
<html lang="fr">
  <head>
    <title>Réinitialiser mon mot de passe</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="afl.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <style>
    body{
      background-color: #eee;
    }
  </style>
  <body>
        <div class="container">
          <div class="col-11">
              <div class="card text-center m-4 shadow p-3 mb-5 bg-white rounded">
                <div class="card-body">
                  <h4 class="card-title p-3">Réinitialiser mon mot de passe</h4>
                    <div class="form-group">
                        <form   method="POST" onsubmit="return validatePassword()" >
                            <input id ="password" type="password" name="password" class="form-control" placeholder="Mot de passe" required />
                            <br />
                            <input id="cfpas" type="password" name="password_repeat" class="form-control" placeholder="Re-tapez le mot de passe"  required/>
                            <div style="display: none;" class="message" id="errorPassword"></div>
                            <button type="submit" class="btn btn-primary btn-lg m-3">Modifier</button>
                        </form>
                    </div>
                </div>
              </div>
          </div>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script>
          function validatePassword(){
            var password = document.getElementById("password");
            var regpassword=/^[A-Za-z0-9]{8,}$/;
            var messageP=document.getElementById( "errorPassword" );
            var cfp=document.getElementById("cfpas");
            if( password.value == "" || !regpassword.test(password.value) ||cfp.value!=password.value){ 
             
               messageP.style.color="red";
               messageP.style.display="block";  
               messageP.style.fontSize="19px";
               error = " Password Must Be More Than Or Equal To 8 Digits and equal the retype-password";
               messageP.innerHTML = error;
               return false;
            }
            else{
               return true;
            }
          }  
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
<?php 
    require_once 'config.php';
        if(!empty($_POST['password']) && !empty($_POST['password_repeat'])&&isset($_GET['t'])){
            $req="SELECT email from user where tokken=?";
            $stmt=$bdd->prepare($req);
            $stmt->execute([$_GET['t']]);
            $email=$stmt->fetchColumn();
            $password = htmlspecialchars($_POST['password']);
            $password_repeat = htmlspecialchars($_POST['password_repeat']);
            if($email){
                if($password === $password_repeat){
                  $password = hash('sha256',$password);
                    $update = $bdd->prepare('UPDATE user SET password = ? ,tokken = NULL WHERE email = ?');
                    $update->execute(array($password, $email));
                    echo "Le mot de passe a bien été modifie";
                }else{
                    echo "Les mots de passes ne sont pas identiques";
                }
            }else{
                echo "compte non existant";
            }
        }
       
 ?>
