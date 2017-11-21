  <script src="js/search/jquery.min.js"></script>

         <div class="row">
              <p>&nbsp;</p>
             <center>  <h4> Sila masukkan NAMA/ID/KELAS pelajar untuk membuat carian.</h4> </center>
             <div class="col-md-3"></div>
   
          <div class="col-md-6">
              
      <div class="input-group">
      <input type="text" name="search_text" id="search_text" class="form-control" placeholder="Mencari Maklumat Pelajar...">
      <span class="input-group-btn">
          <button class="btn btn-info" type="button">Search!</button></span></div>
          
   <br />
    <div class="col-md-6"></div>
     
   <div id="result"></div>

   </div>
    
 
 </div>
      <p>&nbsp;</p>


<script>
$(document).ready(function(){

 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"searchstudent.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('#result').html(data);
   }
  });
 }
 $('#search_text').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
});
</script>