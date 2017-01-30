<?php
session_start();
$cnx = mysqli_connect("localhost","root","vidal62","userchallenge") or
die("error=".mysqli_connect_erno());



//recuperation des information contact
$res1 = mysqli_query($cnx, "SELECT *, DATE_FORMAT(age, '%d/%m/%Y') AS dateFormat FROM contact ORDER BY id DESC LIMIT 6");
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
                <a style="font-size :25px"class="navbar-brand" href="index.php">administrateur:<?=$data['username'];?></a>
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
                        <a class="btn btn-primary btn-lg visited" role="button"href="repertory.php">Repertory</a>
                    </li>
                    <li>
                        <a class="btn btn-primary btn-lg active" role="button"href="about.php">About</a>
                    </li>
                    <li>
                        <a class="btn btn-primary btn-lg active" role="button"href="contact.php">Contact</a>
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
                <h1 class="page-header">Repertory</h1>
                <ol class="breadcrumb">
                    <li><a href="../index.php">Home</a>
                    </li>
                    <li class="active">Portfolio</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <!-- Friends Row -->
  <div class="row">
        <?php  while($data1 = mysqli_fetch_assoc($res1))
        {
          ?>

            <div style="border:1px solid black";"margin-left:0px!important";"padding-left:0px!important"; class="col-md-4 img-portfolio">
                <img class="img-responsive img-hover" src="../img/profils/<?= $data1['image'];?>" alt="">
            <?php
            if(@$data['id'])
            {
            ?>
              <form id="delete"action="cible1.php" method ='post'>
                <input type="checkbox" name="checkbox"value="sur"/>
                <input name="suppr" type="hidden" value="<?= $data1['id'] ?>">
                <input type="submit" name="tsurgro"value='X'>
              </form>
            <?php
            }
            ?>

                <h3 style="text-align:center;"><?= $data1['prenom'];?></h3>
                <p style="text-align:center;"> <span>née le :<?= $data1['age'];?></span></p>

                <p style="text-align:center;">message: <?= $data1['message'];?></p>
                <h4>jeux préferé:<?= $data1['jeux'];?>"</h4>
                <table class="table table-striped  table-hover">
                    <thead>
                        <tr>
                            <th>jeux:<?= $data1['jeux'];?></td>
                            <th>nom:<?= $data1['prenom'];?></td>
                        </tr>
                    </thead>
                    <tr>
                        <td>Lorem</td>
                        <td>Ipsum</td>
                    </tr>
                </table>
            </div>
            <?php
            }
            ?>
          </div> <!--row fin-->

            <!--<div class="col-md-4 img-portfolio">
                <img class="img-responsive img-hover" src="../img/portfolio1.jpg" alt="">

                <h3>Username</h3>
                <p>22 ans <span>(19/12/1994)</span></p>

                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
                <h4>Games</h4>
                <table class="table table-striped  table-hover">
                    <thead>
                        <tr>
                            <th>Game</td>
                            <th>Username</td>
                        </tr>
                    </thead>
                    <tr>
                        <td>Lorem</td>
                        <td>Ipsum</td>
                    </tr>
                </table>
            </div>

            <div class="col-md-4 img-portfolio">
                <img class="img-responsive img-hover" src="../img/portfolio1.jpg" alt="">
                <h3>Username</h3>
                <p>22 ans <span>(19/12/1994)</span></p>

                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
                <h4>Games</h4>
                <table class="table table-striped  table-hover">
                    <thead>
                        <tr>
                            <th>Game</td>
                            <th>Username</td>
                        </tr>
                    </thead>
                    <tr>
                        <td>Lorem</td>
                        <td>Ipsum</td>
                    </tr>
                </table>
            </div>
        </div>


        <!Friends Row
        <div class="row">
            <div class="col-md-4 img-portfolio">
                <img class="img-responsive img-hover" src="../img/portfolio1.jpg" alt="">
                <h3>Username</h3>
                <p>22 ans <span>(19/12/1994)</span></p>

                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
                <h4>Games</h4>
                <table class="table table-striped  table-hover">
                    <thead>
                        <tr>
                            <th>Game</td>
                            <th>Username</td>
                        </tr>
                    </thead>
                    <tr>
                        <td>Lorem</td>
                        <td>Ipsum</td>
                    </tr>
                </table>
            </div>

            <div class="col-md-4 img-portfolio">
                <img class="img-responsive img-hover" src="../img/portfolio1.jpg" alt="">
                <h3>Username</h3>
                <p>22 ans <span>(19/12/1994)</span></p>

                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
                <h4>Games</h4>
                <table class="table table-striped  table-hover">
                    <thead>
                        <tr>
                            <th>Game</td>
                            <th>Username</td>
                        </tr>
                    </thead>
                    <tr>
                        <td>Lorem</td>
                        <td>Ipsum</td>
                    </tr>
                </table>
            </div>

            <div class="col-md-4 img-portfolio">
                <img class="img-responsive img-hover" src="../img/portfolio1.jpg" alt="">
                <h3>Username</h3>
                <p>22 ans <span>(19/12/1994)</span></p>

                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
                <h4>Games</h4>
                <table class="table table-striped  table-hover">
                    <thead>
                        <tr>
                            <th>Game</td>
                            <th>Username</td>
                        </tr>
                    </thead>
                    <tr>
                        <td>Lorem</td>
                        <td>Ipsum</td>
                    </tr>
                </table>
            </div>
        </div>
        <! /.row -->

        <!-- Friends Row
        <div class="row">
            <div class="col-md-4 img-portfolio">
                <img class="img-responsive img-hover" src="../img/portfolio1.jpg" alt="">
                <h3>Username</h3>
                <p>22 ans <span>(19/12/1994)</span></p>

                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
                <h4>Games</h4>
                <table class="table table-striped  table-hover">
                    <thead>
                        <tr>
                            <th>Game</td>
                            <th>Username</td>
                        </tr>
                    </thead>
                    <tr>
                        <td>Lorem</td>
                        <td>Ipsum</td>
                    </tr>
                </table>
            </div>

            <div class="col-md-4 img-portfolio">
                <img class="img-responsive img-hover" src="../img/portfolio1.jpg" alt="">
                <h3>Username</h3>
                <p>22 ans <span>(19/12/1994)</span></p>

                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
                <h4>Games</h4>
                <table class="table table-striped  table-hover">
                    <thead>
                        <tr>
                            <th>Game</td>
                            <th>Username</td>
                        </tr>
                    </thead>
                    <tr>
                        <td>Lorem</td>
                        <td>Ipsum</td>
                    </tr>
                </table>
            </div>

            <div class="col-md-4 img-portfolio">
                <img class="img-responsive img-hover" src="../img/portfolio1.jpg" alt="">
                <h3>Username</h3>
                <p>22 ans <span>(19/12/1994)</span></p>

                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
                <h4>Games</h4>
                <table class="table table-striped  table-hover">
                    <thead>
                        <tr>
                            <th>Game</td>
                            <th>Username</td>
                        </tr>
                    </thead>
                    <tr>
                        <td>Lorem</td>
                        <td>Ipsum</td>
                    </tr>
                </table>
            </div>
        </div>
         /.row -->

        <hr>

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
