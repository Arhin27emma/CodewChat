<?php
    session_start();
    if (isset($_SESSION['unique_id'])) {
        header("location: users.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="./font-awesome/css/all.css"> 
    <link rel="stylesheet" href="loginV.css">
</head>
<body>
    <div class="container shadow-lg p-3 mb-5 bg-body rounded">
        <div class="push-top">

            <form action="" method="post" class="form-group" enctype="multipart/form-data">


                <div class="card-hearder mt-3">
                    <h3 class="text-center">Welcome To CodewChat</h3>
                    <h4 class="text-center">Login Here</h4>
                    <img src="img/login.png" alt="">
                </div>

                <div class="alert alert-danger mt-3" role="alert">
                    <h6>This is an error message</h6>
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
                    <input type="checkbox" name="check" id="check" class="mr-2">
                    <label class="mr-5">Remember me</label>
                    
                </div>

                <div class="push mb-3">
                   <input type="submit" value="Submit" class="btn btn-primary form-control">
                </div>
                <p>Don't have an account? <a href="form.php">Sign Up</a></p>
            </form>
        </div>
    </div>
        <script src="login.js"></script>
</body>
</html>