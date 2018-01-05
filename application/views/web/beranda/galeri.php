<section class="section section-primary mt-none">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h2>Galeri</h2>

				<div class="row">
					<ul class="image-gallery sort-destination lightbox" data-sort-id="portfolio" data-plugin-options='{"delegate": "a.lightbox-portfolio", "type": "image", "gallery": {"enabled": true}}'>
						<?php foreach ($galeri as $row) { ?>
						<li class="col-md-3 col-sm-6 col-xs-12 isotope-item">
							<div class="image-gallery-item">
								<a href="<?php echo $row->url; ?>" class="lightbox-portfolio">
									<span class="thumb-info">
										<span class="thumb-info-wrapper">
											<img src="<?php echo $row->url; ?>" class="img-responsive" alt="<?php echo $row->name; ?>">
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
			</div>
		</div>
	</div>
</section>