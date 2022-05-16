<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=dwidthevice-, initial-scale=1.0">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
  <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet">
  <title>Ask For Learn</title>
  <link rel="shortcut icon" href="afl.png">
</head>

<body>
  <style>
    body {
      margin-top: 0px;
      background-color: #eee;
      color: #52687e;

    }


    .icon-1x {
      font-size: 24px
    }

    a {
      text-decoration: none;
    }

    .text-primary,
    a.text-primary:focus,
    a.text-primary:hover {
      color: #00ADBB;
      /*pour changer la couleur des lien decor*/
    }

    .text-black,
    .text-hover-black:hover {
      color: #000;
      /*text color*/
    }

    .font-weight-bold {
      font-weight: 700 !important;
    }
  </style>

  <!-- navbar -->
  <?php
  include 'nav.php';
  require('SearchAct.php');
  require('Statistique.php')
  ?>

  <div class="container">
    <div class="row">
      <!-- Main content ar2isiya -->
      <div class="col-lg-9 mb-3">
        <br></br>
        <!-- post  -->

        <?php
        while ($question = $getAllQuestions->fetch()) {
        ?>
          <div class="card row-hover pos-relative py-3 px-3 mb-3 border-warning border-top-0 border-right-0 border-bottom-0 rounded-0">
            <div class="row align-items-center">
              <div class="col-md-8 mb-3 mb-sm-0">
                <h5>
                  <a href="sjt.php?id=<?= $question['id_question'] ?>" class="text-primary"><?= $question['qst_title'] ?></a>
                </h5>
                <p class="text-sm"><span class="op-6">publier le </span> <span class="text-black"><?= $question['date'] ?></span> <span class="op-6">par </span> <a class="text-black" href="InfoUser.php?idu=<?=$question['id_user']?>"><?= $question['full_name'] ?></a></p>
                <div class="text-sm op-5">
                  <p><span> categorie :</span> <span class="text-black mr-2"><?= $question['categorie'] ?></span> </p>
                </div>
              </div>
              <div class="col-md-4 op-7">
                <div class="row text-center op-7">
                  <div class="col px-1"> <i class="ion-connection-bars icon-1x"></i> <span class="d-block text-sm">49 Votes</span> </div>
                  <div class="col px-1"> <i class="ion-ios-chatboxes-outline icon-1x"></i> <span class="d-block text-sm">29 Replys</span> </div>
                  <div class="col px-1"> <i class="ion-ios-eye-outline icon-1x"></i> <span class="d-block text-sm">170 Views</span> </div>
                </div>
              </div>
            </div>
          </div>
        <?php
        } ?>


      </div>

      <div class="col-lg-3 mb-4 mb-lg-0 px-lg-0 mt-lg-0">
        <div style="visibility: hidden; display: none; width: 285px; height: 801px; margin: 0px; float: none; position: static; inset: 85px auto auto;"></div>
        <div data-toggle="sticky" class="sticky" style="top: 85px;">
          <div class="sticky-inner">
            <a class="btn btn-lg btn-block btn-success rounded-0 py-4 mb-3  bg-op-6 roboto-bold" href="question.php">Ask Question</a>

            <!-- stats -->
            <div class="bg-white text-sm">
              <h4 class="px-3 py-4 op-5 m-0 roboto-bold">
                Stats
              </h4>
              <hr class="my-0">
              <div class="row text-center d-flex flex-row op-7 mx-0">
                <div class="col-sm-6 flex-ew text-center py-3 border-bottom border-right"> <a class="d-block lead font-weight-bold" href="#">58</a> sujet </div>
                <div class="col-sm-6 col flex-ew text-center py-3 border-bottom mx-0"> <a class="d-block lead font-weight-bold" href="#">1.856</a> Posts </div>
              </div>
              <div class="row d-flex flex-row op-7">
                <div class="col-sm-6 flex-ew text-center py-3 border-right mx-0"> <a class="d-block lead font-weight-bold" href="#">300</a> Members </div>
                <div class="col-sm-6 flex-ew text-center py-3 mx-0"> <a class="d-block lead font-weight-bold" href="user/user.html"><?= $Ruser['full_name'] ?></a> Newest Member </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>