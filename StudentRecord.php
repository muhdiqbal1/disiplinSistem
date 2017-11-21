<?php 
$start=0;
$limit=2;

$t=mysqli_query($connection,"select * from student");
$total=mysqli_num_rows($t);
 
if(isset($_GET['id']))
{
	$id=$_GET['id'];
	$start=($id-1)*$limit;
	//$start=2*1;
	//$start=2;
}
else
{
	$id=1;
}
$page=ceil($total/$limit);
$query=mysqli_query($connection,"select * from student limit $start,$limit");
 ?>

<html>
 <table class="table table-bordered">
<thead>
	<tr>
		<th>Student ID</th>
		<th>Student Name</th>
		<th>Student Class</th>
	</tr>
</thead>

<tbody>
	<?php
	while($ft=mysqli_fetch_array($query))
	{?>
	 <tr>
        <td><?= $ft['1']?></td>
        <td><?= $ft['2']?></td>
        <td><?= $ft['3']?></td>

 
      </tr>
	<?php
	}
	?>
</tbody>
</table>
<center>

<ul class="pagination">
	 <?php if($id > 1) {?> <li><a href=?id=<?php echo ($id-1) ?>">Previous</a></li><?php }?>
	 <?php
	 for($i=1;$i <= $page;$i++){
	 ?>
		<li><a href="?id=<?php echo $i ?>"><?php echo $i;?></a></li>
	  <?php
	 }
	  ?>
	<?php if($id!=$page)
	//3!=4
	{?> 
	  <li><a href="?id=<?php echo ($id+1); ?>">Next</a></li>
	<?php }?>
 </ul>
</center>
</html>