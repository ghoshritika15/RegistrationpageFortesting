<?php
include_once('connection.php');
if (isset($_POST['email'])) {
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $birthday = $_POST['birthday'];
  $email = $_POST['email'];
  $mobile = $_POST['mobile'];
  $id = $_POST['id'];
  echo ($id);

  $result = mysqli_query($conn, "UPDATE registration SET `firstname` = '$firstname',`lastname`='$lastname', `birthday` = '$birthday', `email` = '$email', `mobile` = '$mobile' WHERE `id`='$id'");
  if ($result) {
    echo 'data updated';
  }
}
?>