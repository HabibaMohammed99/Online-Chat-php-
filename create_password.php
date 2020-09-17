<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css?family=Roboto|Courgette|Pacifico:400,700" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/signin.css">
    <title>login to your account</title>
</head>
<body>
    <div class="signin-form">
        <form action="" method="post">
            <div class="form-header">
                <h2>Creat New Password</h2>
                <p> Chat</p>
            </div>
            <div class="form-group">
                <label>Enter Password</label>
                <input type="password" class="form-control" name="pass1" placeholder="password.." autocomplete="off" required>
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" class="form-control" name="pass2" placeholder="confirm password.." autocomplete="off" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block btn-lg" name="change" >Change</button>
            </div>
        </form>
    </div>
    <?php
    session_start();
    require_once 'include/connection.php';

    if(isset($_POST['change'])){
        $user=$_SESSION['user_email'];
        $pass1=$_POST['pass1'];
        $pass2=$_POST['pass2'];
        
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
        if($pass1 == $pass2){
            $update="UPDATE users SET user_pass='$pass1' WHERE user_email='$user'";
            $run=mysqli_query($con,$update);
            session_destroy();

            echo "
                <script>alert('your password updated succefuly you can sign in now !')</script>
                ";
                echo "
                <script>window.open('signin.php','_self')</script>
                ";

        }
    }
    ?>
</body>
</html>