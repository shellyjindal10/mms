<?php
	session_start();
	$name 	=	"";
	$email 	=	"";
	if ((isset($_SESSION['mms_logged_uid'])) && (isset($_SESSION['mms_logged_name'])) ) {
		$name 	= $_SESSION['mms_logged_name'];
		$email 	= $_SESSION['mms_logged_uid'];

	}
	else {
		header('location:login.php');
	}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>MyMoneySplit - Dashboard </title>
		<meta name="description" content="description">
		<meta name="author" content="dashboard">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="plugins/bootstrap/bootstrap.css" rel="stylesheet">
		<link href="plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet">
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
		<link href='http://fonts.googleapis.com/css?family=Righteous' rel='stylesheet' type='text/css'>
		<link href="plugins/fullcalendar/fullcalendar.css" rel="stylesheet">
	<!--	<link href="plugins/fancybox/jquery.fancybox.css" rel="stylesheet">
		<link href="plugins/fullcalendar/fullcalendar.css" rel="stylesheet">
		<link href="plugins/xcharts/xcharts.min.css" rel="stylesheet">
		<link href="plugins/select2/select2.css" rel="stylesheet">
		<link href="plugins/justified-gallery/justifiedGallery.css" rel="stylesheet"> -->
		<link href="css/dashboard_v2.css" rel="stylesheet">
		<!--<link href="plugins/chartist/chartist.min.css" rel="stylesheet"> -->
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
				<script src="http://getbootstrap.com/docs-assets/js/html5shiv.js"></script>
				<script src="http://getbootstrap.com/docs-assets/js/respond.min.js"></script>
		<![endif]-->
	</head>
<body>
<!--Start Header-->
<div id="screensaver">
	<canvas id="canvas"></canvas>
	<i class="fa fa-lock" id="screen_unlock"></i>
</div>
<div id="modalbox">
	<div class="dashboard-modal">
		<div class="dashboard-modal-header">
			<div class="modal-header-name">
				<span>Basic table</span>
			</div>
			<div class="box-icons">
				<a class="close-link">
					<i class="fa fa-times"></i>
				</a>
			</div>
		</div>
		<div class="dashboard-modal-inner">
		</div>
		<div class="dashboard-modal-bottom">
		</div>
	</div>
</div>

<header class="navbar">
	<div class="container-fluid expanded-panel">
		<div class="row">
			<div id="logo" class="col-xs-12 col-sm-2">
				<a href="dashboard.php"><img src="img/freeze/logo.png" height=45px></a>
			</div>
			<div id="top-panel" class="col-xs-12 col-sm-10">
						<ul class="nav navbar-nav pull-right panel-menu">
							<li class="hidden-xs">
								<a href="dashboard.php" class="modal-link">
									<i class="fa fa-home fa-fw"></i>
								</a>
							</li>
							<li class="hidden-xs">
								<a class="ajax-link" href="ajax/calendar_add_bills.php">
									<i class="fa fa-calendar"></i>
									<span class="badge">7</span>
								</a>
							</li>
							<li class="hidden-xs">
								<a href="ajax/page_messages.html" class="ajax-link">
									<i class="fa fa-envelope"></i>
									<span class="badge">7</span>
								</a>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle account" data-toggle="dropdown">
									<div class="avatar">
										<img src="<?php 
													$img="img/profile_pics/";
													if (file_exists($img."$email.jpg")){
														echo $img."$email.jpg";
													}else {
														echo $img."default.png";
													}
										?>"  class="img-circle" alt="avatar" />
									</div>
									<i class="fa fa-angle-down pull-right"></i>
									<div class="user-mini pull-right">
										<span class="welcome">Welcome,</span>
										<span><?php $fname = explode(" ",$name); echo $fname[0]; ?></span>
									</div>
								</a>
								<ul class="dropdown-menu">
									<li>
										<a href="#">
											<i class="fa fa-user"></i>
											<span>Profile</span>
										</a>
									</li>
									<li>
										<a href="ajax/page_messages.html" class="ajax-link">
											<i class="fa fa-envelope"></i>
											<span>Messages</span>
										</a>
									</li>
									<li>
										<a href="ajax/gallery_simple.html" class="ajax-link">
											<i class="fa fa-calculator"></i>
											<span>Expense</span>
										</a>
									</li>
									<li>
										<a href="#">
											<i class="fa fa-cog"></i>
											<span>Settings</span>
										</a>
									</li>
									<li>
										<a href="logout.php">
											<i class="fa fa-power-off"></i>
											<span>Logout</span>
										</a>
									</li>
								</ul>
							</li>
						</ul>
			</div>
		</div>
	</div>
</header>
<!--End Header-->
<!--Start Container-->
<div id="main" class="container-fluid">
	<div class="row">
		<!--Start Content-->
		<div id="content" class="col-xs-12 col-sm-12">
			<div id="about">
				<div class="about-inner">
					<h4 class="page-header">MyMoneySplit.com</h4>
					<p>dashboard team</p>
				</div>
			</div>
			<div class="preloader">
				<img src="img/freeze/loading.gif" class="dashboard-getdata" alt="preloader"/>
			</div>
			<div id="ajax-content"></div>
		</div>
		<!--End Content-->
	</div>
</div>
<!--End Container-->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!--<script src="http://code.jquery.com/jquery.js"></script>-->
<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="plugins/bootstrap/bootstrap.min.js"></script>
<script src="plugins/justified-gallery/jquery.justifiedGallery.min.js"></script>
<script src="plugins/tinymce/tinymce.min.js"></script>
<script src="plugins/tinymce/jquery.tinymce.min.js"></script>
<!-- All functions for this theme + document.ready processing -->
<script src="js/dashboard.js"></script>
</body>
</html>
