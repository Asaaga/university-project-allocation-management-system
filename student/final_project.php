<?php include("../db.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Student - Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="index.php">University Project Management System</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
   <?php include("header.php"); ?>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="dashboard.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Projects</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <?php 
          $sql = "SELECT * FROM propose_project";
          $query = mysqli_query($conn,$sql);
          $row = mysqli_fetch_assoc($query);
          $row['id'];
          ?>
          <h6 class="dropdown-header">Activity</h6>
          <a class="dropdown-item" href="add_project.php?id=<?php echo $row['id']; ?>">Add Proposal(s)</a>
          <a class="dropdown-item" href="supervisor.php">See Approved Project</a>
          <a class="dropdown-item" href="final_project.php?id=<?php echo $row['id']; ?>">Completed Project</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../logout.php">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Logout</span></a>
      </li>
      
    </ul>
     <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Student Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Project Proposer</li>
        </ol>

        <!-- Icon Cards-->
       <div class="container-fluid">
         <div class="col-md-12 jumbotron">
           <div class="row">
             <div class="col-md-12">
              <div class="col-md-12">
                   <div class="row">
                     <h3 class="text-center text-primary" style="margin-left: 150px;">Upload Your Project Completed Copy</h3>
                   </div>
                 </div>

                 <?php
                 if (isset($_GET['id'])) {

                     $id = $_GET['id'];


                     $username = $_SESSION['id'];
                     $aply = "SELECT * FROM propose_project WHERE username='$username'";
                     $use = mysqli_query($conn,$aply);
                     $sen = mysqli_fetch_assoc($use);

                     $dent = $sen['project_id'];

                     $pos = "SELECT * FROM supervisor WHERE stud_assigned='$dent'";
                     $poss = mysqli_query($conn,$pos);
                     $free = mysqli_fetch_assoc($poss);

                     $email = $free['email'];

                    if (isset($_POST['add'])) {
                      $link = $_POST['link'];
                    $img = $_FILES['img']['name'];
                    $tmp = $_FILES['img']['tmp_name'];
                    $final = $img;
                    $folder = "images/".$final;

                    move_uploaded_file($tmp,$folder);

                    if(empty($img)){
                      $sql = "UPDATE propose_project SET final_copy='$link' WHERE id='$id'";
                      $req = mysqli_query($conn,$sql);
                    }
                   else if (empty($link)) {
                    $sql = "UPDATE propose_project SET final_copy='$img' WHERE id='$id'";
                    $req = mysqli_query($conn,$sql);
                   }
                   if ($req) {
                     echo "<span style='color:green;'><h3>Task Successful, 'Congrate'</h3></span>";
                   }
                   else{
                    echo "<span style='color:red;'><h3>Not Sent</h3></span>";
                   }
                 }
                 }
                 
                 ?>
               <form class="form-group" style="font-size: 20px;" method="POST" enctype="multipart/form-data">
                 <div class="col-md-12">
                   <div class="row">
                     <label>Final Project Copy</label>
                     <input type="file" name="img" class="form-control">
                   </div>
                 </div>
               </form>
             </div>
           </div>
         </div>
       </div>

       
          </div>
          
        </div>

      </div>
      <!-- /.container-fluid -->
<?php
include("footer.php");

?>
      <!-- Sticky Footer -->
     