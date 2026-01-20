<?php
include('db.php');

if (isset($_GET['del'])) {
  $delete = intval($_GET['del']); 
  $sql = "DELETE FROM student WHERE id = $delete";

  if (mysqli_query($connection, $sql)) {
    header("Location: index.php");
    exit;
  } else {
    echo "Error deleting record: " . mysqli_error($connection);
  }
} else {
  header("Location: index.php");
  exit;
}
