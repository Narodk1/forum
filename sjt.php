<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="styleSjt.css">
    <link rel="shortcut icon" href="afl.png">

    <title>Ask For Learn</title>
</head>

<body>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- navbar -->
    <?php
    include_once 'nav.php';
    require('AfficheContentSjt_Act.php');  
    include('CommentSjt.php');
    require('AfficheComment.php');  


    ?>

    <div class="container">
        <?php
        if (isset($question_id_author)) {
        ?>
            <div class="row">
                <div class="col-md-8">
                    <div class="media g-mb-30 media-comment">
                        <!-- card sujet ou qst-->
                        <div class="media-body u-shadow-v18 g-bg-secondary g-pa-30">
                            <div class="g-mb-15">
                                <h5 class="h5 g-color-gray-dark-v1 mb-0"> <?= $question_title ?>
                                </h5>
                                <p class="text-sm op-5"> <span class="text-black mr-2">le </span> <span class="text-secondary"><?= $question_publication_date ?> </span> </p>
                            </div>

                            <p><?= $question_msg ?></p>

                            <ul class="list-inline d-sm-flex my-0">
                                <li class="list-inline-item g-mr-20">
                                    <a class="u-link-v5 g-color-gray-dark-v4 g-color-primary--hover" href="LikeDislikeAct.php?t=0&id=<?=$id?>" style="text-decoration: none;">
                                        <i class="fa fa-thumbs-up g-pos-rel g-top-1 g-mr-3"></i>
                                        178
                                    </a>
                                </li>
                                <li class="list-inline-item g-mr-20">
                                    <a class="u-link-v5 g-color-gray-dark-v4 g-color-primary--hover" href="LikeDislikeAct.php?t=1&id=<?=$id?>" style="text-decoration: none;">
                                        <i class="fa fa-thumbs-down g-pos-rel g-top-1 g-mr-3"></i>
                                        34
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
               
                <!-- answer card -->
                <div class="container mt-4  mb-2">
                    <div class="row d-flex justify-content-center">
                   
                        <div class="col-md-8">
                        <?php 
                          while($rep = $getrepOfQst->fetch()){        
                        ?>
                            <div class="card p-3 mb-2">
                          
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="user d-flex flex-row align-items-center"> <img src="pr.png" width="30" class="user-img rounded-square mr-2"> <span><small class="font-weight-bold text-primary "><?=$rep['full_name']?></small>
                                            <p class="font-weight-bold " style="margin-left: 9px;"> <?= $rep['rep_msg']?></p>
                                        </span> </div> <small>le <?=$rep['date_rep']?></small>
                                </div>
                                
                            </div> <?php
                              }  
                              ?>
                         
                            </div>
                            
                        </div>
                    </div>
                </div>

                <form id="algin-form" method="POST"  onsubmit="return validateSjt()">
                    <div class="form-group">
                        <h4>Leave a comment</h4> <label for="message">Message</label>
                        <textarea name="comment"  msg cols="30"
                         rows="5" class="form-control" style="background-color: rgb(255, 255, 255);" id="cmt"></textarea>
                    </div>
                    <div style="display: none;"  class="message" id="err"></div>
                    <div class="form-group">
                        <p class="text-secondary"> Si vous etes pas connectez <a href="login.php" class="alert-link"> connectez-vous</a> </p>
                    </div>
                <div class="form-group" style="margin-bottom: 10px;"> 
                    <button type="submit" id="post" class="btn-success" name="validate">Post Comment</button>
                </div>
                </form>
              
            </div>

        <?php
        } else { ?>
            <br>
            <div class="alert alert-danger"><strong><?= $errorMsg ?></strong></div>
        <?php
        } ?>
    </div>
    <script>
        function validateSjt() {
        const comment = document.getElementById('cmt');
        var messageP = document.getElementById("err");
             if (comment.value=="") {
                  messageP.style.color = "red";
                  messageP.style.display = "block";
                  messageP.style.fontWeight="bold";
                  messageP.style.fontSize = "19px";
                  error = "Champs Vide";
                  messageP.innerHTML = error;
                  return false;
             }
             return true;
      }
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );//empecher le navigateur de renvoyer repetivement le formulaire
    }

                </script>
</body>

</html>