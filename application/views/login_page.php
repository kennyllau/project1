<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
	
  	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<link rel="stylesheet"  type="text/css" href="/assets/welcome1.css">

	<style type="text/css">
	body{
		background-image: url('/assets/SkyBackground.png');

	}

	#box{
		background-color: white;
		padding: 20px;
		border-radius: 10px;
		margin: 20px;
		border: 1px solid black;
	
	}

</style>
</head>
<body>

<div class="container">
<div class="row">
	<div class="col-xs-12 text-center">		
		<div class="row" id="background">
				<svg viewBox="0 0 960 300">
				    <symbol id="s-text">
						<text text-anchor="middle" x="50%" y="80%" id="head1">project: sound</text>
					</symbol>
					<g class = "g-ants">
						<use xlink:href="#s-text" class="text-copy"></use>
						<use xlink:href="#s-text" class="text-copy"></use>
						<use xlink:href="#s-text" class="text-copy"></use>
						<use xlink:href="#s-text" class="text-copy"></use>
						<use xlink:href="#s-text" class="text-copy"></use>
					</g>
				</svg>
			</div>	
		</div>
</div>
	<div class="row">
		<div class="col-xs-4 col-xs-offset-4 text-center">
			<div id="box">
				<h3>Login</h3>
				<hr>
							
				<?=$this->session->flashdata('destroy'); ?>

				<form action="/logins/check" method="post">
					<div class="form-group">

						<label for="email">Email: </label>
						<input type="text" class="form-control" name="email1">
					</div>
					<div class="form-group">
				

						<label for="password1">Password: </label>
						<input type="password" class="form-control" name="password1">
					</div>
							<?=$this->session->flashdata('loginfail'); ?>

					<button type="submit" class="btn btn-primary">Login</button>
				</form>
				<hr>
							<?=$this->session->flashdata('empty'); ?>

						<a href="/main/register">register</a>
			</div>
		</div>

		

		
	</div> <!--end of row -->
</div> <!--end of container -->
</body>
</html>