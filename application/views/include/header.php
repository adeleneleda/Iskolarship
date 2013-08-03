<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html" charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="keywords" content="">
		<meta name="author" content="">

		<title>UP DCS Student Profiling System</title>

		<!-- import the bootstrap stylesheets-->
		<link href="<?= base_url('assets/bootstrap/css/bootstrap.css') ?>" rel="stylesheet"/>
		<link href="<?= base_url('assets/bootstrap/css/bootstrap-responsive.css') ?>" rel="stylesheet"/>
		<!--import font-awesome-->
		<link href="<?= base_url('assets/font-awesome/font-awesome.min.css') ?>" rel="stylesheet"/>
		<!-- import the css styles we created in the /css/ folder-->
		<link href="<?= base_url('assets/css/styles.css') ?>" rel="stylesheet"/>
		<!-- import the jquery, bootstrap, and Angular JS libraries-->
		<script src="<?= base_url('assets/jquery-1.9.1.js') ?>"> </script>
		<script src="<?= base_url('assets/bootstrap/js/bootstrap.js') ?>"></script>
		<!-- import the javascript code we created in the /js/ folder-->
		<script src="/js/app.js" type="text/javascript"></script>
		<script src="/js/message.js" type="text/javascript"></script>
		<script src="/js/directives.js" type="text/javascript"></script>
		<script src="/js/exer.js" type="text/javascript"></script>
		<script src="/js/meli.js" type="text/javascript"></script>
		<script src="/js/dan.js" type="text/javascript"></script>
		<script src="/js/adelen.js" type="text/javascript"> </script>
		<!--
		<script type="text/javascript" src="<?= base_url('assets/js/jquery-1.8.3.js') ?>"></script>
		<link href="<?= base_url('assets/css/font-awesome.css') ?>" rel="stylesheet">
		<link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
		<link href="<?= base_url('assets/css/bootstrap-responsive.min.css') ?>" rel="stylesheet">
		<link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet">
		<link href="<?= base_url('assets/css/custom.css') ?>" rel="stylesheet">
		<script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
		<script src="<?= base_url('assets/js/custom.js') ?>"></script>
		
		
		<link href="<?= base_url('assets/css/theme.bootstrap.css') ?>" rel="stylesheet">
		<script type="text/javascript" src="<?= base_url('assets/js/jquery.tablesorter.js') ?>"></script>
		<script type="text/javascript" src="<?= base_url('assets/js/jquery.tablesorter.widgets.js') ?>"></script>
		<script type="text/javascript" src="<?= base_url('assets/js/jquery.tablesorter.pager.js') ?>"></script>
		-->
		<link rel="shortcut icon" href="<?= base_url('images/favicon.ico')?>" >
		
		<script type="text/javascript" src="<?= base_url('assets/js/jquery.qtip-1.0.0-rc3.min.js') ?>"></script>
	</head>
	<body class="preview" data-spy="scroll" data-target=".subnav" data-offset="80">
		<div class="container">
			<div class="row">   
				<br/>
				<div class="navbar">
					<div class="navbar-inner">
						<div class="container" style="width: auto;">
							<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</a>
							<a class="brand" href="<?= base_url('')?>"><i class="icon-home2" style="padding:4px; padding-right:8px"></i>Welcome!</a>
							<div class="nav-collapse">
								<ul class="nav">
									<li id="infinityedge"><a href="<?= base_url('sponsorhomepage')?>" style="height:23px;">Dan</a></li>
									<li id="sr"><a href="<?= base_url('studentrankings')?>" style="height:23px;">Student Rankings</a></li>
									<li id="cs"><a href="<?= base_url('coursestatistics')?>" style="height:23px;">Course Statistics</a></li>
									<li id="et"><a href="<?= base_url('eligibilitytesting')?>" style="height:23px;">Eligibility Checking</a></li>
									<li id="us"><a href="<?= base_url('updatestatistics')?>" style="height:23px;">Update Statistics</a></li>
									<li id="ab"><a href="<?= base_url('about')?>" style="height:23px;">About</a></li>
								</ul>
							</div><!-- /.nav-collapse -->
						</div>
					</div><!-- /navbar-inner -->
			  </div><!-- /navbar -->
			  <div class="well" align="center">
					<span>
						<h1>Iskolarship</h1> 
						<p class="lead">Crowd-funded education for college students</p>
						<a id="focus_here" name="focus_here"></a>
					</span>
				</div>
			</div>