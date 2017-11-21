 <?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "disiplin";
  
$connection = mysqli_connect($servername, $username, $password, $database);

  // Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

?>