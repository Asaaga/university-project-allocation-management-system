<?php
$server = "localhost";
$user = "root";
$password = "";
$dbname = "allocate";

$conn = mysqli_connect($server,$user,$password,$dbname);

$result = mysqli_query($conn,$dbname);

if (!$conn) {
	die("not connected.");
}

