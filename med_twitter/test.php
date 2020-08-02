<?php 
/////cnx
    $servernam="localhost";
    $usernam="root";
    $pas="";
      try
      {
        $cnx=new PDO("mysql:host=$servernam;dbname=twitter_med",$usernam,$pas);
        $cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      }
      catch(PDOException $E)
      {
        echo $E->getMessage();
      }

      session_start();


?>


<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from bootstrap-themes.github.io/application/profile/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 10 Mar 2019 14:48:39 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">

    <title>
      
        Profile &middot; Application theme &middot; Official Bootstrap Themes
      
    </title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
    <link href="assets/css/toolkit.css" rel="stylesheet">
    
    <link href="assets/css/application.css" rel="stylesheet">

    <style>
      /* note: this is a hack for ios iframe for bootstrap themes shopify page */
      /* this chunk of css is not part of the toolkit :) */
      body {
        width: 1px;
        min-width: 100%;
        *width: 100%;
      }
    </style>

  </head>


<body class="bob">

<nav class="ck pt adq py tk app-navbar" style="background-color: white;">

  <button
    class="pp bpn vm"
    type="button"
    data-toggle="collapse"
    data-target="#navbarResponsive"
    aria-controls="navbarResponsive"
    aria-expanded="false"
    aria-label="Toggle navigation">
    <span class="pq"></span>
  </button>

  <div class="collapse f" id="navbarResponsive" >
    <ul class="navbar-nav ahq" style="position: relative;left: 100px;color:#66757f;">
      <li class="pi active">
        <a class="pg" href="index.html">Home <span class="adt">(current)</span></a>
      </li>
      <li class="pi">
        <a class="pg" href="profile/index.html">Profile</a>
      </li>
      <li class="pi">
        <a class="pg" data-toggle="modal" href="#msgModal">Messages</a>
      </li>
      <li class="pi">
        <a class="pg" href="docs/index.html">Docs</a>
      </li>


      <li class="pi vm">
        <a class="pg" data-action="growl">Growl</a>
      </li>
      <li class="pi vm">
        <a class="pg" href="deco.php">Logout</a>
      </li>
    </ul>
    <a class="e" href="index.html" style="position: relative;right: 400px;">
      <i class="fab fa-twitter"></i>
    </a>
    <form class="nn acx d-none vt" style="position: relative;right: 70px;">
      <input class="form-control" type="text" data-action="grow" placeholder="Search" style="border-radius: 100px;border:0px;">
    </form>

    <ul id="#js-popoverContent" class="nav navbar-nav acx aek d-none vt" style="position: relative;right: 60px;">
      <?php
          $search=$cnx->prepare("SELECT *FROM `utilisateur` where email= ?");
          $search->execute(array($_SESSION["email"]));
          while ($donne1=$search->fetch()){ ?>
              <li class="pi afb">
                <button class="cg bpo bpp boi" data-toggle="popover">
                  <img class="us" src="<?php echo $donne1[5]?>">
                </button>
              </li>
              <li id="filtt" class="nav-item dropdown" style="margin-bottom: 10px;list-style: none;">
                            <a class="nav-link " href="#" id="navbarDropdown" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="nam"><?php echo $donne1[5]?></span>
                                <small style="color: rgba(0,0,0,0.88);">
                                    @<?php echo $donne1[5]?>
                                </small>&nbsp;
                                <small style="color: rgba(0,0,0,0.88);">
                                    <?php echo $donne1[5]?>'
                                </small>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown"
                                 style="border-radius: 10px;width: 280px;">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div style="height:213.5px;">
                                            <div id="div1" style="border-radius: 10px;">
                                                <a href="profil.php"><img
                                                            src="<?php echo $donne1[5]?>"
                                                            class="img-circle2"/></a>
                                            </div>
                                            <div id="div2" style="border-radius: 10px;">
                                                <div class="row">
                                                    <div class="col-xl-3">

                                                    </div>
                                                    <div class="col-xl-9">
                                                        <strong><?php echo $donne1[5]?></strong><br>
                                                        <small><?php echo $donne1[5]?></small>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xl-3">
                                                        <small>Tweets</small>
                                                        <br>
                                                        <!--nbTwittes-->
                                                        <span class="colorTwitter"><?php echo $donne1[5]?></span>
                                                    </div>
                                                    <div class="col-xl-3">
                                                        <small>Subscriptions</small>
                                                        <br>
                                                        <span class="colorTwitter"><?php echo $donne1[5]?></span>
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <a href="">
                                                            <button type="button"
                                                                    class="btn btn-outline-danger btn-sm"
                                                                    style="position: relative;left: 42px;top: 21px;">
                                                                <strong>unfollow</strong></button>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div style="border-radius: 30px
                                            ;"style="border-radius: 30px
                                            ;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
      <?php } ?>
      <!-- <li class="pi afb">
          <button style="border-radius: 100px;background-color: #ffffff;border:0px;width: 70px;height: 30px;">
            Twitter
          </button>
      </li> -->
    </ul>

    <ul class="nav navbar-nav d-none" id="js-popoverContent">
      <li class="pi"><a class="pg" href="#" data-action="growl">Growl</a></li>
      <li class="pi"><a class="pg" href="deco.php">Logout</a></li>
    </ul>
  </div>
</nav>





    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/chart.js"></script>
    <script src="assets/js/toolkit.js"></script>
    <script src="assets/js/application.js"></script>
    
  </body>

<!-- Mirrored from bootstrap-themes.github.io/application/profile/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 10 Mar 2019 14:48:40 GMT -->
</html>

