<section role="main" class="content-body">
	<header class="page-header">
		<h2>Produk</h2>
	
		<div class="right-wrapper pull-right mr-xl">
			<ol class="breadcrumbs">
				<li>
					<a href="<?php echo $this->config->item('link_admin_home'); ?>">
						<i class="fa fa-home"></i>
					</a>
				</li>
				<li><span>Produk</span></li>
				<li><span>Ubah</span></li>
			</ol>
		</div>
	</header>

    <!-- start: page -->
    <div class="row" id="produk_update_page">
        <div class="col-md-12">
            <section class="panel panel-featured">
                <header class="panel-heading">
                    <h2 class="panel-title">Ubah Data</h2>
                </header>
                <form action="<?php echo $this->config->item('link_admin_produk_update').'?id='.$id; ?>" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label"><span class="text-danger">*</span> Tipe Produk:</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="id_product_type">
                                    <option value="">-- Pilih Salah Satu --</option>
                                    <?php foreach ($product_type_lists as $key => $val) { ?>
										<option value="<?php echo $val->id_product_type; ?>" <?php if ($result->id_product_type == $val->id_product_type) { echo 'selected="selected"'; } echo set_select('id_product_type', $val->id_product_type); ?>><?php echo $val->name; ?></option>
                                    <?php } ?>
                                </select>
                                <?php echo form_error('id_product_type'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"><span class="text-danger">*</span> Nama:</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control" value="<?php echo set_value('name', $result->name); ?>">
                                <?php echo form_error('name'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"><span class="text-danger">*</span> Harga:</label>
                            <div class="col-sm-10">
                                <input type="text" name="price" class="form-control" value="<?php echo set_value('price', $result->price); ?>">
                                <span class="help-block">Masukkan tanpa titik (.) atau koma (,)</span>
								<?php echo form_error('price'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Foto:</label>
                            <div class="col-sm-10">
								<img src="<?php echo $result->url; ?>" alt="<?php echo $result->name; ?>" width="50%">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-10 col-sm-offset-2">
                                <div class="checkbox-custom checkbox-default">
									<input type="checkbox" id="checkboxMedia" name="change_media" value="yes">
									<label for="checkboxMedia">Ubah foto</label>
								</div>
								<div class="image_option">
									<div class="fileupload fileupload-new" data-provides="fileupload">
										<div class="input-append">
											<div class="uneditable-input">
												<span class="fileupload-preview"></span>
											</div>
											<span class="btn btn-default btn-file">
												<span class="fileupload-exists">Ubah</span>
												<span class="fileupload-new">Pilih file</span>
												<input type="file" name="produk_url" />
											</span>
											<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Hapus</a>
										</div>
									</div>
								</div>
                            </div>
                        </div>
                    </div>
                    <footer class="panel-footer">
                        <input type="submit" class="btn btn-primary" name="submit" value="Ubah" id="submit_create" />
                        <a type="button" class="btn btn-default" href="<?php echo $this->config->item('link_admin_produk'); ?>">Batal</a>
                    </footer>
                </form>
            </section>
        </div>
    </div>
    <!-- end: page -->
</section>