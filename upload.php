<?php
session_start(); 
require_once 'include/connection.php';
require_once 'include/header.php';
if(!isset($_SESSION['user_email'])){
    header('location:signin.php');
}else{
?>

<html lang="en">
<head>
<meta charset="utf-8">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/upload.css" >

    <title>change Profile Picture</title>
</head>
<body>
    <?php

    $user = $_SESSION['user_email'];
    $select= "SELECT * FROM users WHERE user_email='$user'";
    $run_user =mysqli_query($con,$select);
    $row=mysqli_fetch_array($run_user);

    $user_name= $row['user_name'];
    $user_profile=$row['user_profile'];

    echo "
        <div class='container' align='center'>
        <div class='card w-50 '>
        <img class='p-5' src='$user_profile'>
        <h1 class='pb-3'>$user_name</h1>
        <form method='POST' enctype='multipart/form-data'>
        <lable>
        <input type='file' class='btn btn-secondary mb-2  ' name='u_image' size='60' >
        </lable>
        <button id='button_profile' class='btn btn-default' name='update'>&nbsp&nbsp&nbsp<i class='fa fa-heart' aria-hidden='true'></i>Update Profile</button>
        </form>
        </div>
        </div><br><br>
    ";

    if(isset($_POST['update'])){
        $u_image=$_FILES['u_image']['name'];
        $image_tmp=$_FILES['u_image']['tmp_name'];
        $random_number=rand(1,100);
        
        if($u_image == ''){
            echo "<script>alert('please select profile')</script>";
            echo "<script>window.open('upload.php','_self')</script>";
            exit();
        }else{
            move_uploaded_file($image_tmp,"images/$u_image.$random_number");
            $update ="UPDATE users SET user_profile='images/$u_image.$random_number' WHERE user_email='$user'";
            $run= mysqli_query($con,$update);
            if($run){
                echo "<script>alert('your profile updated!')</script>";
                echo"<script>window.open('upload.php')</script>";
            }
        }
    }
    ?>
</body>
</html>
<?php }?>