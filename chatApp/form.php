<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<?php
    session_start();
    if (isset($_SESSION['unique_id'])) {
        header("location: users.pnp");
    }
?>

<body>
    <div class="container shadow-lg p-3 mb-5 bg-body rounded">

        <div class="push-top signup">

            <form action="" method="post" class="form-group" enctype="multipart/form-data">

                <div class="card-hearder">
                    <h3 class="text-center mt-2">SIGNUP HERE</h3>
                </div>

                <div class="alert alert-danger mt-3" role="alert">
                    <h6>This is an error message</h6>
                </div>

                <div class="mb-3">
                    <label for="">First Name</label>
                    <input type="text" name="fname" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="">Last Name</label>
                    <input type="text" name="lname" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="">Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="">Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="">Select Image</label>
                    <input type="file" class="form-control" name="image" required>
                </div>

                <div class="push mb-3">
                   <input type="submit" value="Submit" class="btn btn-primary">
                </div>
                <p>Already have an account? <a href="login.php">Login Here!</a></p>
            </form>
        </div>
    </div>
        <script src="signup.js"></script>
</body>
</html>