<div class="container">
	<div class="row">
		<div class="col-md-12">
			<hr class="tall">
		</div>
	</div>
	<div class="row mb-xlg">
		<?php foreach ($testimonial as $row) { ?>
		<div class="col-md-4">
			<div class="testimonial testimonial-style-5">
				<blockquote>
					<p>"<?php echo $row->content; ?>"</p>
				</blockquote>
				<div class="testimonial-arrow-down"></div>
				<div class="testimonial-author">
					<p><strong><?php echo $row->name; ?></strong><span><?php echo $row->job_title; ?></span></p>
				</div>
			</div>
		</div>
		<?php } ?>
	</div>
</div>