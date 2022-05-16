<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=dwidthevice-, initial-scale=1.0">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="styleUser.css">
  <link rel="shortcut icon" href="afl.png">
  <title>Ask For Learn</title>
</head>

<body>
  <?php
  include 'config.php';
  require 'nav.php';
  include 'securityAction.php';

  $sel = $bdd->prepare("SELECT * from user where id_user =?");
  $check = $sel->execute(array($_SESSION['id']));
  $info = $sel->fetch();
  ?>
  <div class="container">
    <div class="main-body">
      <!-- Breadcrumb -->
      <nav aria-label="breadcrumb" class="main-breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page">Page Profile</li>
        </ol>
      </nav>
      <!-- /Breadcrumb -->

      <div class="row gutters-sm">
        <div class="col-md-4 mb-3">

          <div class="card">
            <div class="card-body">
              <div class="d-flex flex-column align-items-center text-center">
                <img src="te.png" alt="profile" class="rounded-square" width="150">
                <div class="mt-3">
                  <h4> <?= $info['full_name']; ?> </h4>
                  <strong class="text-muted font-size-sm"> nombre de potes: 78</strong>
                </div>
              </div>
            </div>
          </div>

        </div>

        <div class="col-md-8">
          <div class="card mb-3">
            <div class="card-body">
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">pseudo </h6>
                </div>

                <div class="col-sm-9 text-secondary">
                  <?= $info['full_name']; ?>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Email</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <?= $info['email']; ?>
                </div>
              </div>

              <hr>

              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Date D'inscription</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <?= $info['date_inscri']; ?>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>

      <?php
      while ($question = $getAllMyQuestions->fetch()) {     ?>
        <div class="card">
          <h5 class="card-header">
            <a href="sjt.php?id=<?= $question['id_question'] ?>" class="text-primary" style="text-decoration: none;"> <?= $question['qst_title']; ?>
            </a>
          </h5>
          <div class="card-body">
            <p class="card-text">
              <?= $question['msg']; ?>

            </p>
            <a href="modifier_qst.php?id= <?= $question['id_question']; ?>" class="btn btn-warning">Modifier la question</a>
            <a href="deleteQstAct.php?id= <?= $question['id_question']; ?>" class="btn btn-danger">Supprimer la question</a>
          </div>
        </div>
        <br>

      <?php
      }
      ?>

    </div>

  </div>



  <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>