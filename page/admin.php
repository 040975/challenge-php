<?php

session_start();
$cnx = mysqli_connect("localhost","root","vidal62","userchallenge") or
die("error=".mysqli_connect_erno());





//connexion utilisateur
 $res10 = mysqli_query($cnx,"SELECT * FROM challenge WHERE nom='".@$_SESSION['username']."' AND password='".@$_SESSION['password']."'");
 $data = mysqli_fetch_assoc($res10);

 $res1 = mysqli_query($cnx, "SELECT *, DATE_FORMAT(age, '%d/%m/%Y') AS dateFormat FROM contact");
$data1=mysqli_fetch_assoc($res1);

//mise a jours des couleurs
 if(isset($_POST['submit1'])&&$data['id'])
 {

   $titre = isset($_POST['titre'])?mysqli_real_escape_string($cnx,$_POST['titre']) :"" ;
   $navbar = isset($_POST['navbar'])?mysqli_real_escape_string($cnx,$_POST['navbar']) :"" ;
   $url = isset($_POST['url'])?mysqli_real_escape_string($cnx,$_POST['url']) :"" ;
   $bouton = isset($_POST['bouton'])?mysqli_real_escape_string($cnx,$_POST['bouton']) :"" ;
  $police = isset($_POST['police'])?mysqli_real_escape_string($cnx,$_POST['police']):"";
 $res = mysqli_query($cnx, "UPDATE custom SET titre='$titre', navbar='$navbar',url='$url',bouton='$bouton',police='$police'");
 }

 // Récupération des couleurs
 $query = mysqli_query($cnx, 'SELECT * FROM custom');
 $color = mysqli_fetch_assoc($query);

  ?>





<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Challenge PHP de chistian</title>
<link href="https://fonts.googleapis.com/css?family=Anton|Gloria+Hallelujah|Indie+Flower|Lobster|Open+Sans+Condensed:300|Pacifico" rel="stylesheet">
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
  <style> body{
    overflow: hidden;
  }
  .input{
    width:25%;
  }
  </style>
</head>

<body>

    <!-- Navigation -->
    <nav id="navbar"class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Left -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a style="font-size :25px";class="navbar-brand" href="../index.php">administrateur:<?=$data['username'];?></a>

            </div>
            <!-- Right -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                  <li><?php if(@$data['id']){
                     echo '<button type="button" class="btn btn-info btn-lg active" data-toggle="modal" data-target="#myModal">parametre </button>';
                    }?>
                  <li><?php if(@$data['id']){
                      echo '<a class="btn btn-primary btn-lg active" role="button"href="cible.php">deconnection</a>';
                    }?>
                    </li>
                  <li>
                      <a class="btn btn-primary btn-lg link" role="button"href="admin.php">Administration</a>
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
                        <a class="btn btn-primary btn-lg active" role="button"href="contact.php">Contact</a>
                    </li>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>



</div>



    <a  id="gototop" href="#mycarousel"><img src="../img/icon.png"width="20"height="20"></a>
<?php
    if(isset($_POST['submit']))
    {
      $_SESSION['username'] = isset($_POST['username'])?mysqli_real_escape_string($cnx,$_POST['username']) :"" ;
      $_SESSION['password'] = isset($_POST['password'])?mysqli_real_escape_string($cnx,$_POST['password']) :"" ;
       header('location:admin.php');
    }



     if(!$data['id'])
     {
    ?>
<form id="iden" enctype="multipart/form-data" action="admin.php" method="post">
    <p>entrez votre identifiant</p><br/><input type="text" name="username"></br>
    <p>entrez votre mot de passe</p><br/><input type="password" name="password">
    <input type="submit" name="submit" value="Executer">
  </form>
  <?php
  }

    if(@$data['id']){

      /*echo"<h1 id=\"bon\">bonjour " .$data['username']."</h1>";*/
?>
<style>
body{
  background-image: url("../img/dragon.jpg");
  background-attachment: fixed;
}
</style>
    <?php  if(isset($_POST['submit2'])){
      $id = $_POST['submit2'];
      $newusername = isset($_POST['rename' . $id])?mysqli_real_escape_string($cnx,$_POST['rename' . $id]) :"" ;
      $res = mysqli_query($cnx, "UPDATE contact SET prenom='$newusername' WHERE id=" . $_POST['submit2']);
      header('Location:admin.php');
}

?>


<div id="info">

<h1>  dernier contact</h1>
<form  enctype="multipart/form-data" action="admin.php" method="post">
<?php
mysqli_data_seek($res1,0);
while($data1 = mysqli_fetch_assoc($res1))
{
  ?>
  <h4><?=$data1['prenom'];?></h4>
  renomer le contact<input type="text" name="rename<?= $data1['id'];?>" value="<?=$data1['prenom'];?>">
  <button type='submit' name="submit2" value="<?= $data1['id'];?>">executer</button>

<?php } ?>
 </form>
</div>
<?php
mysqli_data_seek($res1, 6);
$data1 =mysqli_fetch_assoc(($res1));
?>
<div id="info2">
  <h2 style="background-color:blue";>dernier jeux posté</h2>
  <img class="img-responsive img-hover" src="../img/profils/<?=$data1['image'];?>"width="500"height="180" alt=""/>
</div>




<form enctype="multipart/form-data" action="admin.php" method="post">

         <div class="container">

       <!-- Trigger the modal with a button -->

       <!-- Modal -->
       <div class="modal fade" id="myModal" role="dialog">
         <div class="modal-dialog">

           <!-- Modal content-->
           <div class="modal-content">
             <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal">&times;</button>
               <h4 class="modal-title">parametre de couleur et de police</h4>
             </div>
             <div class="modal-body">
              couleur de titre<input type="text" name="titre" value="<?= $color['titre'] ?>"></br>
               couleur de barre de nav<input type="text" name="navbar" value="<?= $color['navbar'] ?>"></br>
                 couleur des lien<input type="text" name="url" value="<?= $color['url'] ?>"></br>
                   couleur des bouton<input type="text" name="bouton" value="<?= $color['bouton'] ?>"></br>


                   <div class="form-group">
                    <label for="sel1">Liste des polices:</label>
                    <select name="police" class="form-control" id="sel1">
                      <option<?php if($color['police'] == 'Open Sans Condensed, sans-serif') echo ' selected' ?>>Open Sans Condensed</option>
                      <option<?php if($color['police'] == 'Indie Flower, cursive') echo ' selected' ?>>Indie Flower</option>
                      <option<?php if($color['police'] == 'Lobster, cursive') echo ' selected' ?>>Lobster</option>
                      <option<?php if($color['police'] == 'Pacifico, cursive') echo ' selected' ?>>Pacifico</option>
                      <option<?php if($color['police'] == 'Gloria Hallelujah, cursive') echo ' selected' ?>>Gloria Hallelujah</option>
                      <option<?php if($color['police'] == 'Anton, sans-serif') echo ' selected' ?>>Anton</option>
                    </select>
                  </div>


                     <!--<p>police<input type="text"name="police" value ""></br></p>-->
             </div>
             <div class="modal-footer">
                     <input type="submit" name="submit1" value="executer"></br>
               <!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
             </div>
           </div>

         </div>
       </div>
<!--
       <label>titre</label>
       <input type="text" name="navbar" value=""></br>

        <label>navbar</label>
        <input type="text" name="navbar" value=""></br>
        <label>url</label>
        <input type="text" name="url" value=""></br>
        <label>bouton</label>
        <input type="text" name="bouton" value=""></br>-
        <label>envoi</label>-->
</div>
</form>

<?php
}


else{

  echo '<p id="mdpinv">mot de passe ou id icorrect</p>';

}
?>


<script src="../js/index.js" charset="utf-8"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </body>
  </html>
