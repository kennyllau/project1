<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Registration</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
  	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
	<div class="row">
	<div class="col-xs-2 col-xs-offset-5 text-center">
			<form role="form" action="/registers/add" method="post" >
				<h3>Register</h3>
				<div class="form-group">
					<label for="first_name">First name: </label>
					<input type="text" class="form-control" name="first_name">
				</div>
				<div class="form-group">
					<label for="last_name">Last name: </label>
					<input type="text" class="form-control" name="last_name">
				</div>			
				<div class="form-group">
					<label for="email">Email: </label>
					<input type="email" class="form-control" name="email">
				</div>		
				<div class="form-group">
					<label for="password">Password: </label>
					<input type="password" class="form-control" name="password">
				</div>
				<div class="form-group">
					<label for="conpassword">Confirm password: </label>
					<input type="password" class="form-control" name="conpassword">
				</div>
				<button type="submit" class="btn btn-primary">Register</button>	
			</form>

	</div>
	</div>
	<div class="row">
		<div class="col-xs-2 col-xs-offset-5 text-center">
		<hr>
		<a href="/main">Back to Login</a>
		</div>
		</div>
	</div>
	<div class="row">
		
		<?=$this->session->flashdata('first_name'); ?>
		<?=$this->session->flashdata('last_name'); ?>
		<?=$this->session->flashdata('email'); ?>
		<?=$this->session->flashdata('password'); ?>
		<?=$this->session->flashdata('badpassword'); ?>
	
	</div>
</div>
</body>
</html>