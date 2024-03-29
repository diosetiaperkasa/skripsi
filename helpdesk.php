<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login page PT Bando Indonesia</title>
		<link rel="icon" href="bando.jpg" type="image/x-icon">
	<!--STYLESHEET-->
	<!--=================================================-->
	<!--Open Sans Font [ OPTIONAL ] -->
 	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700&amp;subset=latin" rel="stylesheet">
	<!--Bootstrap Stylesheet [ REQUIRED ]-->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<!--Nifty Stylesheet [ REQUIRED ]-->
	<link href="css/nifty.min.css" rel="stylesheet">
	<!--Font Awesome [ OPTIONAL ]-->
	<link href="plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<!--Demo [ DEMONSTRATION ]-->
	<link href="css/demo/nifty-demo.min.css" rel="stylesheet">
	<!--SCRIPT-->
	<!--=================================================-->
	<!--Page Load Progress Bar [ OPTIONAL ]-->
	<link href="plugins/pace/pace.min.css" rel="stylesheet">
	<script src="plugins/pace/pace.min.js"></script>
	<!--
	REQUIRED
	You must include this in your project.
	RECOMMENDED
	This category must be included but you may modify which plugins or components which should be included in your project.
	OPTIONAL
	Optional plugins. You may choose whether to include it in your project or not.
	DEMONSTRATION
	This is to be removed, used for�demonstration purposes only.�This category must not be included in your project.
	SAMPLE
	Some script samples which explain how to initialize plugins or components. This category should not be included in your project.
	Detailed information and more samples can be found in the document.
	-->
</head>
<!--TIPS-->
<!--You may remove all ID or Class names which contain "demo-", they are only used for demonstration. -->
<body>
	<div id="container" class="cls-container">
		<!-- BACKGROUND IMAGE -->
		<!--===================================================-->
		<div id="bg-overlay" class=""></div>
		<!-- HEADER -->
		<!--===================================================-->
		<div class="cls-header cls-header-lg">
			<div class="cls-brand">
				<a class="box-inline" href="index-2.html">
					<!-- <img alt="Nifty Admin" src="img/logo.png" class="brand-icon"> -->
					<span class="brand-title"><span class="text-thin">Aplikasi</span></span>
				</a>
			</div>
		</div>
		<!--===================================================-->
		<!-- LOGIN FORM -->
		<!--===================================================-->
		<div class="cls-content">
			<div class="cls-content-sm panel">
				<div class="panel-body">
					<p class="pad-btm">Form Komplain</p>
					<form method= "Post" action="detail_transaksi_komplain.php">
					<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-money"></i></div>
								<input type="text" class="form-control" name="so" placeholder="Masukan SO/PO (Sales Order)" required>
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-user"></i></div>
								<input type="text" class="form-control" name="nama" placeholder="Nama" required>
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
								<input type="text" name="perusahaan"class="form-control" placeholder="Perusahaan" required>
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
								<input type="text" name="telpon"class="form-control" placeholder="No HP/tlp" required>
							</div>
						</div>
						<div class="row">

							<div class="col-xs-4">
								<div class="form-group text-right">
								<input type="submit" name="login" class="btn btn-success text-uppercase"/>
								</div>
							</div>
						</div>

					</form>
				</div>
			</div>
			<!---<div class="pad-ver">
				<a href="pages-password-reminder.html" class="btn-link mar-rgt">Forgot password ?</a>
				<a href="pages-register.html" class="btn-link mar-lft">Create a new account</a>
			</div>-->
		</div>
		<!--===================================================-->
		<!-- DEMO PURPOSE ONLY -->
		<!--===================================================-->
		<!--<div class="demo-bg">
			<div id="demo-bg-list">
				<div class="demo-loading"><i class="fa fa-refresh"></i></div>
				<img class="demo-chg-bg bg-trans" src="img/bg-img/thumbs/bg-trns.jpg" alt="Background Image">
				<img class="demo-chg-bg" src="img/bg-img/thumbs/bg-img-1.jpg" alt="Background Image">
				<img class="demo-chg-bg active" src="img/bg-img/thumbs/bg-img-2.jpg" alt="Background Image">
				<img class="demo-chg-bg" src="img/bg-img/thumbs/bg-img-3.jpg" alt="Background Image">
				<img class="demo-chg-bg" src="img/bg-img/thumbs/bg-img-4.jpg" alt="Background Image">
				<img class="demo-chg-bg" src="img/bg-img/thumbs/bg-img-5.jpg" alt="Background Image">
				<img class="demo-chg-bg" src="img/bg-img/thumbs/bg-img-6.jpg" alt="Background Image">
				<img class="demo-chg-bg" src="img/bg-img/thumbs/bg-img-7.jpg" alt="Background Image">
			</div>
		</div>-->
		<!--===================================================-->
	</div>
	<!--===================================================-->
	<!-- END OF CONTAINER -->
	<!--JAVASCRIPT-->
	<!--=================================================-->
	<!--jQuery [ REQUIRED ]-->
	<script src="js/jquery-2.1.1.min.js"></script>
	<!--BootstrapJS [ RECOMMENDED ]-->
	<script src="js/bootstrap.min.js"></script>
	<!--Fast Click [ OPTIONAL ]-->
	<script src="plugins/fast-click/fastclick.min.js"></script>
	<!--Nifty Admin [ RECOMMENDED ]-->
	<script src="js/nifty.min.js"></script>
	<!--Background Image [ DEMONSTRATION ]-->
	<script src="js/demo/bg-images.js"></script>
	<!--
	REQUIRED
	You must include this in your project.
	RECOMMENDED
	This category must be included but you may modify which plugins or components which should be included in your project.
	OPTIONAL
	Optional plugins. You may choose whether to include it in your project or not.
	DEMONSTRATION
	This is to be removed, used for�demonstration purposes only.�This category must not be included in your project.
	SAMPLE
	Some script samples which explain how to initialize plugins or components. This category should not be included in your project.
	Detailed information and more samples can be found in the document.
	-->
</body>
</html>
