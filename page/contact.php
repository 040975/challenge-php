<?php
session_start();
$cnx = mysqli_connect("localhost","root","vidal62","userchallenge") or
die("error=".mysqli_connect_erno());

// Récupération des couleurs
$query = mysqli_query($cnx, 'SELECT * FROM custom');
$color = mysqli_fetch_assoc($query);

$res10 = mysqli_query($cnx,"SELECT * FROM challenge WHERE nom='".@$_SESSION['username']."' AND password='".@$_SESSION['password']."'");
 $data = mysqli_fetch_assoc($res10);

?>



<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Challenge PHP de </title>
<link href="https://fonts.googleapis.com/css?family=Anton|Gloria+Hallelujah|Indie+Flower|Lobster|Open+Sans+Condensed:300|Pacifico" rel="stylesheet">
    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/main.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  <?php include_once('style.php');?>
    </style>
</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Left -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a style="font-size :25px"class="navbar-brand" href="index.html">administrateur:<?=$data['username'];?></a>
            </div>
            <!-- Right -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                  <li><?php if(@$data['id']){
                      echo '<a class="btn btn-primary btn-lg link" role="button"href="cible.php">deconnection</a>';
                    }?>
                    </li>
                  <li>
                      <a class="btn btn-primary btn-lg active" role="button"href="admin.php">Administration</a>
                  </li>
                    <li>
                        <a class="btn btn-primary btn-lg active" role="button"href="../index.php">Home</a>
                    </li>
                    <li>
                        <a class="btn btn-primary btn-lg active" role="button"href="repertory.php">Repertory</a>
                    </li>
                    <li>
                        <a class="btn btn-primary btn-lg active" role="button"href="about.php">About</a>
                    </li>
                    <li>
                        <a class="btn btn-primary btn-lg visited" role="button"href="contact.php">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
<a  id="gototop"href="#mycarousel"><img src="../img/icon.png"width="20"height="20"></a>
    <!-- Page Content -->
    <?php
     if(@$data['id']){

        /*echo"<h1 id=\"bon\">bonjour " .$data['username']."</h1>";*/
    ?>
    <style>
    body{
    background-image: url("../img/dragon.jpg");
    background-attachment: fixed;
    }
    </style>
    <?php
    }
    ?>


    <div class="container">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Contact</h1>
                <ol class="breadcrumb">
                    <li><a href="../index.php">Home</a>
                    </li>
                    <li class="active">Contact</li>
                </ol>
            </div>
        </div>






        <?php
        $res = mysqli_query($cnx, "SELECT *, DATE_FORMAT(age, '%d/%m/%Y') AS dateFormat FROM contact'");
        @$data = mysqli_fetch_assoc($res);

        if(isset($_POST['submitprofile']))
        {

          // Récupération du POST
          $file = $_FILES['image']['name'];

          if(@$file && $file != '')
          {
            $type = $_FILES['image']['type'];
            $size = $_FILES['image']['size'];
            $tmp = $_FILES['image']['tmp_name'];
            $path = $_SERVER['DOCUMENT_ROOT'] ."/challengePHP/img/profils/";
            $ext_valid = array('image/jpg', 'image/gif', 'image/png', 'image/jpeg');

            if(in_array($type, $ext_valid))
            {
              if(!move_uploaded_file($tmp, $path . $file ))
              $file = '';
            }
          }

          $jeux = isset($_POST['jeux'])?mysqli_real_escape_string($cnx,$_POST['jeux']) :"" ;
          $newdate = isset($_POST['age'])?mysqli_real_escape_string($cnx,$_POST['age']) :"" ;
          $prenom= isset($_POST['prenom'])?mysqli_real_escape_string($cnx,$_POST['prenom']) :"";
          $email = isset($_POST['email'])?mysqli_real_escape_string($cnx,$_POST['email']) :"";
          $message = isset($_POST['message'])?mysqli_real_escape_string($cnx,$_POST['message']) :"";
            $id = isset($_POST['id'])?mysqli_real_escape_string($cnx,$_POST['id']) :"";
          $newdate = implode('-', array_reverse(explode('/', $newdate)));


            $res = mysqli_query($cnx,"INSERT INTO contact(prenom,image,email,jeux,age,message) VALUES('$prenom', '$file', '$email', '$jeux', '$newdate', '$message')");

             $res3 = move_uploaded_file($_FILES['image']['name'],
            $_SERVER['DOCUMENT_ROOT'] ."img/profils/" .$_FILES['image']['name'] );
             }

        ?>
        <!-- /.row -->

        <!-- Content Row -->
        <div class="row">
             <div  class="container-fluid"><!-- Form Column -->
            <div class="col-md-6">
                <!-- Contact form -->

                   <div id="page1">
                <form  enctype="multipart/form-data" action="contact.php" method="post">
                </br>

                  <p style="text-align:center;"> prénom:</br><input type="text" name="prenom" value="<?php echo $data['prenom'];?>"></p>
                  <p style="text-align:center;"> age:</br><input type="text" name="age" value="<?php echo $data['age'];?>"></p>
                  <p style="text-align:center;">image:</br><input type="file"  name="image" value=""></p>
                </div>
              </div>

              <div class="col-md-6">
                    <div id=page2>
                  <p>jeux:</br><input type="text" name="jeux" value="<?php echo $data['jeux'];?>"></p>
                    <p>email:</br><input type="text" name="email" value="<?php echo $data['email'];?>"></p>
                  <br>
                    message:</br><textarea   class="form-control"rows='4' cols='20'type="text"name="message"value="<?php echo $data['message'];?>"></textarea>
                      <button type="submitprofile" name="submitprofile">envois modification</button>
                </form>
                   </div>
            </div>
            </div>
        </div>
</div>
        <!-- /.row -->



        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; SimplonBSM 2017</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>

</body>

</html>
