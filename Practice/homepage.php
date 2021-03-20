<?php
include_once('connection.php');

?>

<!DOCTYPE html>
<html>

<head>
    <link rel='stylesheet' type='text/css' href='../Practice/assets/css/homepage.css'>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.1/bootstrap-table.js"></script>
    <link href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.1/bootstrap-table.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <div class="row clearfix">
            <div class="col-md-12 column">
                <table class="table table-bordered table-hover" id="tab_logic">
                    <thead>
                        <tr>
                            <th>
                                FirstName
                            </th>
                            <th>
                                LastName
                            </th>
                            <th>
                                Birthday
                            </th>
                            <th>
                                Email
                            </th>
                            <th>
                                Mobile
                            </th>
                            <th>
                                Options
                            </th>
                            <th>
                                Delete
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $table = mysqli_query($conn, 'SELECT * FROM `registration` where active=1');
                        while ($row = mysqli_fetch_array($table)) {
                        ?>
                            <tr id='<?php echo $row['id']; ?>'>
                                <td data-target="firstname"><?php echo $row['firstname']; ?> </td>
                                <td data-target="lastname"><?php echo $row['lastname']; ?> </td>
                                <td data-target="birthday"><?php echo $row['birthday']; ?> </td>
                                <td data-target="email"><?php echo $row['email']; ?> </td>
                                <td data-target="mobile"><?php echo $row['mobile']; ?> </td>
                                <td><a href="#" class="btn btn-outline-success editbtn" data-role="update" data-id="<?php echo $row['id']; ?>">Update</a></td>
                                <td><a href='delete.php?fn=<?php echo $row['firstname'] ?>'>
                                        <button name="delete" type="button" class="btn btn-outline-danger" data-id="<?php echo $row['id']; ?>">Delete</button>
                                    </a>
                                </td>
                            </tr>
                    </tbody>
                <?php
                        }
                ?>
                </table>
            </div>

        </div>
    </div>
    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog" data-backdrop="false">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title col order-first">Update User Details</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>FirstName</label>
                        <input type="text" name="firstname" id="firstname" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>LastName</label>
                        <input type="text" name="lastname" id="lastname" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Birthday</label>
                        <input type="text" id="birthday" name="birthday" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="email">Email </label>
                        <input type="email" id="email" name="email" class="form-control" value="" />
                    </div>
                    <div class="form-group">
                        <label for="mobileNumber">Mobile </label>
                        <input class="form-control" type="tel" id="mobile" name="mobile" data-type="mask-number" data-masked="true" value="" />
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="hidden" id="userId" />
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="col float-right"> <a href="" id="save" class="btn btn-outline-success float-right">Update</a></div>

                    <div class="col float-left"><a href="" type="button" id="closebtn" class="btn btn-outline-info float-left" data-dismiss="modal">Close</a></div>
                </div>
            </div>

        </div>
    </div>
</body>

<script>
    // append values in input feilds
    $(document).ready(function() {
        $(".btn").click(function() {
            $("#myModal").appendTo("body").modal("show");
        });

        $(document).on('click', 'a[data-role=update]', function() {
            var id = $(this).data('id');
            var firstname = $('#' + id).children('td[data-target=firstname]').text();
            var lastname = $('#' + id).children('td[data-target=lastname]').text();
            var birthday = $('#' + id).children('td[data-target=birthday]').text();
            var email = $('#' + id).children('td[data-target=email]').text();
            var mobile = $('#' + id).children('td[data-target=mobile]').text();


            $('#firstname').val(firstname);
            $('#lastname').val(lastname);
            $('#birthday').val(birthday);
            $('#email').val(email);
            $('#mobile').val(mobile);
            $('#userId').val(id);
            $('#myModal').modal('toggle');
        });

        $('#save').click(function() {
            var id = $('#userId').val();
            var firstname = $('#firstname').val();
            var lastname = $('#lastname').val();
            var birthday = $('#birthday').val();
            var email = $('#email').val();
            var mobile = $('#mobile').val();

            $.ajax({
                url: 'update.php',
                method: 'post',
                data: {
                    id: id,
                    firstname: firstname,
                    lastname: lastname,
                    birthday: birthday,
                    email: email,
                    mobile: mobile
                },
                success: function(response) {
                    // to update the user record in table
                    $('#' + id).children('td[data-target=username]').text();
                    $('#' + id).children('td[data-target=birthday]').text();
                    $('#' + id).children('td[data-target=email]').text();
                    $('#' + id).children('td[data-target=mobile]').text();
                    $('#myModal').modal('toggle');

                }
            })
        })


    });
</script>

</html>