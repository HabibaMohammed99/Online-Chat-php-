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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

    <title>Account Setting</title>
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

            $user = $_SESSION['user_email'];
            $get_user="SELECT * FROM users WHERE user_email='$user'";
            $run_user=mysqli_query($con,$get_user);
            $row=mysqli_fetch_array($run_user);
            
            $user_name=$row['user_name'];
            $user_pass =$row['user_pass'];
            $user_email=$row['user_email'];
            $user_profile=$row['user_profile'];
            $user_country=$row['user_country'];
            $user_gender=$row['user_gender'];
            $user_id =$row['user_id'];
            
            ?>
            <div class="col-sm-8">
                <form action="" method="post" enctype="multipart/form-data">
                    <table class="table table-bordered table-hover">

                        <tr align="center">
                        <td colspan="6" class="active"><h2>Change Account Setting </h2></td>
                        </tr>

                        <tr>
                        <td style="font-weight:bold;">Change Your Username</td>
                        <td>
                            <input type="text" name="u_name" class="form-control" required value="<?php echo $user_name;?>">
                        </td>
                        </tr>
                        <tr>
                        <td></td><td><a class="btn btn-default" style="text-decoration:none; font-size:15px;" href="upload.php"><i class="fa fa-user" aria-hidden="true"></i>Change Profile</a></td>
                        </tr>
                        <tr>
                        <td style="font-weight:bold;">Change Your Email</td>
                        <td>
                            <input type="email" name="u_email" class="form-control" required value="<?php echo $user_email;?>">
                        </td>
                        </tr>
                        <tr>
                            <td style="font-weight:bold;">Country</td>
                            <td>
                                <select name="u_country" class="form-control">
                                    <option><?php echo $user_country; ?></option>
                                    <option>Egypt</option>
                                    <option>USA</option>
                                    <option>UA</option>
                                    <option>UKD</option>
                                    <option>Saudi Arabia</option>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td style="font-weight:bold;">Gender</td>
                            <td>
                                <select name="u_gender" class="form-control">
                                    <option><?php echo $user_gender; ?></option>
                                    <option>male</option>
                                    <option>female</option>
                                    <option>others</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td style="font-weight:bold;" >Forgotten Password</td>
                            <td><button type="button" data-toggle="modal" class="btn btn-default" data-target="#myModal">Forgotten Password</button>
                            <div id="myModal" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button class="close" type="button" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="f" action="recovery.php?id=<?php echo $user_id; ?>" method="post">
                                            <strong>what is your best friend name?</strong>
                                            <textarea name="content" placeholder="someone" class="
                                            form-control" id="" cols="83" rows="4"></textarea><br>
                                            <input type="submit" name="sub" class="btn btn-default" style="width: 100px;"><br><br>
                                            <pre>Answer the above question we will ask you this question if you forgot your <br>password.</br> </pre><br><br>
                                            </form>
                                            <?php
                                            if(isset($_POST['sub'])){
                                                $bfn=htmlentities($_POST['content']);
                                                if($bfn ==''){
                                                    echo "<script>alert('Please enter something.')</script>";
                                                    echo "<script>window.open('account_setting.php','_self')</script>";
                                                    exit();
                                                }else{
                                                    $update ="UPDATE  users SET forgotten_answer='$bfn'";
                                                    $run = mysqli_query($con,$run);
                                                    if($run){
                                                        echo "<script>alert('working...')</script>";
                                                        echo "<script>window.open('account_setting.php','_self')</script>";
                                                    }else{
                                                        echo "<script>alert('Error while updating information.')</script>";
                                                        echo "<script>window.open('account_setting.php','_self')</script>";
                                                    }
                                                }
                                            }
                                            ?>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-default" type="button" data-dismiss="modal">
                                                Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        </tr>
                        <tr>
                            <td></td><td><a class="btn btn-default" style="text-decoration:none;font-size:15px;" href="change_password.php"><i class="fa fa-key fa-fw" aria-hidden="true"></i>Cahnge Password</a></td>
                        </tr>
                         <tr align="center">
                            <td colspan="6">
                            <input type="submit" value="Update" name="update" class="btn btn-info">
                            </td>
                         </tr>   
                    
                    </table>
                </form>
                <?php
                if(isset($_POST['update'])){
                    $u_name = htmlentities($_POST['u_name']);
                    $u_email =htmlentities($_POST['u_email']);
                    $u_country = htmlentities($_POST['u_country']);
                    $u_gender = htmlentities($_POST['u_gender']);

                    $update="UPDATE users SET `user_name`='$u_name', user_email='$u_email', user_country='$u_country' , user_gender='$u_gender' ";

                    $run =mysqli_query($con,$update);
                    if($run){
                        echo "<script>window.open('account_setting.php','_self')</script>";
                    }

                }
                ?>
            </div>
            <div class="col-sm-2"></div>
    </div>
</body>
</html>
<?php }?>