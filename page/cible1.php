
<?php
session_start();

$cnx = mysqli_connect("localhost","root","vidal62","userchallenge") or
die("error=".mysqli_connect_erno());

$res10 = mysqli_query($cnx,"SELECT * FROM challenge WHERE nom='".@$_SESSION['username']."' AND password='".@$_SESSION['password']."'");
$data = mysqli_fetch_assoc($res10);

if($data['id'])
{
  $checkbox = isset($_POST['checkbox']);
  $numid = isset($_POST['suppr']) ? $_POST['suppr'] : '';

  if(!$checkbox) header('location:repertory.php');
  else
  {
    $res = mysqli_query($cnx,"DELETE FROM contact WHERE id='$numid'");
    header('location:repertory.php');
  }
}




 ?>
