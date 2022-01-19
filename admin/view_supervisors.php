DOCTYPE html>
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
          <a class="dropdown-item" href="view_students.php">View all Students</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Supervisors</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">Activity</h6>
          <a class="dropdown-item" href="view_supervisors.php">Assign Supervisor</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Projects</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">Activity</h6>
          <a class="dropdown-item" href="view_project.php">View all Projects</a>
          <a class="dropdown-item" href="asign_supervisor.php">Asign Student</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="confirm_reg.php">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Grant User Acess</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="add_admin.php">
          <i class="fas fa"></i>
          <span>Add Admin</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../logout.php">
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
          <li class="breadcrumb-item active">View Supervisors</li>
        </ol>

        <!-- Icon Cards-->
       

        <!-- Area Chart Example-->
        <?php
      include("../db.php");

      $sql = "SELECT * FROM supervisor ORDER BY id DESC";

      $result = mysqli_query($conn,$sql);

        ?>

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Supervisors table</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>S/N</th>
                    <th>Title</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Username</th>
                    <th>Department</th>
                    <th>Faculty</th>
                    <th>Email</th>
                    <th>Project Handling ID</th>
                    <th>Assignment</th>
                    <th>Date</th>
                    <th>Asign</th>
                    <th>Remove</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>S/N</th>
                    <th>Title</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Username</th>
                    <th>Department</th>
                    <th>Faculty</th>
                    <th>Email</th>
                    <th>Project Handling ID</th>
                    <th>Assignment</th>
                    <th>Date</th>
                    <th>Asign</th>
                    <th>Remove</th>
                  </tr>
                </tfoot>
                <tbody>
                  <?php
                  $n = 1;
                  while($row = mysqli_fetch_assoc($result)){
                    $timeStamp = $row['date'];
                    $date = date('d M, Y',strtotime($timeStamp));
                  ?>
                  <tr>
                    <td><?php echo $n; ?></td>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row['firstname']; ?></td>
                    <td><?php echo $row['lastname']; ?></td>
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['department']; ?></td>
                    <td><?php echo $row['faculty']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td>
                      <?php 
                       if ($row['stud_assigned'] == 0) {
                         echo "Not Assigned Yet";
                       }
                       else{
                        echo $row['stud_assigned'];
                       } 
                       ?>
                      
                    </td>
                    <td>
                      <?php
                      if ($row['status'] == 0) {
                         echo "No project Yet";
                       } 
                       else{
                        echo "Assigned";
                       }
                       ?>
                    </td>
                    <td><?php echo $date; ?></td>
                    <td>
                      <a href="edit_supervisor.php?id=<?php echo $row['id']; ?>"><button class="btn btn-success">ASIGN</button></a><a href="edit_supervisor.php?id=<?php echo $row['id']; ?>"><button class="btn btn-info my-2">change</button></a>
                    </td>
                    <td>
                      <a href="delete_supervisor.php?id=<?php echo $row['id']; ?>"><button class="btn btn-danger">Remove</button></a>
                    </td>
                  </tr>
                 <?php
                 $n++; }
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
     