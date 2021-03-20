<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$password = $_POST['password'];
$birthday = $_POST['birthday'];
$email = $_POST['email'];
$mobileNumber = $_POST['mobileNumber'];



if (!empty($firstname) && !empty($lastname) && !empty($password) && !empty($email) && !empty($mobileNumber)) {
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "practice";

    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
        die('Connect Error(' . mysqli_connect_errno() . ')' . mysqli_connect_error());
    } else {
        $SELECT = "Select email from registration where email =? LIMIT 1";
        $INSERT = "INSERT INTO `registration`(`firstname`,`lastname`,`password`,`birthday`,`email`,`mobile`) VALUES(?,?,?,?,?,?);";

        //prepare prepared statement
        $stmt = $conn->prepare($SELECT);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->bind_result($email);
        $stmt->store_result();
        $rnum = $stmt->num_rows;

        if ($rnum == 0) {
            $stmt->close();

            $stmt = $conn->prepare($INSERT);
            var_dump($stmt);
            $stmt->bind_param("sssssi", $firstname,$lastname, $password, $birthday, $email, $mobileNumber);
            $stmt->execute();
            header("Location: registration.php?registration=success");
        } else {
            echo "This Email is already registered";
        }
        $stmt->close();
        $conn->close();
    }
} else {
    header("Location: registration.php?registration=failure");
}
