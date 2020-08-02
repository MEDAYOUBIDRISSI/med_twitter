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
      header("Location:index.php");
    }

    if (isset($_POST['submit'])) 
    {
        # code...
      if (isset($_POST["email11"]) && isset($_POST["password11"])) 
      {
          $email11=$_POST["email11"];
          $password11=$_POST["password11"];
          $search=$cnx->prepare("select *from utilisateur where email=:email11 and password=:password11");
          $search->bindParam(':email11', $email11);
          $search->bindParam(':password11',$password11);
          $search->execute();
          if($search)
          {
            session_start();
            $_SESSION["email"]=$email11;
            header("Location:index.php");
          }
          else
          {
             header("Location:login.php?msg1=3");
          } 
      }

    }
    
    if (isset($_POST["submit1"])) 
    {

        extract($_POST);

        if (isset($_POST["email"]) && isset($_POST["password"])&& isset($_POST["nom"]) && isset($_FILES["image"])&& isset($_FILES["background"])) 
        {
          $image=$_FILES['image']['name'];
          $temp=$_FILES['image']['tmp_name'];
          move_uploaded_file($temp,"images/".$image);
          $url="http://localhost/med_twitter/images/$image";

          $background=$_FILES['background']['name'];
          $temp2=$_FILES['background']['tmp_name'];
          move_uploaded_file($temp2,"backgrounds/".$background);
          $url2="http://localhost/med_twitter/backgrounds/$background";



          $email=$_POST["email"];
          $password=$_POST["password"];
          $nom=$_POST["nom"];
          $nom2="@_".$_POST["nom"];

          
          $search=$cnx->prepare("insert into utilisateur (`email`, `password`, `nom`, `nom2`, `image`, `background`) VALUES (:email,:password,:nom,:nom2,:image,:background)");
          $search->bindParam(':email', $email);
          $search->bindParam(':password', $password);
          $search->bindParam(':nom', $nom);
          $search->bindParam(':nom2', $nom2);
          $search->bindParam(':image', $url);
          $search->bindParam(':background', $url2);
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

$message1="";
$message2="";
if (isset($_GET["msg1"])) 
{
  if ($_GET['msg1']==12)
  {
      $message1="ERROR VERIFIER LES DONNER D'indscription";
  }
  if ($_GET['msg1']==3)
  {
      $message1="Verifier Email or Password ";
  }
  if ($_GET['msg1']==7)
  {
      $message1="Entrer email et password svp ";
  }

}
if (isset($_GET["msglogin"])) 
{
  if ($_GET['msglogin']==10)
  {
      $message2="Connecter svp";
  }
}
?>


<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from bootstrap-themes.github.io/application/login/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 10 Mar 2019 14:48:42 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">

    <title>
      
        Login &middot; Application theme &middot; Official Bootstrap Themes
      
    </title>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
    <link href="assets/css/toolkit.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
    <link href="assets/css/application.css" rel="stylesheet">

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


<body>
  <div id="page-content" class="archive-page">
          <?php if ($message1!="") 
            {
              echo "<p class='alert alert-success'>$message1</p>";
            }
          ?>
          <?php if ($message2!="") 
            {
              echo "<p class='alert alert-success'>$message2</p>";
            }
          ?>
    </div>

<div class="do axz">
  <div class="ayb">
    <form role="form" class="ahr avz j" method="POST" enctype="multipart/form-data">

      <a href="index.html" class="l afv">
        <i class="fab fa-twitter" style="font-size:80px;"></i>
      </a>

      <div class="mu">
        <input class="form-control" placeholder="Username" name="email11">
      </div>

      <div class="mu afh">
        <input type="password" class="form-control" placeholder="Password" name="password11">
      </div>

      <div class="afv">
        <input type="submit" name="submit" class="cg nq" value="Log In">
        <!-- Button trigger modal -->
        <button type="button" class="cg ns" data-toggle="modal" data-target="#exampleModal">
          Sign up
        </button>
      </div>
    </form>
        <!-- Modal -->
        <form method="POST" enctype="multipart/form-data">
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <input type="text" class="form-control input-lg" name="email" id="email" placeholder="Your Email" required="required" />
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control input-lg" name="password" id="password" placeholder="Your password" required="required" />
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control input-lg" name="nom" id="nom" placeholder="Your Name" required="required" />
                    </div>
                    <div class="form-group">
                      <label>Your Picture : </label>
                      <input type="file" class="btn btn-primary" name="image" id="image" placeholder="Your Picture" required="required" />
                    </div>
                    <div class="form-group">
                       <div class="upload-btn-wrapper" style="position: relative;left: 150px;">
                          <button class="chwaria"><i class="far fa-images">Your Background</i></button>
                          <input type="file" name="background" id="background"/>
                        </div>
                    </div>
                  </div>  
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="submit1" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </div>
        </div>
        </form>
  </div>
</div>


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

<!-- Mirrored from bootstrap-themes.github.io/application/login/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 10 Mar 2019 14:48:42 GMT -->
</html>

