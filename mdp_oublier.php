
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="shortcut icon" href="afl.png">
    <title>mot de passe oublier </title>
</head>
<body style="background-color: #eee;">
<div class="container">
          <div class="col-11">
              <div class="card text-center m-4 shadow p-3 mb-5 bg-white rounded">
                <div class="card-body">
                  <h4 class="card-title p-3">entrer votre email</h4>
                    <div class="form-group"  onsubmit="return validateEmail()" >
                        <form method="POST" action="forgot.php" >
                            <input type="hidden" name="t" value="<?php ?>">
                            <input id="email"type="email" class="form-control" name="email" placeholder="Email" autocomplete="off"  />
                            <div style="display: none;" class="message" id="errorEmail"></div>
                            <button type="submit" class="btn btn-primary btn-lg m-3">Envoyer</button>
                        </form>
                    </div>
                </div>
              </div>
          </div>
          <!-- <div class="alert alert-danger"> bojour</div> -->
      </div>
  
    <!-- Optional JavaScript -->
    <script>
        function validateEmail(){
            var error="";
            var email = document.getElementById( "email" );
            var regx= /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            var messageE=document.getElementById( "errorEmail" );
            if( email.value == "" || !regx.test(email.value) ){
               messageE.style.color="red";
               messageE.style.display="block";  
               messageE.style.fontSize="21px";
               error = " You Have To Write Valid Email Address";
               messageE.innerHTML = error;
               return false;
            }
        }
    </script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>