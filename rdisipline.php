<table class='table table-bordered'>
	<thead>
			<tr>
			<th>Nama Pelajar</th>
			<th>Kelas Pelajar</th>
			<th>Kesalahan</th>
			<th>Merit</th>
			<th>Maklumat Kes</th>
		</tr>
	</thead>
	<tbody>
	<?php $get=$connection->query("

		SELECT  
  	 student.student_name,
 	 student.student_class,
 	 kesalahan.JENIS_KESALAHAN,
 	 rekod.Record_Merit,
	 rekod.Record_Comment 
 	 from rekod 
 	 join student 
 	 on student.Student_ID = rekod.Student_ID 
 	 join kesalahan 
 	 on kesalahan.KOD_KESALAHAN=rekod.KOD_KESALAHAN
	 GROUP BY student.student_name;
");




$data = [];

foreach($get->fetch_all() as $i => $d) {
	$data[$i]['student_name'] = $d[0];
	$data[$i]['student_class'] = $d[1];
	$data[$i]['JENIS_KESALAHAN'] = [$d[2]];
	$data[$i]['Record_Merit'] = $d[3];
	$data[$i]['Record_Comment'] = $d[4];

	if($data[$i]['student_name'] === $d[0]) {
		array_push($data[$i]['JENIS_KESALAHAN'], $d[2]);
	} else {

	}
}
echo '<pre>' . var_export($data, true) . '</pre>';
die;


?>




			<?php foreach($data as $i => $cari) { ?>
				<?php if($cari['student_name'] !== $data[$i]['student_name']) : ?>
					<tr>
						<td><?= $cari['student_name']?></td>
						<td><?= $cari['student_class']?></td>
						<td><?= $cari['JENIS_KESALAHAN']?></td>
						<td><?= $cari['Record_Merit']?></td>
						<td><?= $cari['Record_Comment']?></td>
					</tr>
				<?php else : ?>
					<tr>
						<td colspan="4"><?= $cari['JENIS_KESALAHAN']?></td>
					</tr>
				<?php endif; ?>
			<?php 	} ?>




	
	</tbody>
</table>

**/


