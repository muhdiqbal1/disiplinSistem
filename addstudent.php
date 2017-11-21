<!--addstudent record..-->

<space></space>

<h2>Tambah Rekod Pelajar</h2>
</br>

<space></space>

<?php
if(isset($_POST['submit']))
{
	$connection->query("INSERT INTO student (Student_ID,Student_Name,Student_Class,Gender)
		VALUES ('$_POST[id]','$_POST[nama_pelj]','$_POST[kelas]','$_POST[jantina]')");

	echo '<div class="alert bg-success" role="alert">Maklumat Telah Berjaya di Tambah Dalam Rekod!.</a></div>';
	echo '<meta http-equiv="refresh" content="3;url=student.php">';
}
?>

<form method="post" enctype="multipart/form-data">

<div class="form-group">
		<label>No Kad Pengenalan Pelajar</label>
		<input type="text" class="form-control" name="id" placeholder="IC Pelajar " pattern="[0-9]{6}[0-9]{2}[0-9]{4}" required oninvalid="setCustomValidity('Nombor Sahaja, tanpa (-), Maksima: 12 ')">
	</div>

	<div class="form-group">
		<label>Name Pelajar</label>
		<input type="text" class="form-control" name="nama_pelj" placeholder="Nama Penuh Pelajar" required> 
	</div>
	
	<div class="form-group">
		<label>Kelas</label>
		<input type="text" class="form-control" name="kelas" placeholder="1A" pattern="" required oninvalid="setCustomValidity('Nombor Sahaja, tanpa (-) ')">
	</div>

	<div class="form-group">
        <label>Jantina</label>
              <select class="form-control" name="jantina">
                <option>Lelaki</option>
                 <option>Perempuan</option>
       </select>
     </div>




	<button class="btn btn-success " name="submit">Submit</button>
	<a href="student.php" class="btn btn-default">Back</a>
</form>







