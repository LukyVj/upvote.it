<?php
header('location:index.php');
include('config.php');
$id = $_GET['id'];
$Q = 'UPDATE `upvote` SET `note` = `note` - 1 WHERE `id` = '.$id.'';
  $req = mysql_query($Q) or die('Erreur SQL !<br>'.$Q.'<br>'.mysql_error()); 
?>