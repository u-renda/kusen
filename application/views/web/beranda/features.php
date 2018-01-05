<section class="section m-none">
	<div class="container">

		<div class="row">
			<div class="col-md-12">
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
			</div>
		</div>
	</div>
</section>