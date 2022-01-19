<?php

include("../db.php");

if (isset($_GET['id'])) {
  $id = $_GET['id'];

  $sql = "DELETE FROM student WHERE id='$id'";

  mysqli_query($conn,$sql);

  $sql2 = "DELETE FROM user WHERE id='$id'";
  mysqli_query($conn,$sql2);

  header("Location:view_students.php");
  exit();
}