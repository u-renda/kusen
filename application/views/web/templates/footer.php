			<footer id="footer">
				<div class="container">
					<div class="row">
						<div class="col-md-4 col-md-offset-6">
							<div class="contact-details">
								<h4>Hubungi Kami</h4>
								<ul class="contact">
									<li><p><i class="fa fa-map-marker"></i> <strong>Alamat:</strong> <?php echo $alamat; ?></p></li>
									<li><p><i class="fa fa-phone"></i> <strong>Telp:</strong> <?php echo $telp; ?></p></li>
									<li><p><i class="fa fa-envelope"></i> <strong>Email:</strong> <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></p></li>
								</ul>
							</div>
						</div>
						<div class="col-md-2">
							<h4>Ikuti Kami</h4>
							<ul class="social-icons">
								<li class="social-icons-facebook"><a href="<?php echo $facebook; ?>" target="_blank" title="Facebook"><i class="fa fa-facebook"></i></a></li>
								<li class="social-icons-twitter"><a href="<?php echo $twitter; ?>" target="_blank" title="Twitter"><i class="fa fa-twitter"></i></a></li>
								<li class="social-icons-instagram"><a href="<?php echo $instagram; ?>" target="_blank" title="Instagram"><i class="fa fa-instagram"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="footer-copyright">
					<div class="container">
						<div class="row">
							<div class="col-md-7">
								<p>© Copyright <?php echo date('Y'); ?>. All Rights Reserved.</p>
							</div>
						</div>
					</div>
				</div>
			</footer>
		</div>

		<!-- Vendor -->
		<script src="<?php echo base_url('assets/vendor/jquery').'/jquery.js'; ?>"></script>
		<script src="<?php echo base_url('assets/vendor/owl.carousel').'/owl.carousel.js'; ?>"></script>
		<script src="<?php echo base_url('assets/vendor/magnific-popup').'/jquery.magnific-popup.js'; ?>"></script>

		<script src="<?php echo base_url('assets/vendor/bootstrap/js').'/bootstrap.js'; ?>"></script>
		<script src="<?php echo base_url('assets/vendor/common').'/common.js'; ?>"></script>
		<script src="<?php echo base_url('assets/vendor/jquery.validation').'/jquery.validation.js'; ?>"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="<?php echo base_url('assets/js').'/theme.js'; ?>"></script>
		
		<!-- Specific Page Vendor and Views -->
		<script src="<?php echo base_url('assets/vendor/rs-plugin/js').'/jquery.themepunch.tools.min.js'; ?>"></script>
		<script src="<?php echo base_url('assets/vendor/rs-plugin/js').'/jquery.themepunch.revolution.min.js'; ?>"></script>
		
		<!-- Theme Custom -->
		<script src="<?php echo base_url('assets/js').'/custom.js'; ?>"></script>
		
		<!-- Theme Initialization Files -->
		<script src="<?php echo base_url('assets/js').'/theme.init.js'; ?>"></script>

	</body>
</html>
