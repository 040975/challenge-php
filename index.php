<?php
session_start();
$cnx = mysqli_connect("localhost","root","vidal62","userchallenge") or
die("error=".mysqli_connect_erno());

// Récupération des couleurs
$query = mysqli_query($cnx, 'SELECT * FROM custom');
$color = mysqli_fetch_assoc($query);
$res1 = mysqli_query($cnx, "SELECT*, DATE_FORMAT(age, '%d/%m/%Y') AS dateFormat FROM contact ORDER BY id DESC LIMIT 6; ");
$data1 = mysqli_fetch_assoc($res1);
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

    <title>Challenge PHP de christian </title>
<link href="https://fonts.googleapis.com/css?family=Anton|Gloria+Hallelujah|Indie+Flower|Lobster|Open+Sans+Condensed:300|Pacifico" rel="stylesheet">
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/main.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<?php include_once('page/style.php');?>

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
                      echo '<a  class="btn btn-primary btn-lg link" role="button"href="page/cible.php">deconnection</a>';
                    }?>
                    </li>
                  <li>
                      <a class="btn btn-primary btn-lg active" role="button"href="page/admin.php">Administration</a>
                  </li>
                    <li>
                        <a class="btn btn-primary btn-lg visited" role="button"href="index.php">Home</a>
                    </li>
                    <li>
                        <a class="btn btn-primary btn-lg active" role="button"href="page/repertory.php">Repertory</a>
                    </li>
                    <li>
                        <a class="btn btn-primary btn-lg active" role="button"href="page/about.php">About</a>
                    </li>
                    <li>
                        <a class="btn btn-primary btn-lg active" role="button"href="page/contact.php">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
<a  id="gototop" href="#myCarousel"><img src="img/icon.png"width="20"height="20"></a>
    <!-- Header Carousel -->


  <?php
   if(@$data['id']){

      /*echo"<h1 id=\"bon\">bonjour " .$data['username']."</h1>";*/
  ?>
  <style>
  body{
  background-image: url("img/dragon.jpg");
  background-attachment: fixed;
  }
  </style>
<?php
}
?>

    <header id="myCarousel" class="carousel slide">
        <!-- Indic -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="3"></li>
            <li data-target="#myCarousel" data-slide-to="4"></li>
            <li data-target="#myCarousel" data-slide-to="5"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
                <div  class="fill" style="background-image:url('img/profils/<?= $data1['image'];?>')";"background-position:center!important;background-size:cover!important;width:75%;height:200px;"></div>
                <div class="carousel-caption">
                    <h2><?php echo $data1['jeux'];?></h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                </div>
            </div>
            <?php  mysqli_data_seek($res1, 1);
              while($data1 = mysqli_fetch_assoc($res1))
              {?>
            <div class="item">
                <div class="fill" style="background-image:url('img/profils/<?= $data1['image'];?>')"></div>
                <div class="carousel-caption">
                    <h2><?php echo $data1['jeux'];?></h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                </div>
            </div>
          <!--  <div class="item">
                <div class="fill" style="background-image:url('img/slide3.jpg');"></div>
                <div class="carousel-caption">
                    <h2>title 3</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                </div>
            </div>-->
            <?php
           }
             ?>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>
    </header>

    <!-- Page Content -->
    <div class="container">

        <!-- Icons Section -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Welcome !
                </h1>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-check"></i> Lorem ipsum7</h4>
                    </div>
                    <div class="panel-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, optio corporis quae nulla aspernatur in alias at numquam rerum ea excepturi expedita tenetur assumenda voluptatibus eveniet incidunt dicta nostrum quod?</p>
                        <a href="#" class="btn btn-default">Learn More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-gift"></i> Dolor Sit</h4>
                    </div>
                    <div class="panel-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, optio corporis quae nulla aspernatur in alias at numquam rerum ea excepturi expedita tenetur assumenda voluptatibus eveniet incidunt dicta nostrum quod?</p>
                        <a href="#" class="btn btn-default">Learn More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-compass"></i> Amet</h4>
                    </div>
                    <div class="panel-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, optio corporis quae nulla aspernatur in alias at numquam rerum ea excepturi expedita tenetur assumenda voluptatibus eveniet incidunt dicta nostrum quod?</p>
                        <a href="#" class="btn btn-default">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->

        <!-- Repertory Section -->
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Last creation</h2>
            </div>
            <?php
            mysqli_data_seek($res1, 0);
            while($data1 = mysqli_fetch_assoc($res1))
            {
              ?>
            <div class="portfolio-item col-md-4 col-sm-6">
                <a href="page/repertory.php">
                    <img class="img-responsive img-portfolio img-hover" src="img/profils/<?= $data1['image'];?>"/>
                </a>
            </div>
          <?php
           }
           ?>
        </div>
        <!-- /.row -->


        <hr>

        <!-- Call to Action Section -->
        <div class="well">
            <div class="row">
                <div class="col-md-8">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias, expedita, saepe, vero rerum deleniti beatae veniam harum neque nemo praesentium cum alias asperiores commodi.</p>
                </div>
                <div class="col-md-4">
                    <a class="btn btn-lg btn-default btn-block" href="#">Call to Action</a>
                </div>
            </div>
        </div>

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
    <script src="js/bootstrap.min.js"></script>
    <script>
        $('.carousel').carousel({
            interval: 5000
        })
    </script>

</body>

</html>
