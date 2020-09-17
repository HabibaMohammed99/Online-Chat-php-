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

    <title>change Password</title>
</head>
<style>
    body{
        overflow-x: hidden;
    }
</style>
<body>
  <div class="row">
      <div class="col-sm-2"></div>
      <?php
        $user =$_SESSION['user_email'];
        $get_user ="SELECT * FROM users WHERE user_email='$user'";
        $run =mysqli_query($con,$get_user);
        $row =mysqli_fetch_array($run);
        $user_pass=$row['user_pass'];

      ?>
      <div class="col-sm-8">
        <form action="" method="post" enctype="multipart/form-data">
            <table class="table table-bordered table-hover">
                <tr align="center">
                    <td colspan="6" class="active">Change password</td>
                </tr>
                <tr>
                    <td style="font-weight: bold;" >Current Password</td>
                    <td>
                        <input type="password" id="mypass" name="current_pass" class="form-control" required placeholder="current password">
                    </td>
                </tr>
                <tr>
                    <td style="font-weight: bold;" >New Password</td>
                    <td>
                        <input type="password" id="mypass" name="u_pass1" class="form-control" required placeholder="New password">
                    </td>
                </tr>
                <tr>
                    <td style="font-weight: bold;" >confirm Password</td>
                    <td>
                        <input type="password" id="mypass" name="u_pass2" class="form-control" required placeholder="confirm password">
                    </td>
                </tr>
                <tr align="center">
                    <td colspan="6">
                        <input type="submit" name="change" value="Change" class="btn btn-info">
                    </td>                   
                </tr>
            </table>
        </form>
        <?php
        if(isset($_POST['change'])){
            $c_pass =$_POST['current_pass'];
            $pass1 =$_POST['u_pass1'];
            $pass2 =$_POST['u_pass2'];

            $user =$_SESSION['user_email'];
            $get_user ="SELECT * FROM users WHERE user_email='$user'";
            $run = mysqli_query($con,$get_user);
            $row=mysqli_fetch_array($run);

            $user_pass=$row['user_pass'];
            if($c_pass !== $user_pass){
                echo "
                <div class='alert alert-danger text-center'>
                    <strong>Your Old Password didn't match</strong>
                </div>
                ";
            }
            if($pass1 != $pass2){
                echo "
                <div class='alert alert-danger text-center'>
                    <strong>Your New Password didn't match with confirm password</strong>
                </div>
                "; 
            }
            if($pass1 <9 AND $pass2 <9){
                echo "
                <div class='alert alert-danger text-center'>
                    <strong>Use 9 Or more than 9 characters</strong>
                </div>
                ";  
            }
            if($pass1 == $pass2 AND $c_pass == $user_pass){
                $update = "UPDATE users SET user_pass='$pass1' WHERE user_email='$user'";
                $run = mysqli_query($con , $update);

                echo "
                <div class='alert alert-success text-center'>
                    <strong>Your Password Changed succefuly</strong>
                </div>
                "; 
            }
        }

        ?>
      </div>
      <div class="col-sm-2"></div>
  </div>
</body>
</html>
<?php }?>