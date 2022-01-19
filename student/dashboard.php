<?php
include("../db.php"); 
?>
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

    <a class="navbar-brand mr-1" href="dashboard.php">University Project Management System</a>

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
          $user = $_SESSION['id'];
          $sql = "SELECT * FROM propose_project WHERE username='$user'";
          $query = mysqli_query($conn,$sql);
          $row = mysqli_fetch_assoc($query);
          $row['id'];
          ?>
          <h6 class="dropdown-header">Activity</h6>
          <a class="dropdown-item" href="add_project.php?id=<?php echo $row['id']; ?>">Add Proposal(s)</a>
          <a class="dropdown-item" href="supervisor.php">See Supavisor</a>
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
          <li class="breadcrumb-item active">Overview</li>
        </ol>

        <!-- Icon Cards-->
        <div class="row">
          <div class="col-xl-3 col-sm-6 mb-3" style="margin-left:150px;">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-comments"></i>
                </div>
                <div class="mr-5">
                  <h3>Supervisor</h3>
                  <?php
                    $name = $_SESSION['id'];

                    $so = "SELECT * FROM propose_project  WHERE username='$name'";
                    $qy = mysqli_query($conn,$so);

                    $rw = mysqli_fetch_assoc($qy);
                    $super = $rw['project_id'];

                   if ($rw['project_id'] != 0) {

                     $sq2 = "SELECT * FROM supervisor WHERE stud_assigned='$super'";
                    $quy2 = mysqli_query($conn,$sq2);
                    $sult = mysqli_fetch_assoc($quy2);

                    if($sult['stud_assigned'] == 0){
                      echo "<h6>Not Assigned Yet!</h6>";
                    }
                    else{
                      echo "<h6>".$sult['title']." ".$sult['firstname']." ".$sult['lastname']."</h6>";
                    } 
                                     
                     }                
                  ?>
                  
                </div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="supervisor.php">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3" style="margin-left:250px;">
            <div class="card text-white bg-warning o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-list"></i>
                </div>
                <div class="mr-5">Propose Courses</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="propose_course.php?id=<?php echo $rw['id']; ?>">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          

        <!-- Area Chart Example-->
        

        <!-- DataTables Example -->

      <!-- /.container-fluid -->
<?php
include("footer.php");

?>
      <!-- Sticky Footer -->
     