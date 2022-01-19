<?php
include("../db.php");
session_start();
if (empty($_SESSION['id'])) {
  header("Location:../index.php");
}
?>
 <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <div class="input-group">
        <!-- <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2"> -->
        <div class="input-group-append">
          <button class="btn " type="button">
            <i class="fas fa-seach"></i>
          </button>
        </div>
      </div>
    </form>

    <ul class="navbar-nav ml-auto ml-md-0">
    
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-e "></i>
          <?php
          $username = $_SESSION['id'];
          $sql = "SELECT * FROM user WHERE username='$username'";
          $query = mysqli_query($conn,$sql);
          $row = mysqli_fetch_assoc($query);
          ?>
          <img src="../image/<?php echo $row['image']; ?>" style="border-radius: 50%; height: 50px; width: 50px;">
          <?php echo $row['username']; ?>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="#">Settings</a>
          <a class="dropdown-item" href="#">Activity Log</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
        </div>
      </li>
    </ul>

  </nav>