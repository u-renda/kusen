<div class="header-container container">
	<div class="header-row">
		<div class="header-column">
			<div class="header-logo">
				<a href="<?php echo base_url(); ?>">
					<img alt="Griya Gemilang Mandiri" width="auto" height="40" src="<?php echo base_url('assets/img').'/logo.jpg'; ?>">
				</a>
			</div>
		</div>
		<div class="header-column v-align-bottom">
			<div class="header-title">
				<?php echo 'Griya Gemilang Mandiri'; ?>
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
						<li class="social-icons-youtube"><a href="<?php echo $youtube; ?>" target="_blank" title="Youtube"><i class="fa fa-youtube"></i></a></li>
						<li class="social-icons-instagram"><a href="<?php echo $instagram; ?>" target="_blank" title="Instagram"><i class="fa fa-instagram"></i></a></li>
					</ul>
					<div class="header-nav-main header-nav-main-square header-nav-main-effect-1 header-nav-main-sub-effect-1 collapse">
						<nav>
							<ul class="nav nav-pills" id="mainNav">
								<li class="list-main">
									<a href="<?php echo base_url(); ?>">
										Beranda
									</a>
								</li>
								<li class="list-parent dropdown">
									<a class="dropdown-toggle" href="#">
										Produk
									</a>
									<ul class="dropdown-menu">
										<?php foreach ($product_type as $key => $val) { ?>
										
										<?php if (isset($val['detail']) == TRUE) { ?>
										<li class="list-child dropdown-submenu">
											<a href="#"><?php echo strtoupper($val['name']); ?></a>
											<ul class="dropdown-menu">
												<?php foreach ($val['detail'] as $k => $v) { ?>
												<li class="list-grandchild"><a href="<?php echo base_url().'produk/'.$val['name'].'/'.$v['name']; ?>"><?php echo strtoupper($v['name']); ?></a></li>
												<?php } ?>
											</ul>
										</li>
										<?php } else { ?>
										<li><a href="#"><?php echo strtoupper($val['name']); ?></a></li>
										<?php }
										} ?>
									</ul>
								</li>
								<li class="list-main">
									<a href="<?php echo base_url().'galeri'; ?>">
										Galeri
									</a>
								</li>
								<li class="list-main">
									<a href="<?php echo base_url().'tentang_kami'; ?>">
										Tentang Kami
									</a>
								</li>
								<li class="list-main">
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