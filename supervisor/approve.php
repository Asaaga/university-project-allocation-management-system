<?php
include("../db.php");
?>
<DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin - Dashboard</title>

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
          <span>Students</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">Activity</h6>
          <a class="dropdown-item" href="view_students.php">View Student</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Projects</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">Activity</h6>
          <a class="dropdown-item" href="view_students.php">View Project</a>
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
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Asign Supervisor</li>
        </ol>

        <!-- Icon Cards-->
       <div class="container-fluid">
         <div class="col-md-12 jumbotron">
           <div class="row">
             <div class="col-md-12">
              <div class="col-md-12">
                   <div class="row">
                     <h3 class="text-center text-primary" style="margin-left: 300px;">Writer The Number Of The Approved</h3>
                   </div>
                 </div>

                 <?php
                  if (isset($_GET['id'])) {
                        $id = $_GET['id'];

                     if (isset($_POST['confirm'])) {
                    $con = $_POST['con'];
                      $message = array();
                    if($con == 1){
                        $sql = "UPDATE propose_project SET second_proposal='Not Approved',third_proposal='Not Approved' WHERE id='$id'";
                    $req = mysqli_query($conn,$sql);
                    if ($req) {
                      $message['say'] = "Approval Sent";
                    }

                    }
                    elseif ($con == 2) {
                      $sql2 = "UPDATE propose_project SET first_proposal='Not Approved',third_proposal='Not Approved' WHERE id='$id'";
                    $req2 = mysqli_query($conn,$sql2);
                    if($req2){
                      $message['say'] = "Approval Sent";
                    }
                    }
                    elseif ($con == 3) {
                      $sql3 = "UPDATE propose_project SET first_proposal='Not Approved',second_proposal='Not Approved' WHERE id='$id'";
                    $req3 = mysqli_query($conn,$sql3);
                    if($req3){
                      $message['say'] = "Approval Sent";
                    }
                   
                 }
                }
                 else{
                   $message = "Approval Not Sent";
                 }
              } 

              if(isset($message['say'])){
                $d = $message['say'];
                $show = "<h6 class='alert alert-success'>$d</h6>";
              }
              else{
                $show = '';
              }
                 
                 ?>
               <form class="form-group bg-primary" style="font-size: 20px;" method="POST">
               <div class="col-md-12">
                 <div class="row">
                   <?php echo $show; ?>
                 </div>
               </div>
                <div class="col-md-12">
                   <div class="row">
                     <label class="text-white">Write The Number</label>
                     <input type="number" name="con" class="form-control" placeholder="eg 1 for first proposer" autocomplete="off" required>
                   </div>
                 </div>
                 <div class="col-md-12">
                   <div class="row">
                     <input type="submit" value="Confirm Approval" name="confirm" class="btn btn-info my-4" style="margin:auto;">
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
     