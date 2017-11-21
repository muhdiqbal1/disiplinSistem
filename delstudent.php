<?php
$get = $connection->query("SELECT * FROM student where Student_ID='$_GET[id]'");
$cari = $get->fetch_assoc();

$connection->query("UPDATE STUDENT SET status ='I' where Student_ID='$_GET[id]'");
echo "<script>alert('Data telah berjaya di delete');</script>";
echo "<script>location='student.php';</script>";
?>