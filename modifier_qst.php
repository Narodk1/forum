
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="afl.png">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">  
    <link rel="shortcut icon" href="afl.png">

    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet">

    <title>Ask For Learn</title>

</head>


<body style="overflow-y:auto ;">
<?php
include_once('nav.php');
include 'securityAction.php';
include 'getInfoEditQstAct.php';
require('modifierQstAct.php');
?>
    
<style>
    @import url(https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,300,600,700);
* {
    margin: 0;
    padding: 0;
}

body {
    background-color: #F3F3F3;
    overflow-x: hidden;
}

/*Ask Question*/

.ask-question-input-part032 {
    background-color: #FFFFFF;
    padding: 15px;
    margin-top: 30px;
    margin-bottom: 30px;
    -webkit-box-shadow: 0px 0px 13px -3px;
    box-shadow: 0px 0px 13px -3px;
}

.row{
    justify-content: center;
}

.tag {
    width: 75%;
    height: 40px;
    background-color: #F3F3F3;
    border: none;
    outline: inherit;
    padding: 10px;
    border-radius: 3px;
    border: 1px solid #1d0a0c;
}
.tag-question{
    margin-top: 30px;
}


.form-description43 {
    margin-right: 150px;
    color: #1b0b08;
    font-family: fontawesome;
    font-weight: bold;
}

.form-description{
    color: #1b0b08;
    font-family: fontawesome;
    font-weight: bold;
}

.email-part320 {
    margin-top: 30px;
}

.email30 {
    width: 75%;
    height: 40px;
    background-color: #F3F3F3;
    border: none;
    outline: inherit;
    padding: 10px;
    border-radius: 3px;
    border: 1px solid #140607;
}

.form-description442 {
    margin-right: 130px;
    color: #1d0e0c;
    font-family: fontawesome;
    font-weight: bold;
}

.question-title39 {
    margin-top: 30px;
}

.question-ttile32 {
    width: 75%;
    height: 40px;
    background-color: #F3F3F3;
    border: none;
    outline: inherit;
    padding: 10px;
    border-radius: 3px;
    border: 1px solid #16090a;
}

.form-description433 {
    margin-right: 90px;
    color: #110706;
    font-family: fontawesome;
    font-weight: bold;
}

.categori49 {
    margin-top: 30px;
}

.list-category53 {
    width: 100%;
    height: 40px;
    background-color: #F3F3F3;
    border: none;
    outline: inherit;
    padding: 10px;
    border-radius: 3px;
    border: 1px solid #0e0505;
}

.form-description4342 {
    margin-right: 90px;
    color: #160a08;
    font-family: fontawesome;
    font-weight: bold;
}

.categori49 > label {
    margin-right: 100px;
}

.form-description43305 {
    margin-right: 121px;
    color: #130706;
    font-family: fontawesome;
    font-weight: bold;
}

.form-description433 {
    float: left;
}

.form-description23993 {
    margin-right: 106px;
    color: #fd7362;
    font-family: fontawesome;
    font-weight: bold;
    float: left;
}

.button-group-addfile3239 {
    margin-top: 20px;
}

.question-ttile3217 {
    width: 60%;
    height: 200px;
    background-color: #F3F3F3;
    border: none;
    outline: inherit;
    padding: 10px;
    border-radius: 3px;
}

.question-details3112 {
    margin-top: 0px;
    margin-bottom: 0px;
    height: 200px;
    width: 75%;
    border: 1px solid #fd6371;
    background-color: #F3F3F3;
    outline: none;
}

.form-description43313 {
    margin-right: 131px;
    color: #fd7362;
    font-family: fontawesome;
    font-weight: bold;
    float: left;
}

.publish-button2389 {
    margin-top: 20px;
}

.publis1291 {
    padding: 5px 15px 5px 15px;
    width: 100%;
    color: #fff;
    background-color: #140a08;
    border: none;
    border-radius: 3px;
    font-weight: bold;
    margin-top: 20px;
}

.publis1291:hover {
    padding: 5px 15px 5px 15px;
    width: 100%;
    color: #fff;
    border: none;
    border-radius: 3px;
    font-weight: bold;
}
</style>
<br>
<?php if(isset($errorMsg)){ 
   ?> <div class="alert alert-danger " style="width: 50%;">
         <strong>   <?=$errorMsg?></strong>
      </div>
        <?php 
   } ?>
         <!-- end of style -->
         <?php 
            if(isset($question_msg)){ //lors que l'user hesite  a modifier id_qst le formulaire ne saffiche pas
                ?>
    <div class="row" >
        <div class="col-md-9">
        <div class="ask-question-input-part032">
              <h4>Ask Question</h4>
         <hr>
         
    <form onsubmit="return validate()" method="POST" >
    <div class="question-title39">
        <span class="form-description433">Question-Title* </span>
        <input id ="qst_title"type="text" name="titleqst" class="question-ttile32"
         placeholder="Write Your Question Title" value="<?= $question_title?>">
    </div>
   <div class="categori49">
       <span class="form-description43305">Category* </span>
        <label>
        <input id="cat" list="browsers" name="categorie" class="list-category53" value="<?= $question_categorie?>"/></label>
        <datalist id="browsers">
        <option value="Front_End Web Developer">
        <option value="Back-End develoer">
        <option value="Andriod Developer">
        <option value="Web Application">
        <option value="System Analyst">
        <option value="Security">
        </datalist>
   </div>
         <br>
        <div class="form-group">
            <span class="form-description">Message* </span>
            <textarea id ="msg" name="msg"  msg cols="30" rows="5" 
              class="form-control" style="margin-top: 10px; background-color: rgb(255, 255, 255);" ><?= $question_msg?>
            </textarea>
        </div>
    
        <div class="publish-button2389">   
                 <div style="display: none;"  class="message" id="err"></div>
            <button type="submit" class="publis1291" name="modify">modify your Question</button>
        </div>
</form>

        </div>            

        </div>
 </div>
 <?php
  }
 ?>
 <script>
        function validate(){
            const msg = document.getElementById( "msg" );
            var messageP=document.getElementById( "err" );
            const qst=document.getElementById("qst_title");
            const car=document.getElementById("cat");
            if( qst.value == "" || msg.value=="" || car.value==""){    
               messageP.style.color="red";
               messageP.style.display="block";  
               messageP.style.fontSize="19px";
               error = " un des champs sont vides ";
               messageP.innerHTML = error;
               return false;
            }
            return true;
          }  
     

</script>

<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
