<?php
SESSION_START();
?>

<?php
 include 'database/config.php'; 
 
 if  (!isset($_SESSION['admin']))
 {
echo "<script>alert('Sila Log Masuk terlebih dahulu..');</script>";
echo "<meta http-equiv='refresh' content='0;url=login.php'>";
exit();
}
?>

<?php 
$start=0;
$limit=5;

$t=mysqli_query($connection,"select * from student where status = 'A'");
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
$query=mysqli_query($connection,"select * from student Order by Student_Class limit $start,$limit");
 

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

 ?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SMK Bukit Beruang | Discipline Record System</title>

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>SMK</b> BB</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>SMK </b>Bukit Beruang</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <!-- Menu toggle button -->
   
          <!-- /.messages-menu -->

          <!-- Notifications Menu -->
      
                  <!-- end notification -->
             
          <!-- Tasks Menu -->
          
                <!-- Inner menu: contains the tasks -->
                
                  <!-- end task item -->
                
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
            <i class="fa fa-gear"></i>
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-body">
             
                <p>
                 <center>
                    Hello, Muhammad Iqbal 

                 </center>
                 
                </p>
              </li>
              <!-- Menu Body -->
              
              <!-- Menu Footer-->
              <li class="user-footer">
              
                <div class="pull-right">
                  <a href="#" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
     
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
   

     


      <!-- Sidebar Menu -->
     <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN MENU</li>
        <!-- Optionally, you can add icons to the links -->
        <li class=""><a href="index.php"><i class="fa fa-home"></i> <span>Halaman Utama</span></a></li>
    
        <li class="active treeview">
          <a href="student.php"><i class="fa fa-users"></i> <span>Pelajar</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
          <li><a href="student.php">Student Record</a></li>
            <li><a href="studentall.php?page=addstudent">Add Student</a></li>
            <li><a href="studentall.php?page=searchstudent">Search Student</a></li>
          </ul>
        </li>

          <li class="treeview">
          <a href="discipline.php"><i class="fa fa-pencil-square-o"></i> <span>Disiplin</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
          <li><a href="discipline.php?page=disciplinerecord">Rekod Disiplin</a></li>
            <li><a href="discipline.php?page=adddiscipline">Tambah Rekod Disiplin</a></li>
            <li><a href="discipline.php?page=searchdiscipline">Carian Rekod Disiplin</a></li>
          </ul>
            
              <li class=""><a href="index.php"><i class="fa fa-mortar-board"></i> <span>Analisa Rekod</span></a></li>

        </li>

      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Student Information
      </h1>
    </section>


<section class="content">
  
   
          <div class="box">
          <div class="box-header with border">
             <div class="table-responsive">
                  <table  class="table table-bordered table-hover dataTable">
                  <thead>
                    <tr role="row">
                      <th class="info">Kad Pengenalan</th>
                      <th class="info">Name Pelajar</th>
                      <th class="info">Kelas</th>
                      <th class="info">Jantina</th>
                      <th class="info">Edit/Delete</th>

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
                          <td><?= $ft['4']?></td>
                          <td>
         <a href="studentall.php?page=edit&id=<?php echo $ft['1']; ?>" class="btn-warning btn">Edit</a>
        <a href="studentall.php?page=delete&id=<?php echo $ft['1']; ?>" class="delete btn btn-danger">Delete</a>
                          </td>

                   
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
       

          </div>

<?php
                if(isset($_GET['page']))
                {
                if ($_GET['page']=="edit")
                {
                    include 'editstudent.php';
                }
                else if ($_GET['page']=="delete") {
                   include 'delstudent.php';
                }
                else if ($_GET['page']=="adddiscipline"){
                    include 'addrecord.php';
                }
                 else
                {
                echo 'salah pages ini bang oi..';
                }
            }
  ?>


          </div>
        </div>

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
       <b>Version</b> 1.0.0
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2017 <a href="https://qeba.my">Muhd Iqbal</a>.</strong> All rights
  </footer>



<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>
<script language="JavaScript" type="text/javascript">
$(document).ready(function(){
    $("a.delete").click(function(e){
        if(!confirm('Adakah anda pasti ?..')){
            e.preventDefault();
            return false;
        }
        return true;
    });
});
</script>

</body>
</html>