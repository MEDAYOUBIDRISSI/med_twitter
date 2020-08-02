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
    if (isset($_SESSION["email"]))
    {
      if (isset($_POST["submit33"])) 
      {

        extract($_POST);

        if (isset($_POST["id1"]) && isset($_POST["id2"])) 
        {
          $id1=$_POST["id1"];
          $id2=$_POST["id2"];

          
          $search=$cnx->prepare("insert into abonne (`id`, `id2`) VALUES (:id1,:id2)");
          $search->bindParam(':id1', $id1);
          $search->bindParam(':id2', $id2);
          $search->execute();
        }
      }
    }
    else
    {
      header('location:login.php?msglogin=10');
    }


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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
    <link href="assets/css/toolkit.css" rel="stylesheet">
    
    <link href="assets/css/application.css" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <style>
      /* note: this is a hack for ios iframe for bootstrap themes shopify page */
      /* this chunk of css is not part of the toolkit :) */
      body {
        width: 1px;
        min-width: 100%;
        *width: 100%;
      }
            .upload-btn-wrapper {
      position: relative;
      overflow: hidden;
      display: inline-block;
    }

    .chwaria {
      border: 2px solid gray;
      color: gray;
      background-color: white;
      padding: 8px 20px;
      border-radius: 8px;
      font-size: 20px;
      font-weight: bold;
    }

    .upload-btn-wrapper input[type=file] {
      font-size: 100px;
      position: absolute;
      left: 0;
      top: 0;
      opacity: 0;
    }
    </style>



  </head>


<body class="bob">

<div class="bon" id="app-growl"></div>

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
        <a class="pg" href="index.php">Home <span class="adt">(current)</span></a>
      </li>
      <li class="pi">
        <a class="pg" href="folowrs.php">Folowrs</a>
      </li>


      <li class="pi vm">
        <a class="pg" data-action="growl" href="profile.php?ema=<?=$gogo?>">Growl</a>
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
          while ($donne1=$search->fetch()){ 
            $gogo=$donne1[0];
            ?>
            
              <li class="pi afb">
                <button class="cg bpo bpp boi" data-toggle="popover">
                  <img class="us" src="<?php echo $donne1[5]?>">
                </button>
              </li>
      <?php } ?>
      <li class="pi afb">
          <!-- <button style="border-radius: 100px;background-color: #ffffff;border:0px;width: 70px;height: 30px;">
            Twitter
          </button> -->
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" style="border-radius: 100px;background-color: #ffffff;border:0px;width: 70px;height: 30px;color: #66757f;">Twitter</button>
      </li>
    </ul>

    <ul class="nav navbar-nav d-none" id="js-popoverContent">
      <li class="pi"><a class="pg" href="profile.php?ema=<?=$gogo?>">Profil</a></li>
      <li class="pi"><a class="pg" href="deco.php">Logout</a></li>
    </ul>
  </div>
</nav>


        <?php
          $search=$cnx->prepare("SELECT *FROM `utilisateur` where email= ?");
          $search->execute(array($_GET["ema"]));
          while ($donne1=$search->fetch()){ ?>
          <div class="boq" style="background-image: url(<?php echo $donne1[6]?>);">
            <div class="by">
              <div class="bor">
                <img class="us bos" src="<?php echo $donne1[5]?>">
                <h3 class="bou"><?php echo $donne1[3]?></h3>
                <p class="bot">
                    <?php echo $donne1[4]?>                
                </p>
              </div>
            </div>
        <?php } ?>

  <nav class="bov">
    <!-- <ul class="nav ph xm">
      <li class="pi">
        <a class="pg active" href="#">Photos</a>
      </li>
      <li class="pi">
        <a class="pg" href="#">Others</a>
      </li>
      <li class="pi">
        <a class="pg" href="#">Anothers</a>
      </li>
    </ul> -->
  </nav>
</div>

<div class="by aha ahl">
  <div class="dp">
    <div class="fj">
      <?php
          $search=$cnx->prepare("SELECT *FROM `utilisateur` where email= ?");
          $search->execute(array($_SESSION["email"]));
          while ($donne1=$search->fetch()){ 
            $h1n1=$donne1[0]
          ?>
      <div class="pz bpi afo">
        <div class="qf" style="background-image: url(<?php echo $donne1[6]?>);"></div>
        <div class="qa avz">
          <a href="profile/index.html">
            <img
              class="bpj"
              src="<?php echo $donne1[5]?>" style="border-radius: 100px 100px 100px;">
          </a>

          <h6 class="qb">
            <a href="profile.php?ema=<?=$donne1[1]?>"><strong><?php echo $donne1[3]?></strong></a>
          </h6>

          <p class="afo"><?php echo $donne1[4]?></p>

          <ul class="bpk">
            <li class="bpl">
              <?php
                $search=$cnx->prepare("SELECT count(*) FROM `message` where id= ?");
                $search->execute(array($h1n1));
                while ($donne7=$search->fetch()){
                  $twits=$donne7[0];
                }
                $search10=$cnx->prepare("SELECT count(*) FROM `abonne` where id= ?");
                $search10->execute(array($h1n1));
                while ($donne8=$search10->fetch()){
                  $abon=$donne8[0];
                }
                $search20=$cnx->prepare("SELECT count(*) FROM `abonne` where id2= ?");
                $search20->execute(array($h1n1));
                while ($donne9=$search20->fetch()){
                  $abonnes=$donne9[0];
                }


                ?>
              <a href="#userModal" class="boa" data-toggle="modal">
                Tweets
                <h6 class="aej"><?php echo $twits?></h6>
              </a>
            </li>
            <li class="bpl">
              <a href="#userModal" class="boa" data-toggle="modal">
                Abonne
                <h6 class="aej"><?php echo $abon?></h6>
              </a>
            </li>
            <li class="bpl">
              <a href="#userModal" class="boa" data-toggle="modal">
                Abonnés
                <h6 class="aej"><?php echo $abonnes?></h6>
              </a>
            </li>
          </ul>
        </div>
      </div>
      <?php } ?>

      <div class="pz d-none vy">
        <div class="qa">
          <h6 class="afh">Trending Searches <small>· <a href="#">Change</a></small></h6>
          <ul class="dc axg">
            <li><a href="#">#Bootstrap</a>
            <li><a href="#">Mdo for pres</a>
            <li><a href="#">#fatsux</a>
            <li><a href="#">#buyme</a>
            <li><a href="#">#designishard</a>
            <li><a href="#">#helpawesomepeople</a>
            <li><a href="#">#doawesomestuff</a>
            <li><a href="#">Tom Brady</a>
            <li><a href="#">Magna Carta</a>
            <li><a href="#">Mark Otto</a>
            <li><a href="#">Dave Gamache</a>
            <li><a href="#">Jacob Thornton</a>
          </ul>
        </div>
      </div>
    </div>
       <div class="fm" style="margin-top: 10px;">
      <ul class="ca bow box afo">
        <?php
          $search=$cnx->prepare("SELECT u.email,u.nom,u.nom2,u.image,u.background,u.abonne,u.twette,m.* FROM utilisateur u inner join message m ON u.id=m.id where email= ? order by temps desc");
          $search->execute(array($_GET["ema"]));
          while ($donne1=$search->fetch()){ ?>
        <li class="rv b agz">
          <img
            class="bos vb yb aff"
            src="<?php echo $donne1[3]?>" style="border-radius: 100px;">
          <div class="rw">
            <div class="bpb">
              <small class="acx axc">4 min</small>
              <h6><?php echo $donne1[1]?></h6><p> <?php echo " ".$donne1[2]?></p>
            </div>

            <p>
              <?php echo $donne1[8]?>.
            </p>

            <div class="boy" data-grid="images">
              <div style="display: none">
                <img data-action="zoom" data-width="1050" data-height="700" src="<?php echo $donne1[10]?>">
              </div>
            </div>
          <ul class="nav ph xm" style="border:0px;">
            <li class="pi" style="border:0px;">
              <a class="pg active" href="#"><i class="far fa-comment"></i>
                      <label> 10</label></a>
            </li>
            <li class="pi" style="border:0px;">
              <a class="pg" href="#"><i class="fas fa-reply"></i>
                      <label> 14</label></a>
            </li>
            <li class="pi" style="border:0px;">
              <a class="pg" href="#"><i class="far fa-heart"></i>
                      <label> 9</label></a>
            </li>
            <li class="pi" style="border:0px;">
              <a class="pg" href="#"><i class="far fa-envelope"></i>
                      <label> 66</label></a>
            </li>
          </ul>
          </div>
        </li>
 <?php } ?>
      </ul>
    </div>
    <div class="fj">
      <div class="alert ro alert-dismissible d-none vy" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <a class="rj" href="profile/index.html">Visit your profile!</a> Check your self, you aren't looking well.
      </div>


      <form method="POST" enctype="multipart/form-data">
      <div class="pz afo d-none vy">
        <div class="qa">
        <h6 class="afh">Likes <small>· <a href="folowrs.php">View All</a></small></h6>
        <ul class="bow box">
          <?php
          $se=$cnx->prepare("SELECT id from utilisateur where email = ? ");
          $se->execute(array($_SESSION["email"]));
          while ($donne2=$se->fetch())
          { 
              $var=$donne2[0];
          }
          $email10=$_SESSION["email"];
          // $search=$cnx->prepare("SELECT a.id,a.id2,u.* from utilisateur u inner JOIN abonne a on u.id=a.id where a.id != ? LIMIT 2");
          $search=$cnx->prepare("SELECT * from utilisateur where email != :email and id not in (select id2 from abonne where id = :id) limit 2");
          $search->bindParam(':email', $email10);
          $search->bindParam(':id', $var);
          $search->execute();
          while ($donne1=$search->fetch()){ ?>
          <li class="rv afa">
            <img
              class="bos vb yb aff"
              src="<?php echo $donne1[5]?>">
            <div class="rw">
              <a href="profile.php?ema=<?=$donne1[1]?>"><strong><?php echo $donne1[3]?></strong></a> <?php echo $donne1[4]?>
              <div class="bpa">
                  <button class="cg nz ok" type="submit" name="submit33"><span class="h ayi"></span> Follow</button>
              </div>
              <input type="hidden" name="id1" value="<?php echo $var?>">
              <input type="hidden" name="id2" value="<?php echo $donne1[0]?>">
            </div>
          </li>
           <?php } ?>
        </ul>
        </div>
        <div class="qg">
          Dave really likes these nerds, no one knows why though.
        </div>
      </div>
      </form>

      <div class="pz bpm">
        <div class="qa">
          © 2018 Bootstrap
          <a href="#">About</a>
          <a href="#">Help</a>
          <a href="#">Terms</a>
          <a href="#">Privacy</a>
          <a href="#">Cookies</a>
          <a href="#">Ads </a>
          <a href="#">Info</a>
          <a href="#">Brand</a>
          <a href="#">Blog</a>
          <a href="#">Status</a>
          <a href="#">Apps</a>
          <a href="#">Jobs</a>
          <a href="#">Advertise</a>
        </div>
      </div>
    </div>
  </div>
</div>

<form method="POST" enctype="multipart/form-data">
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New Twitter</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-group">
            <label for="message-text" class="col-form-label">Twit:</label>
            <textarea class="form-control" id="message-text" name="description"></textarea>
          </div>
          <div class="form-group">
            <!-- <label>Image :</label>
            <input type="file" class="btn btn-primary" name="image" id="image" placeholder="Your Picture" required="required" /> -->
            <div class="upload-btn-wrapper">
              <button class="chwaria"><i class="far fa-images"></i></button>
              <input type="file" name="image" />
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="submit2" class="btn btn-primary" style="background-color: ##1E90FF;color: white;">Twetter</button>
      </div>
    </div>
  </div>
</div>
</form>



    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/chart.js"></script>
    <script src="assets/js/toolkit.js"></script>
    <script src="assets/js/application.js"></script>
    
  </body>

<!-- Mirrored from bootstrap-themes.github.io/application/profile/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 10 Mar 2019 14:48:40 GMT -->
</html>

