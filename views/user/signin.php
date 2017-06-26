<!DOCTYPE html>
<html>
<head>
	<title>YouTask</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../tmp/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../tmp/css/bootstrap-theme.css">
	<link rel="stylesheet" type="text/css" href="../tmp/css/style.css">
	<link rel="icon" href="../tmp/img/icon.png">
        <script src="../tmp/js/jquery-3.2.1.min.js"></script>
	<script src="../tmp/js/bootstrap.js"></script>	
</head>
<body style="background: #f3f4f4;">
<div class="page-wrap">
	<div class="container-fluid signup_header">
		<div class="row">
			<div class="col-lg-6 col-lg-offset-2 col-md-8 col-sm-8 col-xs-6">
				<img src="../tmp/img/YT.png" width="119px" height="50px">
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
				<p>DON'T HAVE AN ACCOUNT? <a href="/signup">SIGN UP</a></p>
			</div>
		</div>
	</div>
	<div class="container-fluid">
            <form method="POST" class="signup_container">
		 	<h3>Sign In</h3>
		 	<p style="color: #888;">Sign in to continue to YouTask.</p>
                        <span style="color: red;"> <b><?=@$error_error; ?></b></span>
		    <div class="form-group">
			    <label>Login</label><span style="color: red;"> <b><?=@$error_login; ?></b></span>
                            <input type="text" name="login" class="form-control" placeholder="Login">
		    </div>
			<div class="form-group">
			    <label>Password</label><span style="color: red;"> <b><?=@$error_password; ?></b></span>
                            <input type="password" name="password" class="form-control" placeholder="Password">
			</div>
                        <button type="submit" name="submit" class="btn btn-primary btn-signin">Sign In</button>
		</form>
	</div>
</div>
    	<div class="container-fluid signin-footer">
		<div class="row">
			<p>&#9400 Copyright 2017 YT Software, Inc. All rights are reserved</p>
		</div>
	</div>
</body>
</html>


