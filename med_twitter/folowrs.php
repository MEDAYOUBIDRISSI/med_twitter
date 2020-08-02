
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

        if (isset($_POST["submit2"])) 
        {

            extract($_POST);

            if (isset($_POST["description"]) && isset($_FILES["image"])) 
            {
              $search=$cnx->prepare("SELECT id FROM `utilisateur` where email= ?");
              $search->execute(array($_SESSION["email"]));
              while ($donne1=$search->fetch())
              {
                $id=$donne1[0];
              }




              $image=$_FILES['image']['name'];
              $temp=$_FILES['image']['tmp_name'];
              move_uploaded_file($temp,"status/".$image);
              $url="http://localhost/med_twitter/status/$image";


              $description=$_POST["description"];
              $date=date("Y-m-d H:i:s");
              
              $search=$cnx->prepare("insert into message (`description`, `temps`, `image`, `id`) VALUES (:description,:temps,:image,:id)");
              $search->bindParam(':description', $description);
              $search->bindParam(':image', $url);
              $search->bindParam(':temps', $date);
              $search->bindParam(':id', $id);
              $search->execute();
                if($search)
                {
                  header("Location:login.php?msg1=7");
                }
                else
                {
                  header("Location:login.php?msg1=12");
                }

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
  
<!-- Mirrored from bootstrap-themes.github.io/application/notifications/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 10 Mar 2019 14:48:41 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">

    <title>
      
        Notifications &middot; Application theme &middot; Official Bootstrap Themes
      
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


<div class="cd fade" id="msgModal" tabindex="-1" role="dialog" aria-labelledby="bpq" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="d">
        <h5 class="modal-title">Messages</h5>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>

      <div class="modal-body afx js-modalBody">
        <div class="axw">
          <div class="bow cj ca js-msgGroup">
            <a href="#" class="b rx">
              <div class="rv">
                <img class="us bos vb yb aff" src="assets/img/avatar-fat.jpg">
                <div class="rw">
                  <strong>Jacob Thornton</strong> and <strong>1 other</strong>
                  <div class="bpg">
                    Aenean eu leo quam. Pellentesque ornare sem lacinia quam &hellip;
                  </div>
                </div>
              </div>
            </a>
            <a href="#" class="b rx">
              <div class="rv">
                <img class="us bos vb yb aff" src="assets/img/avatar-mdo.png">
                <div class="rw">
                  <strong>Mark Otto</strong> and <strong>3 others</strong>
                  <div class="bpg">
                    Brunch sustainable placeat vegan bicycle rights yeah…
                  </div>
                </div>
              </div>
            </a>
            <a href="#" class="b rx">
              <div class="rv">
                <img class="us bos vb yb aff" src="assets/img/avatar-dhg.png">
                <div class="rw">
                  <strong>Dave Gamache</strong>
                  <div class="bpg">
                    Brunch sustainable placeat vegan bicycle rights yeah…
                  </div>
                </div>
              </div>
            </a>
            <a href="#" class="b rx">
              <div class="rv">
                <img class="us bos vb yb aff" src="assets/img/avatar-fat.jpg">
                <div class="rw">
                  <strong>Jacob Thornton</strong> and <strong>1 other</strong>
                  <div class="bpg">
                    Aenean eu leo quam. Pellentesque ornare sem lacinia quam &hellip;
                  </div>
                </div>
              </div>
            </a>
            <a href="#" class="b rx">
              <div class="rv">
                <img class="us bos vb yb aff" src="assets/img/avatar-mdo.png">
                <div class="rw">
                  <strong>Mark Otto</strong> and <strong>3 others</strong>
                  <div class="bpg">
                    Brunch sustainable placeat vegan bicycle rights yeah…
                  </div>
                </div>
              </div>
            </a>
            <a href="#" class="b rx">
              <div class="rv">
                <img class="us bos vb yb aff" src="assets/img/avatar-dhg.png">
                <div class="rw">
                  <strong>Dave Gamache</strong>
                  <div class="bpg">
                    Brunch sustainable placeat vegan bicycle rights yeah…
                  </div>
                </div>
              </div>
            </a>
            <a href="#" class="b rx">
              <div class="rv">
                <img class="us bos vb yb aff" src="assets/img/avatar-fat.jpg">
                <div class="rw">
                  <strong>Jacob Thornton</strong> and <strong>1 other</strong>
                  <div class="bpg">
                    Aenean eu leo quam. Pellentesque ornare sem lacinia quam &hellip;
                  </div>
                </div>
              </div>
            </a>
            <a href="#" class="b rx">
              <div class="rv">
                <img class="us bos vb yb aff" src="assets/img/avatar-mdo.png">
                <div class="rw">
                  <strong>Mark Otto</strong> and <strong>3 others</strong>
                  <div class="bpg">
                    Brunch sustainable placeat vegan bicycle rights yeah…
                  </div>
                </div>
              </div>
            </a>
            <a href="#" class="b rx">
              <div class="rv">
                <img class="us bos vb yb aff" src="assets/img/avatar-dhg.png">
                <div class="rw">
                  <strong>Dave Gamache</strong>
                  <div class="bpg">
                    Brunch sustainable placeat vegan bicycle rights yeah…
                  </div>
                </div>
              </div>
            </a>
          </div>

          <div class="d-none afc js-conversation">
            <ul class="bow bpc">
              <li class="rv bpf afo">
                <div class="rw">
                  <div class="bpd">
                    Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Nulla vitae elit libero, a pharetra augue. Maecenas sed diam eget risus varius blandit sit amet non magna. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Sed posuere consectetur est at lobortis.
                  </div>
                  <div class="bpe">
                    <small class="axc">
                      <a href="#">Dave Gamache</a> at 4:20PM
                    </small>
                  </div>
                </div>
                <img class="us bos vb yb afi" src="assets/img/avatar-dhg.png">
              </li>

              <li class="rv afo">
                <img class="us bos vb yb aff" src="assets/img/avatar-fat.jpg">
                <div class="rw">
                  <div class="bpd">
                   Cras justo odio, dapibus ac facilisis in, egestas eget quam. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Praesent commodo cursus magna, vel scelerisque nisl consectetur et.
                  </div>
                  <div class="bpd">
                   Vestibulum id ligula porta felis euismod semper. Aenean lacinia bibendum nulla sed consectetur. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Nullam quis risus eget urna mollis ornare vel eu leo. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.
                  </div>
                  <div class="bpd">
                   Cras mattis consectetur purus sit amet fermentum. Donec sed odio dui. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Nulla vitae elit libero, a pharetra augue. Donec id elit non mi porta gravida at eget metus.
                  </div>
                  <div class="bpe">
                    <small class="axc">
                      <a href="#">Fat</a> at 4:28PM
                    </small>
                  </div>
                </div>
              </li>

              <li class="rv afo">
                <img class="us bos vb yb aff" src="assets/img/avatar-mdo.png">
                <div class="rw">
                  <div class="bpd">
                   Etiam porta sem malesuada magna mollis euismod. Donec id elit non mi porta gravida at eget metus. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Etiam porta sem malesuada magna mollis euismod. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Aenean lacinia bibendum nulla sed consectetur.
                  </div>
                  <div class="bpd">
                   Curabitur blandit tempus porttitor. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.
                  </div>
                  <div class="bpe">
                    <small class="axc">
                      <a href="#">Mark Otto</a> at 4:20PM
                    </small>
                  </div>
                </div>
              </li>

              <li class="rv bpf afo">
                <div class="rw">
                  <div class="bpd">
                    Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Nulla vitae elit libero, a pharetra augue. Maecenas sed diam eget risus varius blandit sit amet non magna. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Sed posuere consectetur est at lobortis.
                  </div>
                  <div class="bpe">
                    <small class="axc">
                      <a href="#">Dave Gamache</a> at 4:20PM
                    </small>
                  </div>
                </div>
                <img class="us bos vb yb afi" src="assets/img/avatar-dhg.png">
              </li>

              <li class="rv afo">
                <img class="us bos vb yb aff" src="assets/img/avatar-fat.jpg">
                <div class="rw">
                  <div class="bpd">
                   Cras justo odio, dapibus ac facilisis in, egestas eget quam. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Praesent commodo cursus magna, vel scelerisque nisl consectetur et.
                  </div>
                  <div class="bpd">
                   Vestibulum id ligula porta felis euismod semper. Aenean lacinia bibendum nulla sed consectetur. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Nullam quis risus eget urna mollis ornare vel eu leo. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.
                  </div>
                  <div class="bpd">
                   Cras mattis consectetur purus sit amet fermentum. Donec sed odio dui. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Nulla vitae elit libero, a pharetra augue. Donec id elit non mi porta gravida at eget metus.
                  </div>
                  <div class="bpe">
                    <small class="axc">
                      <a href="#">Fat</a> at 4:28PM
                    </small>
                  </div>
                </div>
              </li>

              <li class="rv afo">
                <img class="us bos vb yb aff" src="assets/img/avatar-mdo.png">
                <div class="rw">
                  <div class="bpd">
                   Etiam porta sem malesuada magna mollis euismod. Donec id elit non mi porta gravida at eget metus. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Etiam porta sem malesuada magna mollis euismod. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Aenean lacinia bibendum nulla sed consectetur.
                  </div>
                  <div class="bpd">
                   Curabitur blandit tempus porttitor. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.
                  </div>
                  <div class="bpe">
                    <small class="axc">
                      <a href="#">Mark Otto</a> at 4:20PM
                    </small>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="by aha ahl">
  <div class="dp">
    <div class="fj">

       <div class="pz d-none vy afo">
        <div class="qa">
          <h6 class="afh">Photos <small>· <a href="#">ALL</a></small></h6>
          <div data-grid="images" data-target-height="150">
            <div>
              <img data-width="640" data-height="640" data-action="zoom" src="assets/img/instagram_5.jpg">
            </div>
          </div>
        </div>
      </div>

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

    <div class="fm">
      <form method="POST" enctype="multipart/form-data">
      <ul class="ca bow box afa">
        <li class="b agz">
          <h4 class="aeh">Have you seen ...</h4>
        </li>
        <li class="b rv agz">
          
          <div class="rw">
            <div class="aew">
              <div class="dp">
        <?php
          $se=$cnx->prepare("SELECT id from utilisateur where email = ? ");
          $se->execute(array($_SESSION["email"]));
          while ($donne2=$se->fetch())
          { 
              $var=$donne2[0];
          }
          $email10=$_SESSION["email"];
          // $search=$cnx->prepare("SELECT a.id,a.id2,u.* from utilisateur u inner JOIN abonne a on u.id=a.id where a.id != ? LIMIT 2");
          $search=$cnx->prepare("SELECT * from utilisateur where email != :email and id not in (select id2 from abonne where id = :id)");
          $search->bindParam(':email', $email10);
          $search->bindParam(':id', $var);
          $search->execute();
          while ($donne1=$search->fetch()){ ?>
                <div class="fm">
                  <div class="pz bpi afa">
                    <div class="qf" style="background-image: url(<?php echo $donne1[6]?>);"></div>
                    <div class="qa avz">
                      <img class="bpj" src="<?php echo $donne1[5]?>">
                      <h5 class="qb"><a href="profile.php?ema=<?=$donne1[1]?>"><strong><?php echo $donne1[3]?></strong></a></h5>
                      <p class="afo"><?php echo $donne1[4]?></p>
                      <button class="cg nz ok" type="submit" name="submit33"><span class="h ayi"></span> Follow</button>
                    </div>
                  </div>
                </div>
                <input type="hidden" name="id1" value="<?php echo $var?>">
              <input type="hidden" name="id2" value="<?php echo $donne1[0]?>">
          <?php } ?>
              </div>
            </div>
          </div>

        </li>
        <li class="b rv agz">
          <span class="h bbr axc aey yb"></span>

          <div class="rw">
            <small class="acx axc">30 min</small>
            <div class="bpb afa">
              <a href="#"><strong>Jacob Thornton</strong></a> and <a href="#"><strong>1 other</strong></a> updated their settings
            </div>
            <ul class="bol">
              <li class="bom"><img class="us" src="assets/img/avatar-fat.jpg">
              <li class="bom"><img class="us" src="assets/img/avatar-dhg.png">
            </ul>
          </div>
        </li>
      </ul>
      </form>
    </div>
    <div class="fj">

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
    <script>
      // execute/clear BS loaders for docs
      $(function(){while(window.BS&&window.BS.loader&&window.BS.loader.length){(window.BS.loader.pop())()}})
    </script>
  </body>

<!-- Mirrored from bootstrap-themes.github.io/application/notifications/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 10 Mar 2019 14:48:42 GMT -->
</html>

