<div role="main" class="main shop">
	
	<section class="page-header page-header-center page-header-more-padding page-header-no-title-border">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1><?php echo strtoupper($product_type_detail->name); ?></h1>
					<ul class="breadcrumb">
						<li><a href="<?php echo base_url(); ?>">Beranda</a></li>
						<li>Produk</li>
						<li><?php echo strtoupper($product_type_detail->product_type_name); ?></li>
						<li class="active"><?php echo strtoupper($product_type_detail->name); ?></li>
					</ul>
				</div>
			</div>
		</div>
	</section>
	
	<!--MAIN PAGE-->
	<div class="container">
	
		<div class="row">
			<div class="col-md-6">
				<p><?php echo 'Showing '.$offset.' – '.$count.' of '.$total.' results.'; ?></p>
			</div>
		</div>
		
		<div class="row">
			<ul class="products product-thumb-info-list" data-plugin-masonry>
				<?php foreach ($result as $row) { ?>
				<li class="col-md-4 col-sm-6 col-xs-12 product">
					<span class="product-thumb-info">
						<img alt="<?php echo $row->name; ?>" class="img-responsive product-image" src="<?php echo $row->url; ?>">
						<span class="product-thumb-info-content">
							<h4 class="mb-md"><?php echo $row->name; ?></h4>
							<span><?php echo $row->description; ?></span>
						</span>
					</span>
				</li>
				<?php } ?>
			</ul>
		</div>
	
		<?php echo $this->pagination->create_links(); ?>
	
	</div>
</div>