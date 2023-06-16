<?php 

    session_start();
    if (!isset($_SESSION['unique_id'])) {
        header("location: login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./font-awesome/css/all.css">
    <link rel="stylesheet" href="users.css">
    <title>Chat App</title>

</head>
<body>
    <div class="wrapper">

        <section class="users">

            <?php
                include_once "config.php";
                $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
                if (mysqli_num_rows($sql)>0) {
                    $row = mysqli_fetch_assoc($sql);
                }
            ?>

            <div class="content">

                <img src="./img/<?php echo $row['img'] ?>">

                <div class="details">

                    <span><?php echo $row['fname'].' '. $row['lname'] ?></span>
                    <p><?php echo $row['status'] ?></p>

                </div>
                
            </div>

            <a class="a" href="logout.php?logout_id=<?php echo $row['unique_id'] ?>">Logout</a>

            <div class="search">

                <span class="txt">Select a friend to chat with</span>
                <input type="search" name="searchTerm" placeholder="Enter name to chat">
                <button><i class="fas fa-search"></i></button>

            </div>

            <div class="users-list">
                
            </div>
            
        </section>
    </div>
    <script src="user.js"></script>
</body>
</html>