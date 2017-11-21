<?php
session_start() ;
session_destroy() ;
echo "<script>alert('anda telah logout');</script>";
echo "<meta http-equiv='refresh' content='0;url=login.php'>";
?>