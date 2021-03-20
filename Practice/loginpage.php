<!DOCTYPE html>
<html>

<head>
    <title>Login Form</title>
    <link rel='stylesheet' type='text/css' href='../Practice/assets/css/loginStyle.css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="loginbox">
        <h1>Login Here</h1>
        <form action="login.php" method="POST">
            <p>Email</p>
            <input type="text" name="email" placeholder="Enter Email">
            <p>Password</p>
            <input type="password" name="password" placeholder="Enter Password">
            <a href="homepage.php"><input type="submit" name="submit" value="Login"></a>
            <!-- <a href="#">Lost your password?</a><br> -->
            <a href="registration.php">Don't Have an account?</a>
            <?php if (isset($_GET['error'])) { ?>
                <p class="error"><?php echo $_GET['error'] ?></p>
            <?php } ?>
        </form>
    </div>
</body>

</html>