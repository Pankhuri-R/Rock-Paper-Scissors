<!DOCTYPE html>
<html>
<head>
	<title>Let's Play</title>
	<!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

<!-- Custom styles for this template -->
    <link href="starter-template.css" rel="stylesheet">
</head>

<?php

if(!isset($_GET['name']) || strlen($_GET['name'])<1){
	die("Name parameter missing");
}

if(isset($_POST['logout'])){
	header('Location: index.php');
	return;
}

$name=$_GET['name'];
$names=array('Rock','Paper','Scissors');
$human= isset($_POST['human'])? $_POST['human']+0: -1;

$computer=0;

$computer=rand(0, 2);

function check($computer,$human){
	if($computer==$human){
		return 'Tie';
	}

	elseif (($computer==0 && $human==1)|| ($computer==1 && $human==2)||($computer==2 && $human==0)) {
	    return 'You Win';
	}

	else{
		return 'You Lose';
	}
	return false;
}

$result=check($computer,$human);

?>



<body>
	<div class="container">
	<header>
		<h1>Rock Paper Scissors</h1>
	</header>

	<p>Welcome: <?=htmlentities($name);?></p>

	<form method="post">
	<select name="human">
		<option value="-1">Select</option>
		<option value="0">Rock</option>
		<option value="1">Paper</option>
		<option value="2">Scissors</option>
		<option value="3">Test</option>
	</select>
<input type="submit" value="Play">
<input type="submit" name="logout" value="Logout">
</form>

<pre>
<?php

if ($human==-1) {
	print("Select a strategy and press play.");
}

elseif ($human==3) {
	for($i=0;$i<3;$i++){
		for ($j=0; $j <3 ; $j++) { 
			$r=check($i,$j);
			print "Human=$names[$j] Computer=$names[$i] Result=$r\n";
		}
	}
}
else {
    print "Your Play=$names[$human] Computer Play=$names[$computer] Result=$result\n";
}

?>
</pre>
</div>
</body>
</html>