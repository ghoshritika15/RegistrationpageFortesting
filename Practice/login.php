<?php
session_start();
include_once('connection.php');

if (isset($_POST['email']) && isset($_POST['password'])) {
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $em = validate($_POST['email']);
    $pwd = validate($_POST['password']);

    if (empty($em)) {
        header("Location:loginpage.php?error= Email is required");
        exit();
    } else if (empty($pwd)) {
        header("Location:loginpage.php?error= Password is required");
        exit();
    } else {
        $query = "SELECT * FROM `registration` where email='$em' and password='$pwd' and active=1 ";
        $data = mysqli_query($conn, $query);

        if (mysqli_num_rows($data) == 1) {
            $row = mysqli_fetch_assoc($data);
            if ($row['email'] === $em && $row['password'] === $pwd) {
                $SESSION['email']= $row['email'];
                header("Location:homepage.php");
                exit();
            }
        } else {
            header("Location:loginpage.php?error= Incorrect EmailID or Password");
            exit();
        }
    }
} else {
    header("Location:loginpage.php");
    exit();
}
