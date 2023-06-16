<?php
    session_start();
    include_once "config.php";

    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);


    if (!empty($fname) && !empty($lname) && !empty($email) && !empty($password)) {
        
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            
            $sql = mysqli_query($conn, "SELECT email FROM users WHERE email = '{$email}'");

            if (mysqli_num_rows($sql) > 0) {
                echo "$email already exits";
            }
            else {
                if (isset($_FILES['image'])) {

                    $image_name = $_FILES['image']['name'];
                    $tmp_name = $_FILES['image']['tmp_name'];
                    
                    $img_explode = explode('.', $image_name);
                    $img_ext = end($img_explode);

                    $extension = ['jpg', 'png', 'jpeg'];
                    if (in_array($img_ext, $extension) === true) {
                        
                        $time = time();
                        $new_img_name = $time.$image_name;

                        if (move_uploaded_file($tmp_name, 'img/'.$new_img_name)) {
                            
                            $status = "Active now";
                            $random_id = rand(time(),10000000);

                            $sql2 = mysqli_query($conn, "INSERT INTO users(unique_id, fname, lname, email, password, img, status)
                                                VALUES('{$random_id}', '{$fname}', '{$lname}', '{$email}', '{$password}', '{$new_img_name}', '{$status}')");

                            if ($sql2) {
                                $sql3 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                                $row = mysqli_fetch_assoc($sql3);

                                if (mysqli_num_rows($sql3) > 0) {
                                    $_SESSION['unique_id'] = $row['unique_id'];
                                    echo "success";
                                }
                            }  
                            else {
                                echo "Something went wrong";
                            }                  
                        }
                        
                    }
                    else {
                        echo "Select a jpg, png, jpeg image";
                    }
                }
                else {
                    echo "Select an Image";
                }                
            }


        }
        else {
            echo "$email is not a valid email address";
        }

    }
    else {
        echo 'All input fields required';
    }

?>