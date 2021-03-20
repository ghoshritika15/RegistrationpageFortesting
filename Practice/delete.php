<?php
include_once('connection.php');
$firstname = $_GET['fn'];

// sql to delete a record
$query = "UPDATE registration SET `active`=0 WHERE firstname='$firstname'";

if ($conn->query($query) === TRUE) {
  $data = mysqli_query($conn, $query);
  echo "Record deleted successfully";
  if (isset($_SERVER["HTTP_REFERER"])) {
    header("Location: " . $_SERVER["HTTP_REFERER"]);
  }
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();
