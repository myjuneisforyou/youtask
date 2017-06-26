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
        <script type="text/javascript">
        document.title = "YouTask - SignUp";
        </script>
</head>
<body style="background: #f3f4f4;">
	<div class="container-fluid">
		<div class="row signup_header">
			<div class="col-lg-6 col-lg-offset-2 col-md-8 col-sm-8 col-xs-8">
				<img src="../tmp/img/YT.png" width="119px" height="50px">
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
				<p>ALREADY HAVE AN ACCOUNT? <a href="/">SIGN IN</a></p>
			</div>
		</div>
	</div>
	<div class="container-fluid">
            <form method="POST" action="#" class="signup_container ">
		 	<h3>Sign Up</h3>
                        <?php if($result):?>
                        <h3 style="color: #16b716;">Success!</h3>
                        <?php else:?>
		 	<p style="color: #888;"> Sign up to continue to YouTask.</p>
		    <div class="form-group">
                        <label>Login</label><span style="color: red;"> <b><?=@$error_login; ?></b></span>
                            <input type="text" name="login" class="form-control" placeholder="Login">
		    </div>
		    <div class="form-group">
			    <label>Email</label><span style="color: red;"> <b><?=@$error_email; ?></b></span>
                            <input type="email" name="email" class="form-control" placeholder="Email">
			</div>
			<div class="form-group">
			    <label>Password</label><span style="color: red;"> <b><?=@$error_password; ?></b></span>
                            <input type="password" name="password" class="form-control" placeholder="Password">
			</div>
			<div class="form-group">
			    <label>Confirm your password</label><span style="color: red;"> <b><?=@$error_password2; ?></b></span>
                            <input type="password" name="password2" class="form-control" placeholder="Password">
			</div>
                        <button type="submit" name="submit" class="btn btn-primary btn-signup">Sign Up</button>
                        <?php endif; ?>
		</form>
	</div>
</body>
</html>