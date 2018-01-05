<!DOCTYPE html>
<html>
	<head>

		<!-- Basic -->
		<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">	

		<title><?php echo $this->config->item('title'); ?></title>	

		<meta name="keywords" content="Jasa Pembuatan Kusen uPVC" />
		<meta name="description" content="Griya Gemilang Mandiri - Jasa Pembuatan Kusen Pintu dan Jendela uPVC">
		<meta name="author" content="griya_gemilang.com">

		<!-- Favicon -->
		<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
		<link rel="apple-touch-icon" href="img/apple-touch-icon.png">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="<?php echo base_url('assets/vendor/bootstrap/css').'/bootstrap.css'; ?>">
		<link rel="stylesheet" href="<?php echo base_url('assets/vendor/font-awesome/css').'/font-awesome.css'; ?>">
		<link rel="stylesheet" href="<?php echo base_url('assets/vendor/owl.carousel/assets').'/owl.carousel.min.css'; ?>">
		<link rel="stylesheet" href="<?php echo base_url('assets/vendor/owl.carousel/assets').'/owl.theme.default.min.css'; ?>">
		<link rel="stylesheet" href="<?php echo base_url('assets/vendor/magnific-popup').'/magnific-popup.css'; ?>">
		
		<!-- Theme CSS -->
		<link rel="stylesheet" href="<?php echo base_url('assets/css').'/theme.css'; ?>">
		<link rel="stylesheet" href="<?php echo base_url('assets/css').'/theme-elements.css'; ?>">
		<link rel="stylesheet" href="<?php echo base_url('assets/css').'/theme-shop.css'; ?>">

		<!-- Current Page CSS -->
		<link rel="stylesheet" href="<?php echo base_url('assets/vendor/rs-plugin/css').'/settings.css'; ?>" media="screen">
		
		<!-- Skin CSS -->
		<link rel="stylesheet" href="<?php echo base_url('assets/css/skins').'/default.css'; ?>">

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="<?php echo base_url('assets/css').'/custom.css'; ?>">

		<!-- Head Libs -->
		<script src="<?php echo base_url('assets/vendor/modernizr').'/modernizr.js'; ?>"></script>

		<!--[if IE]>
			<link rel="stylesheet" href="<?php echo base_url('assets/css').'/ie.css'; ?>">
		<![endif]-->

		<!--[if lte IE 8]>
			<script src="<?php echo base_url('assets/vendor/respond').'/respond.js'; ?>"></script>
			<script src="<?php echo base_url('assets/vendor/excanvas').'/excanvas.js'; ?>"></script>
		<![endif]-->

	</head>
	<body>

		<div class="body">
			<header id="header" data-plugin-options='{"stickyEnabled": true, "stickyEnableOnBoxed": false, "stickyEnableOnMobile": true, "stickyChangeLogoWrapper": false, "stickyStartAt": 1, "stickySetTop": "0", "stickyChangeLogo": true}'>
				<div class="header-body">
					<div class="header-top header-top-third header-top-style-3">
						<div class="container">
							<p class="text-color-light">
								<span class="ml-xs">Hubungi Kami! <i class="fa fa-phone"></i> <?php echo $telp; ?></span><span class="hidden-xs"> | <a href="#"><?php echo $email; ?></a></span>
							</p>
							<div class="header-search hidden-xs">
								<form id="searchForm" action="page-search-results.html" method="get">
									<div class="input-group">
										<input type="text" class="form-control" name="q" id="q" placeholder="Search..." required>
										<span class="input-group-btn">
											<button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
										</span>
									</div>
								</form>
							</div>
						</div>
					</div>
					<?php $this->load->view('web/templates/header_nav'); ?>
				</div>
			</header>
