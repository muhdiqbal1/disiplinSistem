<h2>Ubah Maklumat Pelajar</h2>
</br>

<?php 
$get = $connection->query("SELECT * FROM student where Student_ID='$_GET[id]'");
$cari = $get->fetch_assoc();

?>



<form method="post" enctype="multipart/form-data">
	
	<?php
if (isset($_POST['edit']))
{
	$connection->query("UPDATE student SET  
		Student_ID='$_POST[id_pelajar]',Student_Name='$_POST[nama_pelajar]', Student_Class='$_POST[class]', Gender='$_POST[jantina]'     where Student_ID='$_GET[id]'");
	

	echo '<div class="alert bg-success" role="alert">Maklumat Telah Berjaya di Ubah.</a></div>';
	echo '<meta http-equiv="refresh" content="3;url=student.php">';
	#header('Refresh: 5; URL=/index.php?pages=studentinfo');
	#echo "<script>location='index.php?pages=studentinfo';</script>";
	
}

	?>

		
		<label>ID Pelajar</label>
		<div class="form-group has-success" >
		<input type="text" name="id_pelajar" class="form-control"  value="<?php echo $cari['Student_ID']; ?>">
		</div>

		<div class="form-group" >
		<label>Name Pelajar</label>
		<input type="text" name="nama_pelajar" class="form-control"  value="<?php echo $cari['Student_Name']; ?>">
		</div>

		<div class="form-group">
		<label>Kelas</label>
		<input type="text" class="form-control" name="class" value="<?php echo $cari['Student_Class']; ?>" >
		</div>

		<div class="form-group">
        <label>Jantina</label>
              <select class="form-control" name="jantina">
                <option>Lelaki</option>
                 <option>Perempuan</option>
       </select> 
     </div>


<button class="btn btn-danger " name="edit">Edit Record</button>
<a href="student.php" class="btn btn-default">Back</a>
</form>

