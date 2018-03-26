<?php
  $first_name=$_POST['first_name'];
  $last_name=$_POST['last_name'];
  $email=$_POST['email'];
  $location=$_POST['location'];
 
 if($first_name==''||$last_name==''||$email==''||$location=='')
 	{
 	header("Location: index2.php? error=please%20fill%20all%20fields");
 	}
?>


<!DOCTYPE html>
<html>
<title>User Profile</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>
	<div class="w3-card w3-margin w3-padding">
		<h1>User Profile</h1>
		<h2><?php echo $first_name; ?> <?php echo $last_name; ?><h2>
			<ul>
		        <li>E-mail: <?php echo $email; ?></li>
				<li>Location: <?php echo $location; ?></li>
			</ul>
			
	</div>


</body>
</html>
