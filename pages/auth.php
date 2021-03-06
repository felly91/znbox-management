<?php 

require __DIR__."/../autoload.php";

use controller\Translator;
use controller\Helper;
use controller\User;

?>
<!DOCTYPE html>
<html>
<head>
	<title>ZNBOX</title>
	<meta charset="utf-8" id="znbox" href="<?=Helper::url("")?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/x-icon" href="znbox_mobile_app_icon.ico"/>
	<link rel="stylesheet" type="text/css" href="<?=Helper::url("assets/libs/mdl/material.min.css")?>">
	<link rel="stylesheet" type="text/css" href="<?=Helper::url("assets/css/icons.css")?>">
	<link rel="stylesheet" type="text/css" href="<?=Helper::url("assets/libs/semantic/semantic.min.css")?>">
	<link rel="stylesheet" type="text/css" href="<?=Helper::url("assets/libs/uikit/css/uikit.min.css")?>">
	<link rel="stylesheet" type="text/css" href="<?=Helper::url("assets/css/app.css")?>">

	<script type="text/javascript" src="<?=Helper::url("assets/libs/jquery/jquery.min.js")?>"></script>
	<script type="text/javascript" src="<?=Helper::url("assets/libs/mdl/material.min.js")?>"></script>
	<script type="text/javascript" src="<?=Helper::url("assets/libs/semantic/semantic.min.js")?>"></script>
	<script type="text/javascript" src="<?=Helper::url("assets/libs/uikit/js/uikit.min.js")?>"></script>
</head>
<body>

	<div id="root">
		<?php if(isset($_SESSION['user'])) { unset($_SESSION['user']); } ?>
		<!-- Top Nav bar -->
		<div style="width: 100%; top: 0;">
			<nav class="uk-navbar-container" uk-navbar style="background: linear-gradient(to left, #00578f, #000);">
			    <div class="uk-navbar-left">
			        <ul class="uk-navbar-nav">
			        	<li>
			        		<a><img src="<?=Helper::url("res/img/logo.png")?>" width="40"></a>
			        	</li>
			            <li>
			            	<a>
			            		<h2 style="color: white;">ZNBOX</h2>
			            	</a>
			            </li>
			        </ul>
			    </div>
			</nav>
		</div>
		<!-- End Top Nav bar -->
		<div class="uk-margin-xlarge-top" style="margin: auto; max-width: 500px;">
			<div align="center">
				Try a demo
			</div>
			<div align="center">
				<small>E-malil: <b>demo@demo</b> password: <b>demo</b></small>
			</div>
			<div class="ui segment raised">
				<div class="ui header dividing">
					<h3><i class="ui users icon"></i> Authentication</h3>
				</div>
				<form class="ui form zn-form" action="<?=Helper::url("api/user/auth.php")?>">
					<div class="ui field">
						<label>E-mail:</label>
						<input type="email" name="email" required placeholder="E-mail">
					</div>
					<div class="ui field">
						<label>Password:</label>
						<input type="password" name="password" required placeholder="Password">
					</div>
					<div class="ui field">
						<button class="ui button fluid" style="background: linear-gradient(to left, #00578f, #000); color: white;">Login</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	<script type="text/javascript" src="<?=Helper::url("assets/js/app.js")?>"></script>
</body>
</html>