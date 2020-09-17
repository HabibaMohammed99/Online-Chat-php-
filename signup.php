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
	<link rel="stylesheet" type="text/css" href="css/signup.css">
    <title>Creat New Account</title>
</head>
<body>
    <div class="signup-form">
        <form  method="post">
            <div class="form-header">
                <h2>Sign Up</h2>
                <p>fill out this form and start chating with your frindas.</p>
            </div>
            <div class="form-group">
                <label>username</label>
                <input type="text" class="form-control" name="user_name" placeholder="Example :habibamuhammad" autocomplete="off" required>
            </div>
            <div class="form-group">
                 <label>Password</label>
                 <input type="password" class="form-control" name="user_pass" placeholder="password" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label>Email Addresss</label>
                <input type="email" class="form-control" name="user_email" placeholder="someone@site.com" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label>Country</label>
                <select name="user_country" class="form-control" required>
                    <option disabled="">select a country</option>
                    <option>Egypt</option>
                    <option>Iraq</option>
                    <option>UK</option>
                    <option>United state of America</option>
                    <option>France</option>
                </select>
            </div>
            <div class="form-group">
                <label>Gender</label>
                <select name="user_gender" class="form-control" required>
                    <option disabled="">select your Gender</option>
                    <option>Male</option>
                    <option>Female</option>
                </select>
            </div>
            <div class="form-group">
                <label class="checkbox-inline" ><input type="checkbox" required >I accept the 
                <a href="">Terms of use</a>&amp; <a href="">Privacy Policy</a></label>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block btn-lg" name="sign_up" >Sign Up</button>
            </div>
           <?php require_once 'signup_user.php' ?> 
        </form>
        <div class="text-center small" style="color:#67428B;">Already have an account?<a href="signin.php">Signin here</a></div>
    </div>
</body>
</html>