<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html" charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="keywords" content="">
		<meta name="author" content="">

		<title>Iskolarship</title>

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
	<script>
	$(document).ready(function(){
		$("#btn-login").click(login);
		$("#logout").click(function(){
			window.location = "<?= base_url("home/logout")?>";
		});
		$('#myCarousel').carousel({
		  interval: 3000
		});
		$('#myCarousel2').carousel({
		  interval: 4000
		});
	});
	
	function login() {
		$.ajax({
			type: "POST",
			url: "<?= base_url("home/login")?>",
			data: { username: $("#username").val(), password: $("#password").val() }
		}).done(function( msg ) {
			if(msg == "" || msg == null) alert("Invalid username and password combination.");
			else if(msg == "donor") window.location = "<?= base_url("sponsorhomepage")?>";
			else if(msg == "student") window.location = "<?= base_url("searchscholarship")?>";
			else window.location = "<?= base_url("")?>";
		});
	}
	</script>
	<body class="preview" style="width:100%;">
		<div class="container">
			<div class="row">   
				<div class="span12">
				<br/>
				<div class="navbar" style="margin:0px; ">
					<div class="navbar-inner">
						<div class="container" style="width: auto; margin:0px;">
							<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</a>
							<a class="brand" href="<?= base_url('')?>"><i class="icon-book" style="padding:4px; padding-right:8px"></i>Iskolarship</a>
							<div class="nav-collapse">
								<ul class="nav">
									<li><a href="<?= base_url('home')?>" class="active">Home</a></li>
								    <li><a href="<?= base_url('donate')?>">Donate</a></li>
								    <li><a href="<?= base_url('success')?>">Success Stories</a></li>
								    <li><a href="<?= base_url('sponsors')?>">Sponsors and Affiliations</a></li>
								    <li><a href="<?= base_url('about')?>">About</a></li>
								</ul>
								<ul class="nav pull-right">
								  <?if(empty($username)) {?>
								  <li class="dropdown"><a href="" data-toggle="dropdown" class="dropdown-toggle"> <i class="icon-user"></i>  Login</a>
									<div style="padding:20px" class="dropdown-menu">
										<form>
										<input id="username" type="text" name="username_id" style="height:30px;margin-top:15px" placeholder="Username"/>
										<input id="password" type="password" name="password" style="height:30px" placeholder="Password"/>
										<input id="remember" type="checkbox" name="remember" style="float:left;margin-right:10px"/>
										<label for="remember" class="string optional">Remember me</label>
										<br/>
										<input id="btn-login" value="Log in" class="btn btn-custom"/>
										</form>
									</div>
								  </li>
								  <li><a href="<?= base_url('studentsignup')?>"><i class="icon-edit"></i>  Signup</a></li>
								  <? } else {?>
									<li><a href="<?= base_url('')?>"><i class="icon-user"> </i>You are logged in as <?= $username?> - <?= $role?></a></li>
									<li><a id="logout" style="cursor:pointer">Logout</i></a></li>
								  <? }?>
								</ul>
							</div><!-- /.nav-collapse -->
						</div>
					</div><!-- /navbar-inner -->
			  </div><!-- /navbar -->
			  <div align="center" style="padding:0px;">
				<br/>
				<a href="<?= base_url("")?>"><img src="<?= base_url('assets/img/header-small.jpg')?>"></img></a>
				<br/>
				<hr/>
			</div>
		</div>