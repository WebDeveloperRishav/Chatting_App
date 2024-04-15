<?php
include 'config.php';
session_start();
$fname = mysqli_real_escape_string($conn, $_REQUEST['fname']);
$lname = mysqli_real_escape_string($conn, $_REQUEST['lname']);
$email = mysqli_real_escape_string($conn, $_REQUEST['email']);
$password = mysqli_real_escape_string($conn, $_REQUEST['password']);

if (!empty($fname) && !empty($lname) && !empty($email) && !empty($password)) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $sql = mysqli_query($conn, "SELECT email from users WHERE email = '{$email}'");
        if (mysqli_num_rows($sql) > 0) {
            echo "$email - this email already exist";
        } else {
            if (isset($_FILES['image'])) {
                $img_name = $_FILES['image']['name'];
                $type = $_FILES['image']['type'];
                $tmp_name = $_FILES['image']['tmp_name'];

                $img_explode = explode('.', $img_name);
                $img_ext = end($img_explode);
                $extension = ['jpg', 'png', 'jpeg'];
                if (in_array($img_ext, $extension) == true) {
                    $time = time();
                    $new_img_name = $time . $img_name;
                    if (move_uploaded_file($tmp_name, 'images/' . $new_img_name)) {
                        $status = "Active Now";
                        $random_id = rand(time(), 100000);

                        $sql2 = mysqli_query($conn, "INSERT INTO users(unique_id, fname, lname, email, password, img, status) 
                        VALUES({$random_id}, '{$fname}', '{$lname}','{$email}','{$password}','{$new_img_name}','{$status}')");
                        if ($sql2) {
                            $sql3 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                            if (mysqli_num_rows($sql3) > 0) {
                                $row = mysqli_fetch_assoc($sql3);
                                $_SESSION['unique_id'] = $row['unique_id'];
                                echo "success";
                            }
                        } else {
                            echo "Something went Wrong!";
                        }
                    };
                } else {
                    echo "Please select an image file - jpeg, jpg, png!";
                }
            } else {
                echo "Please Select an Image Filed";
            }
        }
    } else {
        echo "$email - this is not Valid email";
    }
} else {
    echo "All Field are Required";
}
