<!DOCTYPE html>
<html>

<head>
    <title>Registration Form</title>
    <link rel='stylesheet' type='text/css' href='../Practice/assets/css/regstyle.css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    </div>
    <div class="login-page">
        <div class="form">
            <form class="register-form" action="insert.php" method="POST" onSubmit="return formValidation();">
                <h1>Register Here</h1>
                <div class="firstname" style="display:flex;">
                    <label for="firstname">FirstName </label>
                    <input type="text" id="firstname" name="firstname" class="form-textbox" />
                </div>
                <div class="lastname" style="display:flex;">
                    <label for="lastname">LastName </label>
                    <input type="text" id="lastname" name="lastname" class="form-textbox" />
                </div>
                <div class="password" style="display:flex;">
                    <label for="password">Password </label>
                    <input type="password" id="password" name="password" class="form-textbox" />
                </div>
                <div class="birthday" style="display:flex;">
                    <label for="birthday">Birthday </label>
                    <input type="date" id="birthday" name="birthday" />
                </div>

                <div class="email" style="display:flex;">
                    <label for="email">Email </label>
                    <input type="email" id="email" name="email" class="form-textbox validate[Email]" value="" />
                </div>
                <div class="mobileNumber" style="display:flex;">
                    <label for="mobileNumber">Mobile </label>
                    <input type="tel" id="mobileNumber" name="mobileNumber" data-type="mask-number" data-masked="true" />
                </div>
                <div class="button" style="display:flex; padding: 20px; justify-content: center;">
                    <div>
                        <button type="submit" name="submit" class="btn btn-success"><span class="cil-contrast btn-icon mr-2"></span>
                            Create</button>
                    </div>
                </div>
                <p class="message">Already Registered? <a href="loginpage.php"> Login</a></p>
            </form>
        </div>
    </div>
</body>
<script type="text/javascript">
    function formValidation() {

        var firstname = document.getElementById("firstname").value;
        var lastname = document.getElementById("lastname").value;
        var password = document.getElementById("password").value;
        var email = document.getElementById("email").value;
        var contact = document.getElementById("mobileNumber").value;
        var emailReg = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        // Conditions

        if (firstname != '' && lastname != '' && password != '' && email != '' && contact != '') {
            if (password ==
                document.getElementById('confirm_password').value) {
                document.getElementById('message').style.color = 'green';
                document.getElementById('message').innerHTML = 'matching';
            } else {
                document.getElementById('message').style.color = 'red';
                document.getElementById('message').innerHTML = 'not matching';
            }
            if (email.match(emailReg)) {
                if (contact.length == 10) {
                    alert("All type of validation has done.");
                } else {
                    alert("The Contact No. must be at least 10 digit long!");
                    return false;
                }
            } else {
                alert("Invalid Email Address...!!!");
                return false;
            }
        } else {
            alert("Please fill out the mandatory details i.e Username, Password, Email & Contact")
        }
    }

    function CheckPassword(inputtxt) {
        var paswd = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{7,15}$/;
        if (inputtxt.value.match(paswd)) {
            alert('Correct, try another...')
            return true;
        } else {
            alert('Wrong...!')
            return false;
        }
    }
</script>

</html>