<?php
$connection = mysqli_connect("localhost", "root", "", "dbcrud");

if (!$connection) {
  die("Database connection failed: " . mysqli_connect_error());
}
