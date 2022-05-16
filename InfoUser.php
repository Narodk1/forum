
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
  include_once('nav.php');
  require('AffiheProfilAct.php');
  ?>
    <div class="container">
        <div class="main-body">
        <?php
        if(isset($user_pseudo)){?>
              <!-- Breadcrumb -->
              <nav aria-label="breadcrumb" class="main-breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page">User Profile</li>
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
                          <h4> <?=$user_pseudo?></h4>
                          <?php 
                          if(!empty($_SESSION['id'])and$user_id==$_SESSION['id']){
                              
                            ?><strong class="text-success  mb-1" >
                            User Active</strong>
                          <?php
                          }else{
                          ?><strong class="text-danger  mb-1" >
                          User disconected</strong>
                          <?php
                        }?>                         
                         <p class="text-muted font-size-sm"> nombre de potes: 78</p>
                         
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
                          <h6 class="mb-0">Full Name</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                       <?=$user_pseudo?>
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Email</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                        <?=$user_email?>
                        </div>
                      </div>
                      <hr>
                     
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Date D'inscription</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                        <?=$user_date?>
                         </div>
                      </div>
                               
                    </div>
                  </div>
    
                
                    <div class="col-sm-6 mb-3">
                      <div class="card h-100">
                        <div class="card-body">
                          <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2"></i>Sujet evaluer</h6>
                          <small>Web Design</small>
                          <div class="progress mb-3" style="height: 5px">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                          <small>informatique</small>
                          <div class="progress mb-3" style="height: 5px">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                          <small>Economie</small>
                          <div class="progress mb-3" style="height: 5px">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                          <small> Voyage</small>
                          <div class="progress mb-3" style="height: 5px">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                          <small>Backend php</small>
                          <div class="progress mb-3" style="height: 5px">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
    
    
    
                </div>
                <?php
                }else{?>
                <div class="alert alert-danger">
                    <strong><?=$errorMsg?></strong>
                </div>
                <?php
              }?>
              </div>
    
            </div>
       
        <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>