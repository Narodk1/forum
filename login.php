<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
   <meta charset="utf-8">
   <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
   <link rel="stylesheet" href="css/style.css">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login</title>
   <link rel="shortcut icon" href="afl.png">
</head>

<body>
   <nav class="navbar navbar-expand-md navbar-white">
      <div class="container">
         <a class="navbar-brand" href="index.php">
            <h1 style="background-color: #eee; color: black;"> Ask For Learn </h1>
         </a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav">
            <span class="navbar-toggler-icon"></span>
         </button>
      </div>
   </nav>
   <div class="wrapper ">
      <div class="title-text">
         <div class="title login">
            Login Form
         </div>
         <div class="title signup">
            Signup Form
         </div>
      </div>

      <div class="form-container">
         <?php
         if (isset($_GET['reg_err'])) {
            $err = htmlspecialchars($_GET['reg_err']);
            switch ($err) {
               case 'success':
         ?><div class="alert alert-success">
                     <strong>succes </strong> inscription reussi
                  </div>
               <?php
                  break;
               case 'email':
               ?>
                  <div class="alert alert-danger">
                     <strong>erreur </strong> email non valid
                  </div>
               <?php
                  break;
               case 'email_lenght':
               ?>
                  <div class="alert alert-danger">
                     <strong>erreur </strong> email trop long
                  </div>
               <?php
                  break;
               case 'pseudo_lenght':
               ?>
                  <div class="alert alert-danger">
                     <strong>erreur </strong> pseudo trop long
                  </div>
               <?php
                  break;
               case 'password':
               ?>
                  <div class="alert alert-danger">
                     <strong>erreur </strong> password incorrect !
                  </div>
               <?php
                  break;
               case 'emp':
               ?>
                  <div class="alert alert-danger">
                     <strong>erreur </strong> les champs vides!
                  </div>
               <?php
                  break;

               case 'already':
               ?>
                  <div class="alert alert-danger">
                     <strong>erreur! </strong> compte existe deja / field empty
                  </div>
         <?php
                  break;
            }
         }
         ?>
         <!--for singnup reg-->
         <!-- <div class="alert alert-danger "> compte non existant </div> -->
         <?php
         if (isset($_GET['login_err'])) {
            $err = htmlspecialchars($_GET['login_err']);
            switch ($err) {
               case 'password':
         ?><div class="alert alert-danger">
                     <strong>erreur !</strong> mot de passe incorrect
                  </div>
               <?php
                  break;
               case 'em':
               ?>
                  <div class="alert alert-danger">
                     <strong>erreur !</strong> email incorrect
                  </div>
               <?php
                  break;
               case 'empt':
               ?>
                  <div class="alert alert-danger">
                     <strong>erreur ! </strong> les champs vide
                  </div>
               <?php
                  break;
               case 'already':
               ?>
                  <div class="alert alert-danger">
                     <strong>erreur !</strong> compte non existant
                  </div>
         <?php
                  break;
            }
         }
         ?>
         <div class="slide-controls">
            <input type="radio" name="slide" id="login" checked>
            <input type="radio" name="slide" id="signup">
            <label for="login" class="slide login">Login</label>
            <label for="signup" class="slide signup">Signup</label>
            <div class="slider-tab"></div>
         </div>
         <div class="form-inner">

            <form action="cnx.php" onsubmit="return validateLogin()" class="login" autocomplete="off" method="POST">
               <div class="field">
                  <input id="emaillogin" name="email_Login" type="email" placeholder="Email Address" autocomplete="off">
                  <div style="display: none;" class="message" id="errorEmail"></div>
               </div>
               <div class="field">
                  <input id="password" type="password" placeholder="Password" name="password">
                  <div style="display: none;" class="message" id="errorPassword"></div>
               </div>
               <div class="pass-link" style="margin-top: 4%;">
                  <a href="mdp_oublier.php">Forgot password?</a>
               </div>
               <div class="field btn">
                  <div class="btn-layer"></div>
                  <input type="submit" value="Login">
               </div>
               <div class="signup-link">
                  Not a member? <a href="">Signup now</a>
               </div>
            </form>
            <form action="register.php" onsubmit="return validateSignup()" class="signup" method="POST" autocomplete="off">
               <div class="field">
                  <input id="pseudo" name="pseudo" type="text" placeholder="pseudo">
                  <div style="display: none;" class="message" id="errorfullname"></div>
               </div>
               <div class="field">
                  <input id="email" name="email" type="text" placeholder="Email Address">
                  <div style="display: none;" class="message" id="erroremail"></div>
               </div>
               <div class="field">
                  <input id="password" name="password" type="password" placeholder="Password">
                  <div style="display: none;" class="message" id="errorPassword"></div>
               </div>
               <div class="field">
                  <input id="confirmePassword" name="password_retype" type="password" placeholder="Confirme password">
                  <div style="display: none;" class="message" id="errorConfirmepassword"></div>
               </div>
               <div class="field btn">
                  <div class="btn-layer"></div>
                  <input type="submit" value="Signup">
               </div>
            </form>
         </div>
      </div>
   </div>
   <script>
      const loginText = document.querySelector(".title-text .login");
      const loginForm = document.querySelector("form.login");
      const loginBtn = document.querySelector("label.login");
      const signupBtn = document.querySelector("label.signup");
      const signupLink = document.querySelector("form .signup-link a");
      signupBtn.onclick = (() => {
         loginForm.style.marginLeft = "-50%";
         loginText.style.marginLeft = "-50%";
      });
      loginBtn.onclick = (() => {
         loginForm.style.marginLeft = "0%";
         loginText.style.marginLeft = "0%";
      });
      signupLink.onclick = (() => {
         signupBtn.click();
         return false;
      });

      function validateLogin() {
         var error = "";
         var email = document.getElementById("emaillogin");
         var regx = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
         var messageE = document.getElementById("errorEmail");
         if (email.value == "" || !regx.test(email.value)) {
            messageE.style.color = "red";
            messageE.style.display = "block";
            messageE.style.fontSize = "13px";
            error = " You Have To Write Valid Email Address";
            messageE.innerHTML = error;
            return false;
         }

         var password = document.getElementById("password");
         var regpassword = /^[A-Za-z0-9]{8,}$/;
         var messageP = document.getElementById("errorPassword");
         if (password.value == "" || !regpassword.test(password.value)) {
            messageP.style.color = "red";
            messageP.style.display = "block";
            messageP.style.fontSize = "13px";
            error = " Password Must Be More Than Or Equal To 8 Digits";
            messageP.innerHTML = error;
            return false;
         } else {
            return true;
         }
      }
      var email = document.getElementById("email");
      var password = document.getElementById("password");
      var messageEm = document.getElementById("errorEmail");
      var messagePa = document.getElementById("errorPassword");
      email.onfocus = () => {
         messageEm.style.display = "none";
      }
      password.onfocus = () => {
         messagePa.style.display = "none";
      }

      function validateSignup() {

         var fullname = document.getElementById("pseudo");
         var regx = /^([a-zA-Z0-9]){3,20}$/;
         var messageName = document.getElementById("errorfullname");
         if (fullname.value == "" || !regx.test(fullname.value)) {
            messageName.style.color = "red";
            messageName.style.display = "block";
            messageName.style.fontSize = "13px";
            error = " you have to write a correct name ";
            messageName.innerHTML = error;
            return false;
         }

         var email = document.getElementById("email");
         var regx = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
         var messageE = document.getElementById("erroremail");
         if (email.value == "" || !regx.test(email.value)) {
            messageE.style.color = "red";
            messageE.style.display = "block";
            messageE.style.fontSize = "13px";
            error = " You Have To Write Valid Email Address ";
            messageE.innerHTML = error;
            return false;
         }
         var password = document.getElementById("password");
         var regxa = /^[A-Za-z0-9]{8,}$/;
         var messageP = document.getElementById("errorpassword");
         if (password.value == "" || !regxa.test(password.value)) {
            messageP.style.color = "red";
            messageP.style.display = "block";
            messageP.style.fontSize = "13px";
            error = " Password Must Be More Than Or Equal To 8 Digits ";
            messageP.innerHTML = error;
            return false;
         }

         var confirmepassword = document.getElementById("confirmePassword");
         var regxp = /^[A-Za-z0-9]{8,}$/;
         var messageCP = document.getElementById("errorConfirmepassword");
         if (confirmepassword.value == "" || !regxp.test(confirmepassword.value)) {
            messageCP.style.color = "red";
            messageCP.style.display = "block";
            messageCP.style.fontSize = "13px";
            error = " Password Must Be More Than Or Equal To 8 Digits ";
            messageCP.innerHTML = error;
            return false;
         } else {
            return true;
         }
      }
      var fullnames = document.getElementById("fullname");
      var emails = document.getElementById("email");
      var passwords = document.getElementById("password");
      var confirmepasswords = document.getElementById("confirmePassword");
      var messagename = document.getElementById("errorfullname");
      var messageE = document.getElementById("erroremail");
      var messageP = document.getElementById("errorpassword");
      var messageCP = document.getElementById("errorConfirmepassword");
      fullnames.onfocus = () => {
         messagename.style.display = "none";
      }
      emails.onfocus = () => {
         messageE.style.display = "none";
      }
      passwords.onfocus = () => {
         messageP.style.display = "none";
      }
      confirmepasswords.onfocus = () => {
         messageCP.style.display = "none";
      }
   </script>
   <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>