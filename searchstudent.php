<?php
//fetch.php

 include 'database/config.php';

$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($connection, $_POST["query"]);
 $query = "
  SELECT * FROM student 
  WHERE Student_Name LIKE '%".$search."%'
  OR Student_Class LIKE '%".$search."%' 
  OR Student_ID LIKE '%".$search."%' 
  ORDER BY Student_ID;
 ";
}
else
{
 $query = "
  SELECT * FROM student 
  WHERE Student_Name ;
 ";
}



$result = mysqli_query($connection, $query);
if(mysqli_num_rows($result) > 1)
{
 $output .= '
 
  <div class="panel-body">
<div class="table-responsive">
  <table class="table table-bordered" data-toggle="table">
     <thead>
    <tr>
     <th class="info">Student ID</th>
     <th class="info">Student Name</th>
     <th class="info">Class</th>
     
    </tr>
      </thead>
       </div>
   
 ';

 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   
   <tr>
    <td>'.$row["Student_ID"].'</td>
    <td>'.$row["Student_Name"].'</td>
    <td>'.$row["Student_Class"].'</td>
   </tr>
  ';
 }
     
   echo $output; 
}

else{

       echo '
  <div class="alert alert-danger alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="false">&times;</button>
  <p>Maklumat Tidak Dijumpai..</p></div>
      ';

}



?>


<script>
  $(document).ready(function() {
    $('a[data-confirm]').click(function(ev) {
        var href = $(this).attr('href');
        if (!$('#dataConfirmModal').length) {
            $('body').append('<div id="dataConfirmModal" class="modal" role="dialog" aria-labelledby="dataConfirmLabel" aria-hidden="true"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button><h3 id="dataConfirmLabel">Please Confirm</h3></div><div class="modal-body"></div><div class="modal-footer"><button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button><a class="btn btn-primary" id="dataConfirmOK">OK</a></div></div>');
        } 
        $('#dataConfirmModal').find('.modal-body').text($(this).attr('data-confirm'));
        $('#dataConfirmOK').attr('href', href);
        $('#dataConfirmModal').modal({show:true});
        return false;
    });
});
</script>