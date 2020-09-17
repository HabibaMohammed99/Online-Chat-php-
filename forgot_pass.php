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
                <h2>Forgotten Password</h2>
                <p>Chat</p>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email" placeholder="someone@site.com" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label>your best friend name</label>
                <input type="text" class="form-control" name="bf" placeholder="someone..." autocomplete="off" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block btn-lg" name="submit" >Submit</button>
            </div>
        </form>
        <div class="text-center small" style="color:#67428B;">back to signin?<a href="signin.php">Click here</a></div>
    </div>
    <?php
    session_start();
    require_once 'include/connection.php';
        if(isset($_POST['submit'])){
            $email =htmlentities(mysqli_real_escape_string($con,$_POST['email']));
            $recovery =htmlentities(mysqli_real_escape_string($con,$_POST['bf']));
            $select = "SELECT * FROM users WHERE user_email='$email' AND forgotten_answer='$recovery'";
            
            $run = mysqli_query($con ,$select);
            $check = mysqli_num_rows($run);

            if($check ==1){
                $_SESSION['user_email']=$email;
                echo "
                <script>window.open('create_password.php','_self')</script>
                ";
            }else{
                echo "
                <script>alert('Your Email or best friend name is incorrect!')</script>
                ";
                echo "
                <script>window.open('forgot_pass.php','_self')</script>
                ";
            }
        }
    ?>
</body>
</html>