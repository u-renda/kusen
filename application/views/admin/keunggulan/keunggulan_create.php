<section role="main" class="content-body">
	<header class="page-header">
		<h2>Keunggulan</h2>
	
		<div class="right-wrapper pull-right mr-xl">
			<ol class="breadcrumbs">
				<li>
					<a href="<?php echo $this->config->item('link_admin_home'); ?>">
						<i class="fa fa-home"></i>
					</a>
				</li>
				<li><span>Keunggulan</span></li>
				<li><span>Tambah</span></li>
			</ol>
		</div>
	</header>

    <!-- start: page -->
    <div class="row">
        <div class="col-md-12">
            <section class="panel panel-featured">
                <header class="panel-heading">
                    <h2 class="panel-title">Tambah Baru</h2>
                </header>
                <form action="<?php echo $this->config->item('link_admin_keunggulan_create'); ?>" method="post" class="form-horizontal form-bordered">
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label"><span class="text-danger">*</span> Judul:</label>
                            <div class="col-sm-10">
                                <input type="text" name="title" class="form-control" value="<?php echo set_value('title'); ?>">
                                <?php echo form_error('title'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"><span class="text-danger">*</span> Isi:</label>
                            <div class="col-sm-10">
                                <textarea rows="5" name="description" class="form-control mceEditor"><?php echo set_value('description'); ?></textarea>
                                <?php echo form_error('description'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"><span class="text-danger">*</span> Logo:</label>
                            <div class="col-sm-10">
                                <input type="text" name="logo" class="form-control" value="<?php echo set_value('logo'); ?>">
                                <span class="help-block">Cari referensi logo di <strong>fontawesome.io/icons/</strong>. Masukkan hanya nama dari iconnya tanpa "fa"</span>
								<?php echo form_error('logo'); ?>
                            </div>
                        </div>
                    </div>
                    <footer class="panel-footer">
                        <input type="submit" class="btn btn-primary" name="submit" value="Tambah" id="submit_create" />
                        <a type="button" class="btn btn-default" href="<?php echo $this->config->item('link_admin_keunggulan'); ?>">Batal</a>
                    </footer>
                </form>
            </section>
        </div>
    </div>
    <!-- end: page -->
</section>