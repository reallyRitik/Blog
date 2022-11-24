<?php
include '../config/config.php';
include '../config/function.php';
include '../config/login.php';

if(isset($_POST['loginsubmit']))
{
     $username = $_POST['username'];
     $password = $_POST['password'];
     $obj  = new Users();
	 $user = $obj->isUserExist($username, $password);
	 if($user['success'] == true)
	 {
	 	 $_SESSION['bloguser'] = $user['id']; 
	 	 redirect("dashboard");
	 } 
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Login </title>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body>

 

<style type="text/css">
	body {
    margin: 0;
    color: #edf3ff;
    font: 600 16px/18px 'Open Sans', sans-serif
}

:after,
:before {
    box-sizing: border-box;
}

.clearfix:after,
.clearfix:before {
    content: '';
    display: table;
}

.clearfix:after {
    clear: both;
    display: block;
}

a {
    color: inherit;
    text-decoration: none;
}

.login-wrap {
    width: 100%;
    margin: auto;
    max-width: 510px;
    min-height: 510px;
    position: relative;
    box-shadow: 0 12px 15px 0 rgba(0, 0, 0, .24), 0 17px 50px 0 rgba(0, 0, 0, .19);
}

.login-html {
    width: 100%;
    height: 100%;
    position: absolute;
    padding: 90px 70px 50px 70px;
    background: rgba(0, 0, 0, .5);
}

.login-html .for-pwd-htm,
.login-html .sign-in-htm {
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    position: absolute;
    -webkit-transform: rotateY(180deg);
    transform: rotateY(180deg);
    -webkit-backface-visibility: hidden;
    backface-visibility: hidden;
    -webkit-transition: all .4s linear;
    transition: all .4s linear;
}

.login-form .group .check,
.login-html .for-pwd,
.login-html .sign-in {
    display: none;
}

.login-form .group .button,
.login-form .group .label,
.login-html .tab {
    text-transform: uppercase;
}

.login-html .tab {
    font-size: 22px;
    margin-right: 15px;
    padding-bottom: 5px;
    margin: 0 15px 10px 0;
    display: inline-block;
    border-bottom: 2px solid transparent
}

.login-html .for-pwd:checked+.tab,
.login-html .sign-in:checked+.tab {
    color: #fff;
    border-color: #1161ee
}

.login-form {
    min-height: 345px;
    position: relative;
    -webkit-perspective: 1000px;
    perspective: 1000px;
    -webkit-transform-style: preserve-3d;
    transform-style: preserve-3d
}

.login-form .group {
    margin-bottom: 15px
}

.login-form .group .button,
.login-form .group .input,
.login-form .group .label {
    width: 100%;
    color: #fff;
    display: block
}

.login-form .group .button,
.login-form .group .input {
    border: none;
    padding: 15px 20px;
    border-radius: 25px;
    background: rgba(255, 255, 255, .1)
}

.login-form .group input[data-type=password] {
    text-security: circle;
    -webkit-text-security: circle
}

.login-form .group .label {
    color: #aaa;
    font-size: 12px
}

.login-form .group .button {
    background: #1161ee
}

.login-form .group label .icon {
    width: 15px;
    height: 15px;
    border-radius: 2px;
    position: relative;
    display: inline-block;
    background: rgba(255, 255, 255, .1)
}

.login-form .group label .icon:after,
.login-form .group label .icon:before {
    content: '';
    width: 10px;
    height: 2px;
    background: #fff;
    position: absolute;
    -webkit-transition: all .2s ease-in-out 0s;
    transition: all .2s ease-in-out 0s
}

.login-form .group label .icon:before {
    left: 3px;
    width: 5px;
    bottom: 6px;
    -webkit-transform: scale(0) rotate(0);
    transform: scale(0) rotate(0)
}

.login-form .group label .icon:after {
    top: 6px;
    right: 0;
    -webkit-transform: scale(0) rotate(0);
    transform: scale(0) rotate(0)
}

.login-form .group .check:checked+label {
    color: #fff
}
</style>
  <div class="login-wrap">
	<div class="login-html">
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
		 
		<div class="login-form">
			<div class="sign-in-htms ">
				<form method="post">
				<div class="group">
					<label for="user" class="label">Username or Email</label>
					<input id="user" name="username" type="text" class="input">
				</div>
				<div class="group">
					<label for="pass" class="label">Password</label>
					<input id="pass" type="password" name="password" class="input" data-type="password">
				</div>
				<div class="group">
					<input type="submit" name="loginsubmit" class="button" value="Sign In">
				</div>
			</form>
				<div class="hr"></div>
			</div>
			 
		</div>
	</div>
</div>

</body>
</html>