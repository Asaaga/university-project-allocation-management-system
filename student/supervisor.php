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
          <h6 class="dropdown-header">Activity</h6>
          <a class="dropdown-item" href="add_project.php">Add Proposal(s)</a>
          <?php 
          $user = $_SESSION['id'];
          $sql = "SELECT * FROM propose_project WHERE username='$user'";
          $query = mysqli_query($conn,$sql);
          $row = mysqli_fetch_assoc($query);
          $row['id'];
          ?>
          <a class="dropdown-item" href="add_project.php?id=<?php echo $row['id']; ?>">add Proposal(s)</a>
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
          <li class="breadcrumb-item active">Approved Project And Supervisor</li>
        </ol>

        <!-- Icon Cards-->
                  <?php
                  $username = $_SESSION['id'];

                    $sql = "SELECT * FROM propose_project WHERE username='$username'";
                    $query = mysqli_query($conn,$sql);
                    $row = mysqli_fetch_assoc($query);
                    $supervisor = $row['project_id'];

                    $sql2 = "SELECT * FROM supervisor WHERE stud_assigned='$supervisor'";
                    $query2 = mysqli_query($conn,$sql2);
                    $result = mysqli_fetch_assoc($query2);                  
                  ?>
                  <table class="table table-bordered">
                    <tr><th class="text-white text-center" colspan="2" bgcolor="purple">SUPERVISORS DETAIL</th></tr>
                    
                      
                      <?php
                      if ($result['stud_assigned'] == 0) {
                         echo "<tr><td class='text-center'>Not Assigned</td></tr>";
                       }
                       else{
                          echo "   <tr><th bgcolor='orange'>Name</th>
                                      <td bgcolor='green'>
                                      ".$result['title']." ".$result['firstname']." ".$result['lastname']."
                                      </td>
                                      <tr>
                                        <tr>
                                      <th bgcolor='orange'>Department</th>
                                      <td bgcolor='green'> 
                                       ".$result['department']."
                                      </td>
                                      <tr>
                                        <th bgcolor='orange'>Faculty</th>
                                      <td bgcolor='green'> 
                                        ".$result['faculty']."
                                      </td>
                                    </tr>
                                     <tr>
                                        <th bgcolor='orange'>Email</th>
                                      <td bgcolor='green'>
                                        ".$result['email']."
                                      </td>
                                    </tr> ";
                                       } 
                                         
                                       ?>
                     
                  </table>
          </div>
          
        </div>

      </div>
      <!-- /.container-fluid -->
<?php
include("footer.php");

?>
      <!-- Sticky Footer -->
     