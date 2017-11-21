<?php
	$connect = mysqli_connect(
	"localhost", //host
	"root", //username
	"", //password
	"disiplin" //db name
); 

if (!$connect)
  {
  die("Connection error: " . mysqli_connect_error());
  }
?>
