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
          <li class="breadcrumb-item active">Send Project</li>
        </ol>

        <!-- Icon Cards-->
       <div class="container-fluid">
         <div class="col-md-12 jumbotron">
           <div class="row">
             <div class="col-md-12">
              <div class="col-md-12">
                   <div class="row">
                     <h3 class="text-center text-primary" style="margin-left: 350px;">Send Proposal</h3>
                   </div>
                 </div>

                 <?php
                   if (isset($_GET['id'])) {

                     $id = $_GET['id'];
                   }
                    if (isset($_POST['add'])){

                    $fpro = $_POST['fpro'];
                     $spro = $_POST['spro'];
                    $tpro = $_POST['tpro'];
                    
                    $error = array();
                    $request = array();
                    
                    $sel = "SELECT * FROM propose_project WHERE first_proposal LIKE '%$fpro%' OR second_proposal LIKE '%$fpro%' OR third_proposal LIKE '%$fpro%'";
                    $qel = mysqli_query($conn,$sel);
                  
                    if(mysqli_num_rows($qel) > 0){
                      $error['msg'] = "Your First Porposal is an already written Project";
                      $sql = "UPDATE propose_project SET first_proposal='0',second_proposal='$spro',third_proposal='$tpro' WHERE id='$id'";
                      $req = mysqli_query($conn,$sql);

                      if ($req) {
                        $request['say'] = "Proposals Sent";
                      }
                      else{
                        $request['say'] = "Proposals Not Sent";
                      }

                    }
                    else{
                
                $sell = "SELECT * FROM propose_project WHERE first_proposal LIKE '%$spro%' OR second_proposal LIKE '%$spro%' OR third_proposal LIKE '%$spro%'";
                $qell = mysqli_query($conn,$sell);
              
                if(mysqli_num_rows($qell) > 0){
                  $error['msg'] = "Your Second Porposal is an already written Project";
                  $sqll = "UPDATE propose_project SET first_proposal='$fpro',second_proposal='0',third_proposal='$tpro' WHERE id='$id'";
                  $reql = mysqli_query($conn,$sqll);

                  if ($reql) {
                    $request['say'] = "Proposals Sent";
                  }
                  else{
                    $request['say'] = "Proposals Not Sent";
                  }

                }
                else{
            
            $sele = "SELECT * FROM propose_project WHERE first_proposal LIKE '%$tpro%' OR second_proposal LIKE '%$tpro%' OR third_proposal LIKE '%$tpro%'";
            $qele = mysqli_query($conn,$sele);
          
            if(mysqli_num_rows($qele) > 0){
              $error['msg'] = "Your Third Porposal is an already written Project";
              $sqle = "UPDATE propose_project SET first_proposal='$fpro',second_proposal='$tpro',third_proposal='0' WHERE id='$id'";
              $reqle = mysqli_query($conn,$sqle);

              if ($reqle) {
                $request['say'] = "Proposals Sent";
              }
              else{
                $request['say'] = "Proposals Not Sent";
              }

            }
            else{
              $sqle = "UPDATE propose_project SET first_proposal='$fpro',second_proposal='$spro',third_proposal='$tpro' WHERE id='$id'";
              $sv = mysqli_query($conn,$sqle);

              if ($sv) {
                $request['say'] = "Proposals Sent";
              }
              else{
                $request['say'] = "Proposals Not Sent";
              }

            } 
         
          }
        }
      }

                 if(isset($error['msg'])){
                   $h = $error['msg'];

                   $show = "<h6 class='alert alert-danger'>$h</h6>";
                 }
                 else{
                   $show = '';
                 }
                 if(isset($request['say'])){
                   $say = $request['say'];
                   $give = "<h6 class='alert alert-success'>$say</h6>";
                 }
                 else{
                   $give = '';
                 }
                 
                 ?>
               <form class="form-group" style="font-size: 20px;" method="POST">
                 <div class="col-md-12">
                   <div class="row">
                     <?php echo $give; ?>
                   </div>
                 </div>
                 <div class="col-md-12">
                   <div class="row">
                     <?php echo $show; ?>
                   </div>
                 </div>
                 <div class="col-md-12">
                   <div class="row">
                     <label>First Proporser</label>
                     <input type="text" name="fpro" class="form-control" placeholder="Enter First Project Proposer" autocomplete="off" required>
                   </div>
                 </div>
                 <div class="col-md-12">
                   <div class="row">
                     <label>Second Proporser</label>
                     <input type="text" name="spro" class="form-control" placeholder="Enter Second Project Proposer" autocomplete="off" required>
                   </div>
                 </div>
                 <div class="col-md-12">
                   <div class="row">
                     <label>Third Proporser</label>
                     <input type="text" name="tpro" class="form-control" placeholder="Enter Third Project Proposer" autocomplete="off" required>
                   </div>
                 </div>
                 <div class="col-md-12">
                   <div class="row">
                     <input type="submit" value="SEND" name="add" class="btn btn-info my-4">
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
     