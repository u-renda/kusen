<div role="main" class="main shop">
	
	<section class="page-header page-header-center page-header-more-padding page-header-no-title-border">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1>Galeri</h1>
					<ul class="breadcrumb">
						<li><a href="<?php echo base_url(); ?>">Beranda</a></li>
						<li class="active">Galeri</li>
					</ul>
				</div>
			</div>
		</div>
	</section>
	
	<!--MAIN PAGE-->
	<div class="container">
	
		<div class="row">
			<div class="col-md-6">
				<p>Showing 1–12 of 25 results.</p>
			</div>
		</div>
	
		<div class="row">

			<ul class="image-gallery sort-destination lightbox" data-sort-id="portfolio" data-plugin-options='{"delegate": "a.lightbox-portfolio", "type": "image", "gallery": {"enabled": true}}'>
				<?php foreach ($result as $row) { ?>
				<li class="col-md-3 col-sm-6 col-xs-12 isotope-item websites">
					<div class="image-gallery-item">
						<a href="<?php echo $row->url; ?>" class="lightbox-portfolio">
							<span class="thumb-info">
								<span class="thumb-info-wrapper">
									<img src="<?php echo $row->url; ?>" class="img-responsive" alt="">
									<span class="thumb-info-action">
										<span class="thumb-info-action-icon"><i class="fa fa-link"></i></span>
									</span>
								</span>
							</span>
						</a>
					</div>
				</li>
				<?php } ?>
			</ul>
		</div>
	
		<div class="row">
			<div class="col-md-12">
				<ul class="pagination pull-right">
					<li><a href="#"><i class="fa fa-chevron-left"></i></a></li>
					<li class="active"><a href="#">1</a></li>
					<li><a href="#">2</a></li>
					<li><a href="#">3</a></li>
					<li><a href="#"><i class="fa fa-chevron-right"></i></a></li>
				</ul>
			</div>
		</div>
	
	</div>
</div>