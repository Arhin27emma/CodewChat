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

        <section class="chat-area">

        <?php
            include_once "config.php";
            $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = '{$user_id}'");
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

            <div class="chat-box">

                
            </div>

            <form action="" method="post" class="typing-area" autocomplete="off">
                <input type="text" name="outgoing_id" value="<?php echo $_SESSION['unique_id'] ?>" hidden>
                <input type="text" name="incoming_id" value="<?php echo $user_id ?>" hidden>
                <input type="text" name="messages" class="input-field" placeholder="Type a message here">
                <button><i class="fab fa-telegram-plane"></i></button>
            </form>
        
        </section>
    </div>
    <script src="chat.js"></script>
</body>
</html>