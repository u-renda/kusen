			<footer id="footer" class="color color-primary">
				<div class="container">
					<div class="row">
						<div class="col-md-4">
							<div class="contact-details">
								<h4>Hubungi Kami</h4>
								<table>
									<tr class="h-50">
										<td class="valign-text-top"><i class="fa fa-map-marker kantor-kami-icon"></i><strong class="kantor-kami-title">Alamat:&nbsp;</strong></td>
										<td class="valign-text-top"><?php echo $alamat;?></td>
									</tr>
									<tr class="h-30">
										<td class="valign-text-top"><i class="fa fa-phone kantor-kami-icon"></i><strong class="kantor-kami-title">Telp:&nbsp;</strong></td>
										<td class="valign-text-top"><?php echo $telp; ?></td>
									</tr>
									<tr>
										<td><i class="fa fa-envelope kantor-kami-icon"></i><strong class="kantor-kami-title">Email:&nbsp;</strong></td>
										<td><a href="mailto:<?php echo $email2; ?>"><?php echo $email2; ?></a></td>
									</tr>
									<tr>
										<td></td>
										<td><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></td>
									</tr>
								</table>
							</div>
						</div>
						<div class="col-md-2">
							<?php if ($facebook == TRUE || $youtube == TRUE || $instagram == TRUE) { ?>
							<h4>Ikuti Kami</h4>
							<ul class="social-icons">
								<?php if ($facebook == TRUE) { ?>
								<li class="social-icons-facebook"><a href="<?php echo $facebook; ?>" target="_blank" title="Facebook"><i class="fa fa-facebook"></i></a></li>
								<?php } if ($youtube == TRUE) { ?>
								<li class="social-icons-youtube"><a href="<?php echo $youtube; ?>" target="_blank" title="Youtube"><i class="fa fa-youtube"></i></a></li>
								<?php } if ($instagram == TRUE) { ?>
								<li class="social-icons-instagram"><a href="<?php echo $instagram; ?>" target="_blank" title="Instagram"><i class="fa fa-instagram"></i></a></li>
								<?php } ?>
							</ul>
							<?php } ?>
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
		<script src="<?php echo base_url('assets/vendor/isotope').'/jquery.isotope.js'; ?>"></script>
		
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
