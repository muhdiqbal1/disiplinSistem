<!--add disiplin record..-->

<space></space>

<h2>Tambah Disiplin Rekod</h2>
</br>

<space></space>

<?php
if(isset($_POST['submit']))
{
	$connection->query("INSERT INTO rekod (Student_ID,KOD_KESALAHAN,Record_Date,Record_Merit,Record_Comment )
		VALUES ('$_POST[id]','$_POST[kesalahan]','$_POST[date]','$_POST[merit]','$_POST[kes]')");

	echo '<div class="alert bg-success" role="alert">Maklumat Telah Berjaya di Tambah Dalam Rekod!.</a></div>';
	echo '<meta http-equiv="refresh" content="3;url=discipline.php?page=adddiscipline">';
}
?>

<form method="post" enctype="multipart/form-data">

<div class="form-group">
		<label>Nama Pelajar</label>
	
	<?php
	$result = $connection->query("select Student_ID,student_name from student");
    echo "<select  class='form-control' name='id' >";
	echo "Sila Pilih satu";
    
    while ($row = $result->fetch_assoc()) {

            unset($id,$name);
            $id = $row['Student_ID'];
            $name = $row['student_name'];
                  
            echo '<option value="'.$id.'">'.$name;   }
    		echo "</select>";
	?>


	</div>



	<div class="form-group">
		<label>Kesalahan Pelajar</label>
			<?php
	$result = $connection->query("select * from kesalahan");
    echo "<select  class='form-control' name='kesalahan' >";
	echo "Sila Pilih satu";
    
    while ($row = $result->fetch_assoc()) {

            unset($id,$name);
            $kod = $row['KOD_KESALAHAN'];
            $jeniskesalahan = $row['JENIS_KESALAHAN'];
                  
            echo '<option value="'.$kod.'">'.$jeniskesalahan;   }
    		echo "</select>";
	?>
		<div class="form-group">
		



     </div>
	</div>
	
		
	<div class="form-group">
                
			<label>Tarikh Kesalahan</label>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>

   					<input type="text" class="form-control pull-right" id="datepicker" class="datepicker" name="date"  ">
                </div>
             
              </div>


              <div class="form-group">
                  <label>Maklumat Kes</label>
                  <textarea class="form-control" rows="3" placeholder="Jelaskan maklumat kes.." name="kes"></textarea>
                  </div>

	<div class="form-group">
        <label>Mata Merit</label>
              <select class="form-control" name="merit">
                 <option value="1">Kesalahan Ringan</option>
                 <option value="2">Kesalahan Sederhana</option>
                 <option value="3">Kesalahan Berat</option>
       </select>
     </div>


	<button class="btn btn-success " name="submit">Submit</button>
	<a href="discipline.php?page=adddiscipline" class="btn btn-default">Back</a>

</form>

<script type="text/javascript">
  
   $( ".datepicker" ).datepicker({
   format: 'yyyy-mm-dd'
    });
</script>



