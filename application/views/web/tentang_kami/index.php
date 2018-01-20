<div role="main" class="main shop">
	
	<section class="page-header page-header-center page-header-more-padding page-header-no-title-border">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1>Tentang Kami</h1>
					<ul class="breadcrumb">
						<li><a href="<?php echo base_url(); ?>">Beranda</a></li>
						<li class="active">Tentang Kami</li>
					</ul>
				</div>
			</div>
		</div>
	</section>
	
	<!--MAIN PAGE-->
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<!--TENTANG KAMI-->
				<h3 class="heading-primary"><strong><?php echo $this->config->item('title'); ?></strong></h3>
				<?php echo $tentang_kami; ?>
				<hr class="tall">
				
				<!--FEATURES-->
				<h3><strong>Kenapa</strong> harus kami?</h3>
				<div class="row">
					<?php foreach ($features as $row) { ?>
					<div class="col-md-4">
						<div class="feature-box feature-box-style-2">
							<div class="feature-box-icon">
								<i class="fa fa-<?php echo $row->logo; ?>"></i>
							</div>
							<div class="feature-box-info">
								<h4 class="mb-none"><?php echo $row->title; ?></h4>
								<p class="tall"><?php echo $row->description; ?></p>
							</div>
						</div>
					</div>
					<?php } ?>
				</div>
				<hr class="tall">
				
				<!--VISI & MISI-->
				<h3><strong>Visi</strong> & Misi</h3>
				<?php echo $visi; ?>
			</div>
		</div>
	</div>
</div>