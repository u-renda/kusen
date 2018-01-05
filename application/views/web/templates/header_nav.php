<div class="header-container container">
	<div class="header-row">
		<div class="header-column">
			<div class="header-logo">
				<a href="<?php echo base_url(); ?>">
					<img alt="Griya Gemilang Mandiri" width="165" height="165" data-sticky-width="82" data-sticky-height="82" data-sticky-top="0" src="<?php echo base_url('assets/img').'/logo.jpg'; ?>">
				</a>
			</div>
		</div>
		<div class="header-column">
			<div class="header-row">
				<div class="header-nav header-nav-stripe">
					<button class="btn header-btn-collapse-nav" data-toggle="collapse" data-target=".header-nav-main">
						<i class="fa fa-bars"></i>
					</button>
					<ul class="header-social-icons social-icons hidden-xs">
						<li class="social-icons-facebook"><a href="<?php echo $facebook; ?>" target="_blank" title="Facebook"><i class="fa fa-facebook"></i></a></li>
						<li class="social-icons-twitter"><a href="<?php echo $twitter; ?>" target="_blank" title="Twitter"><i class="fa fa-twitter"></i></a></li>
						<li class="social-icons-instagram"><a href="<?php echo $instagram; ?>" target="_blank" title="Instagram"><i class="fa fa-instagram"></i></a></li>
					</ul>
					<div class="header-nav-main header-nav-main-square header-nav-main-effect-1 header-nav-main-sub-effect-1 collapse">
						<nav>
							<ul class="nav nav-pills" id="mainNav">
								<li class="active">
									<a href="<?php echo base_url(); ?>">
										Beranda
									</a>
								</li>
								<li class="dropdown">
									<a class="dropdown-toggle" href="#">
										Produk
									</a>
									<ul class="dropdown-menu">
										<?php foreach ($product_type as $row) { ?>
										<li><a href="<?php echo base_url().'produk/'.strtolower($row->name); ?>"><?php echo $row->name; ?></a></li>
										<?php } ?>
									</ul>
								</li>
								<li>
									<a href="<?php echo base_url().'galeri'; ?>">
										Galeri
									</a>
								</li>
								<li>
									<a href="<?php echo base_url().'tentang_kami'; ?>">
										Tentang Kami
									</a>
								</li>
								<li>
									<a href="<?php echo base_url().'hubungi_kami'; ?>">
										Hubungi Kami
									</a>
								</li>
							</ul>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>