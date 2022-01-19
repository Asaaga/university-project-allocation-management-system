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

  <title>Supervisor - Dashboard</title>

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
          <a class="dropdown-item" href="students.php">View Student</a>
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
          <li class="breadcrumb-item active">View Students</li>
        </ol>

        <!-- Icon Cards-->
       <?php
        $username = $_SESSION['id']; 
        $sql = "SELECT * FROM supervisor WHERE username='$username'";
        $query = mysqli_query($conn,$sql);
        $fec = mysqli_fetch_assoc($query);
        $stud = $fec['stud_assigned'];

          if($fec['stud_assigned'] != 0){

          $sql2 = "SELECT * FROM propose_project WHERE project_id='$stud'";

          $query = mysqli_query($conn,$sql2);
          }
       ?>

        <!-- Area Chart Example-->
        

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            View Student</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>S/N</th>
                    <th>Student</th>
                    <th>Department</th>
                    <th>Faculty</th>
                    <th>Matri No.</th>
                    <th>Course</th>
                    <th>First Proposer</th>
                    <th>Second Proposer</th>
                    <th>Third Proposer</th>
                    <th>Project ID</th>
                    <th>Date</th>
                    <th>To Approve One</th>
                    <th>Reject</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>S/N</th>
                    <th>Student</th>
                    <th>Department</th>
                    <th>Faculty</th>
                    <th>Matri No.</th>
                    <th>Course</th>
                    <th>First Proposer</th>
                    <th>Second Proposer</th>
                    <th>Third Proposer</th>
                    <th>Project ID</th>
                    <th>Date</th>
                    <th>To Approve One</th>
                    <th>Reject</th>
                  </tr>
                </tfoot>
                <tbody>
                  <?php
                  $n = 1;
                  while($row = mysqli_fetch_assoc($query)){
                    $timeStime = $row['date'];
                    $date = date('d<\s\up>S</\s\up> M, Y ', strtotime($timeStime));
                  if($row['project_id'] == 0){
                      
                   }
                    else{
                      echo "
                  <tr>
                    <td>$n </td>
                    <td>".$row['student']."</td>
                    <td>".$row['department']."</td>
                    <td>".$row['faculty']."</td>
                    <td>".$row['mat_no']."</td>
                    <td>".$row['course_of_studies']."</td>
                    <td>".$row['first_proposal']."</td>
                    <td>".$row['second_proposal']."</td>
                    <td>".$row['third_proposal']."</td>
                    <td>".$row['project_id']."</td>
                      <td>$date</td>
                    <td>
                      <a href='approve.php?id=".$row['id']."'><button class='btn btn-success'>Click</button></a>
                    </td>
                    <td>
                      <a href='delete_proposer.php?id=".$row['id']."'><button class='btn btn-danger'>Reject</button></a>
                    </td>
                  </tr>
                  ";
                  $n++;
                }

                 }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
          
        </div>

      </div>
      <!-- /.container-fluid -->
<?php
include("footer.php");

?>
      <!-- Sticky Footer -->
     