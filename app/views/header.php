<!DOCTYPE html>
<html lang="nl">
<head>
	<!-- Standardzz -->
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>IMDStagram<?=(isset($title)) ? ' | ' . $title : '';?></title>

	<!-- Stlyezz - You need a sass-compiler -->
	<link rel="stylesheet" href="<?=SITE_URL?>/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?=SITE_URL?>/assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?=SITE_URL?>/assets/css/style.min.css">
	<link rel="stylesheet" href="<?=SITE_URL?>/assets/css/cssgram.css">

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
						<form action="<?=SITE_URL?>/" method="get">
						<span class="input-group-addon" id="basic-addon1"><i class="fa fa-search"></i></span>
						<input type="text" class="form-control" name="q" placeholder="Search.." aria-describedby="basic-addon1">
						<input type="hidden" name="route" value="user/search">
						<input type="submit" value="submit">
						</form>
					</div>
				</div><!-- ./search -->

				<div class="collapse navbar-collapse" id="menu">
					<ul class="nav navbar-nav navbar-right">
						<li><a href="<?=SITE_URL?>/?route=user/post"><i class="fa fa-pencil-square-o"></i></a></li>
						<li><a href="#!"><i class="fa fa-heart"></i></a></li>
						<li><a href="<?=SITE_URL?>/?route=user/profile"><i class="fa fa-user"></i></a></li>
					</ul>
				</div><!-- /.navbar-collapse -->
			</div><!-- /.container-fluid -->
		</nav>
	</header>
	
	<div class="content container">