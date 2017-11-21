<?php
       include 'database/find.php'; 
?>
     <form name="frmdropdown" method="post" action="rekod.php">
     <center>
            <h2 align="center">Rekod Disiplin pelajar</h2>
         
            <strong> Select Designation : </strong> 
            <select name="rekodpelajar"> 
               <option value=""> -----------ALL----------- </option> 
            <?php
  
                 $dd_res=mysql_query("Select DISTINCT Student_ID from rekod");
                 while($r=mysql_fetch_row($dd_res))
                 { 
                       echo "<option value='$r[0]'> $r[0] </option>";
                 }
             ?>
              </select>
     <input type="submit" name="find" value="find"/> 
     <br><br>
  
   <table border="1">
 <tr align="center">
     <th>Kad Pengenalan</th>      <th>Nama Pelajar </th>     <th>Kelas</th>    <th>Kesalahan</th>    <th>Merit</th>
 </tr> 
 
 <?php
  if($_SERVER['REQUEST_METHOD'] == "POST")
  {
         $des=$_POST["rekodpelajar"]; 
         if($des=="")  // if ALL is selected in Dropdown box
         { 
             $res=mysql_query("Select * from rekod");
         }
         else
         { 
             $res=mysql_query("Select * from student where student_class='".$des."'");
         }
  
         echo "<tr><td colspan='5'></td></tr>";
         while($r=mysql_fetch_row($res))
         {
                 echo "<tr>";
                 echo "<td align='center'>$r[1]</td>";
                 echo "<td width='200'>$r[2]" . " $r[3]</td>";
                 echo "<td alig='center' width='40'> $r[4]</td>";
                 echo "<td align='center' width='200'>$r[4]</td>";
                 echo "<td width='100' align='center'>$r[5]</td>";
                 echo "</tr>";
        }
    }
?>
  </table>
 </center>
</form>


<?php $det=$connection->query("
                                SELECT distinct student.student_name 
                                from student  join rekod
                                on student.student_id = rekod.Student_ID");?>
                                


            <?php while($cari=$get->fetch_assoc()){ ?>
                
                <tr>
                <td><?php echo $cari['student_name']?></td>
                <td><?php echo $cari['student_class']?></td>
                <td><?php echo $cari['JENIS_KESALAHAN']?></td>
                <td><?php echo $cari['Record_Merit']?></td>
                <td><?php echo $cari['Record_Comment']?></td>
                </tr>
        <?php   } ?>
    
    </tbody>
</table>

<?php



$result = $connection->query("select distinct student_id from rekod");
    
    echo "<html>";
    echo "<body>";
    echo "<select name='id'>";
    echo "Sila Pilih satu";
    while ($row = $result->fetch_assoc()) {

                  unset($id);
                  $id = $row['student_id'];
                  
                  echo '<option value="'.$id.'">'.$id;
                 
}

    echo "</select>";
    echo "</body>";
    echo "</html>";
?>

