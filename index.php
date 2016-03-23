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

	</div><!-- ./content container -->
	

	<footer>
		<div class="container">
			<p class="copyright">&copy; 2016 IMDstagram</p>
			<ul>
				<li><a href="#!">over ons</a></li>
				<li><a href="#!">ondersteuning</a></li>
				<li><a href="#!">blog</a></li>
				<li><a href="#!">privacy</a></li>
				<li><a href="#!">voorwaarden</a></li>
			</ul>
		</div><!-- ./container -->
	</footer>

	<!-- Scriptzz -->
	<script src="assets/js/jquery-1.11.3.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>
</body>
</html>