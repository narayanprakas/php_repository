<?php
// Start Session
	session_start();

	if(isset($_POST['name'])){
		if(isset($_SESSION['bookmarks'])){
			$_SESSION['bookmarks'][$_POST['name']] = $_POST['url'];
		} 
		else {
				$_SESSION['bookmarks'] =  Array($_POST['name'] => $_POST['url']);
			}
		}

if(isset($_GET['action']) && $_GET['action'] == 'clear'){
	session_unset(); 
	session_destroy(); 
	header("Location: Bookmarker.php");
}

if(isset($_GET['action']) && $_GET['action'] == 'delete'){
	echo $_GET['name'];
	unset($_SESSION['bookmarks'][$_GET['name']]);
	header("Location: Bookmarker.php");
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Project Bookmarker</title>
		<link rel="stylesheet" href="https://bootswatch.com/4/cyborg/bootstrap.min.css">
	</head>
	<body>
 			<nav class="navbar navbar-expand-lg navbar-light bg-light">
  				<a class="navbar-brand" href="Bookmarker.php">Bookmarker</a>
  					

 				 <div class="collapse navbar-collapse" id="navbarColor03">
   					 <ul class="navbar-nav mr-auto">
      					<li class="nav-item active">
       						 <a class="nav-link" href="Bookmarker.php">HOME <span class="sr-only">(current)</span></a>
     					 </li>
     				 </ul>
     				  <ul class="navbar-nav mr-auto">
      					<li class="nav-item active navbar-nav navbar-right">
       						 <a class="nav-link" href="Bookmarker.php?action=clear">CLEAR <span class="sr-only">(current)</span></a>
     					 </li>
     				 </ul>
 				  </div>
				</nav>
				<div class="container">
					<div class="row">
						<div class="col-md-7">
						  <form class="well" method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
						  	<div class="form-group">
						  		<label>Website Name:</label>
						  			<input type="text" class="form-control" name="name">
						  	</div>
						  	<div class="form-group">
						  		<label>Website URL:</label>
						  			<input type="text" class="form-control" name="url">
						  	</div>
						  	<input type="submit" class="btn btn-default" value="submit">
						  </form>
						</div>
						<div class="col-md-5">
						<?php if(isset($_SESSION['bookmarks'])): ?>
							<ul class="list-group">
								<?php foreach($_SESSION['bookmarks'] as $name => $url) : ?>
									<li class="list-group-item"><a href="<?php echo $url; ?>"><?php echo $name; ?></a> <a class="delete" href="Bookmarker.php?action=delete&name=<?php echo $name; ?>">[X]</a></li>
								<?php endforeach; ?>
							</ul>
						<?php else : ?>
							<p>No Bookmarks</p>
						<?php endif; ?>
						
					</div>
				</div>
				
				
				
	</body>
</html>
	
	