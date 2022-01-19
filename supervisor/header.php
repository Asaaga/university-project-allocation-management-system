<?php
include("../db.php");
session_start();
if (empty($_SESSION['id'])) {
  header("Location:../index.php");
}

?>
 <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <div class="input-group">
                <div class="input-group-append">
          <button class="btn " type="button">
            <i class="fa"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
      
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas"></i>
          <?php
            $username = $_SESSION['id'];
            $sql = "SELECT * FROM user WHERE username='$username'";
            $query = mysqli_query($conn,$sql);

            $fec = mysqli_fetch_assoc($query);
          ?>
           <img src="../image/<?php echo $fec['image']; ?>" style="border-radius: 50%; height: 50px; width: 50px;">
          <?php echo $fec['username']; ?>
        </a>
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