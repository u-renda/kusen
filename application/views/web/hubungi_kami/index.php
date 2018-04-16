<div role="main" class="main shop">
	
	<section class="page-header page-header-center page-header-more-padding page-header-no-title-border">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1>Hubungi Kami</h1>
				</div>
			</div>
		</div>
	</section>
	
	<!--MAIN PAGE-->
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="alert alert-success hidden" id="contactSuccess">
					<strong>Berhasil!</strong> Pesan Anda sudah dikirim ke kami.
				</div>
				<div class="alert alert-danger hidden" id="contactError">
					<strong>Gagal!</strong> Ada kesalahan pada pengiriman pesan Anda.
				</div>

				<h2 class="mb-sm"><strong>Hubungi</strong> Kami</h2>
				<form id="contactForm" action="<?php echo base_url().'hubungi_kami'; ?>" method="POST">
					<div class="row">
						<div class="form-group">
							<div class="col-md-6">
								<label>Nama Anda *</label>
								<input type="text" value="" data-msg-required="Mohon isi nama Anda." maxlength="100" class="form-control" name="name" id="name" required>
							</div>
							<div class="col-md-6">
								<label>Email Anda *</label>
								<input type="email" value="" data-msg-required="Mohon isi email Anda." data-msg-email="Mohon isi email dengan format yang benar." maxlength="100" class="form-control" name="email" id="email" required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group">
							<div class="col-md-12">
								<label>Judul</label>
								<input type="text" value="" data-msg-required="Mohon isi judul." maxlength="100" class="form-control" name="subject" id="subject" required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group">
							<div class="col-md-12">
								<label>Pesan *</label>
								<textarea maxlength="5000" data-msg-required="Mohon isi pesan Anda." rows="10" class="form-control" name="message" id="message" required></textarea>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<input name="submit" id="submit" type="submit" value="Kirim Pesan" class="btn btn-primary btn-lg mb-xlg" data-loading-text="Loading...">
						</div>
					</div>
				</form>
			</div>
			<div class="col-md-6">

				<h4 class="heading-primary">Kantor <strong>Kami</strong></h4>
				<table>
					<tr class="h-50">
						<td class="valign-text-top"><i class="fa fa-map-marker kantor-kami-icon"></i><strong class="kantor-kami-title">Alamat:&nbsp;</strong></td>
						<td class="valign-text-top"><?php echo $alamat;?></td>
					</tr>
					<tr class="h-50">
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

				<hr class="tall">

				<h4 class="heading-primary">Jam <strong>Kerja</strong></h4>
				<ul class="list list-icons list-dark mt-xlg">
					<li><i class="fa fa-clock-o"></i> Senin - Jumat &nbsp | 08:00 - 17:00 WIB</li>
					<li><i class="fa fa-clock-o"></i> Sabtu - Minggu | Tutup</li>
				</ul>
			</div>
		</div>
	</div>
</div>