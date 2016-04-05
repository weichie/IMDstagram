<?php
include 'app/app.php';

/*if( isset($_POST['upload']) ){
	try {
		print_r($_FILES['userfile']['name']);
		$app->upload( $_FILES['userfile'] );
	} catch (Exception $e){
		print_r($e);
	}
}*/


?>
<!DOCTYPE html>
<html lang="nl">
<head>
	<!-- Standardzz -->
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Page</title>

	<!-- Stlyezz - You need a sass-compiler -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/css/style.min.css">

	<!-- Fontzz -->
	<link href='https://fonts.googleapis.com/css?family=Fira+Sans:300,400,500' rel='stylesheet' type='text/css'>
</head>
<body>
	<header>
		<nav class="navbar navbar-default">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="index.php">IMDstagram</a>
				</div><!-- ./navbar-header -->
				
				<div class="search">
					<div class="input-group">
						<span class="input-group-addon" id="basic-addon1"><i class="fa fa-search"></i></span>
						<input type="text" class="form-control" placeholder="Search.." aria-describedby="basic-addon1">
					</div>
				</div><!-- ./search -->

				<div class="collapse navbar-collapse" id="menu">
					<ul class="nav navbar-nav navbar-right">
						<li><a href="#!"><i class="fa fa-heart"></i></a></li>
						<li><a href="#!"><i class="fa fa-user"></i></a></li>
					</ul>
				</div><!-- /.navbar-collapse -->
			</div><!-- /.container-fluid -->
		</nav>
	</header>
	
	<div class="content container">

	<form action="upload.php" method="post" enctype="multipart/form-data">
	Your Photo: <input type="file" name="userfile" size="25" />
	<input type="submit" name="submit" value="Submit" />
</form>