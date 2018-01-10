<section role="main" class="content-body">
	<header class="page-header">
		<h2>Akun Saya</h2>
	
		<div class="right-wrapper pull-right mr-xl">
			<ol class="breadcrumbs">
				<li>
					<a href="<?php echo $this->config->item('link_home'); ?>">
						<i class="fa fa-home"></i>
					</a>
				</li>
				<li><span>Lainnya</span></li>
				<li><span>Akun Saya</span></li>
			</ol>
		</div>
	</header>
	<!-- start: page -->
	<div class="row" id="admin_akun_saya_page">
		<div class="col-md-6 col-lg-12 col-xl-6">
			<?php
			if ($notif != '') { echo $notif; } ?>
			<section class="panel panel-primary">
				<header class="panel-heading">
					<h2 class="panel-title">Data Utama</h2>
				</header>
				<form class="form-horizontal form-bordered" method="post" action="<?php echo $this->config->item('link_admin_akun_saya'); ?>">
					<div class="panel-body">
						<div class="form-group">
							<label class="col-md-3 control-label">Nama <span class="text-danger">*</span></label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="nama" value="<?php echo set_value('nama', ucwords($result->name)); ?>">
								<?php echo form_error('nama', '<div class="text-danger">', '</div>'); ?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Email <span class="text-danger">*</span></label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="<?php echo set_value('email', $result->email); ?>">
								<?php echo form_error('email', '<div class="text-danger">', '</div>'); ?>
							</div>
						</div>
					</div>
					<footer class="panel-footer">
						<div class="row">
							<div class="col-sm-6 col-sm-offset-3">
								<button type="submit" class="btn btn-primary" value="Simpan" name="submit">Simpan</button>
							</div>
						</div>
					</footer>
				</form>
			</section>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 col-lg-12 col-xl-6">
			<section class="panel panel-primary">
				<header class="panel-heading">
					<h2 class="panel-title">Data Admin</h2>
				</header>
				<form class="form-horizontal form-bordered" method="post" action="<?php echo $this->config->item('link_admin_akun_saya'); ?>">
					<div class="panel-body">
						<div class="form-group">
							<label class="col-md-3 control-label">Username <span class="text-danger">*</span></label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="username" value="<?php echo set_value('username', $result->username); ?>">
								<?php echo form_error('username', '<div class="text-danger">', '</div>'); ?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Password Lama <span class="text-danger">*</span></label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password_lama">
								<?php echo form_error('password_lama', '<div class="text-danger">', '</div>'); ?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Password Baru <span class="text-danger">*</span></label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password_baru">
								<?php echo form_error('password_baru', '<div class="text-danger">', '</div>'); ?>
							</div>
						</div>
					</div>
					<footer class="panel-footer">
						<div class="row">
							<div class="col-sm-6 col-sm-offset-3">
								<button type="submit" class="btn btn-primary" value="Simpan" name="submit_password">Simpan</button>
							</div>
						</div>
					</footer>
				</form>
			</section>
		</div>
	</div>
