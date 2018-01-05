<div role="main" class="main shop">
	
	<section class="page-header page-header-center page-header-more-padding page-header-no-title-border">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1>uPVC</h1>
					<ul class="breadcrumb">
						<li><a href="<?php echo base_url(); ?>">Beranda</a></li>
						<li>Produk</li>
						<li class="active">uPVC</li>
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
	
			<ul class="products product-thumb-info-list" data-plugin-masonry>
				<?php foreach ($result as $row) { ?>
				<li class="col-md-3 col-sm-6 col-xs-12 product">
					<span class="product-thumb-info">
						<a href="shop-product-sidebar.html">
							<span class="product-thumb-info-image">
								<span class="product-thumb-info-act">
									<span class="product-thumb-info-act-left"><em>View</em></span>
									<span class="product-thumb-info-act-right"><em><i class="fa fa-plus"></i> Details</em></span>
								</span>
								<img alt="<?php echo $row->name; ?>" class="img-responsive" src="<?php echo $row->url; ?>">
							</span>
						</a>
						<span class="product-thumb-info-content">
							<a href="shop-product-sidebar.html">
								<h4><?php echo $row->name; ?></h4>
								<span class="price">
									<ins><span class="amount"><?php echo 'Rp '.number_format($row->price,0,',','.'); ?></span></ins>
								</span>
							</a>
						</span>
					</span>
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