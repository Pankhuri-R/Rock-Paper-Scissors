<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Log In</title>

	<!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

<!-- Custom styles for this template -->
    <link href="starter-template.css" rel="stylesheet">
	<style>
		label{
			display: block;
			margin: 1%;
		}

		input{
			width: 70%;
			margin: 1%;
		}

		.btn{
			box-sizing: border-box;
			width: 10%;
			border: 2px solid #fff;
			border-radius: 10px;
			margin-left: 15%;
			padding: 0.7%;
			font-size: 120%;
			text-align: center;
			background: #000;
			color: #fff;
		}

		fieldset{
			margin: 1%;
			padding: 1%;
		}

		print_r{
			width: 100%;
			background-color: red;
			color: #fff;
		}
	</style>
</head>

<?php
if(!isset($_POST['who']) || !isset($_POST['pass'])){
	print("User name and password are required");
}

if ( isset($_POST['cancel'] ) ) {
    // Redirect the browser to game.php
    header("Location: index.php");
    return;
}

$salt = 'XyZzy12*_';

$stored_hash = '1a52e17fa899cf40fb04cfc42e6352f1';

$md5 = hash('md5', 'XyZzy12*_php123');

$password=$_POST['pass'];

$try=$salt.$password;

$check=hash('md5', $try);

if ($check==$md5) {
	header("Location: game.php?name=".urlencode($_POST['who']));
}

elseif ($check!=$md5) {
	print_r("Incorrect Password.Please try again.");
}

?>


<body>
	<div class="container">
	<header>
		<h1>Login Here!</h1>
	</header>

	<form method="post">
		<fieldset>
			<label>Name
				<input type="text" name="who" required>
			</label>

			<label>Password
				<input type="Password" name="pass" required>
			</label>
			<input class="btn" type="submit" value="Log In">
            <input class="btn" type="submit" name="cancel" value="Cancel">
		</fieldset>
	</form>
</div>
</body>
</html>