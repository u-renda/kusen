<section role="main" class="content-body">
	<header class="page-header">
		<h2>Admin</h2>
	
		<div class="right-wrapper pull-right mr-xl">
			<ol class="breadcrumbs">
				<li>
					<a href="<?php echo $this->config->item('link_admin_home'); ?>">
						<i class="fa fa-home"></i>
					</a>
				</li>
				<li><span>Admin</span></li>
				<li><span>Ubah</span></li>
			</ol>
		</div>
	</header>

    <!-- start: page -->
    <div class="row">
        <div class="col-md-12">
            <section class="panel panel-featured">
                <header class="panel-heading">
                    <h2 class="panel-title">Ubah Data</h2>
                </header>
                <form action="<?php echo $this->config->item('link_admin_update').'?id='.$id; ?>" method="post" class="form-horizontal form-bordered">
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label"><span class="text-danger">*</span> Nama:</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control" value="<?php echo set_value('name', $result->name); ?>">
                                <?php echo form_error('name'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"><span class="text-danger">*</span> Email:</label>
                            <div class="col-sm-10">
                                <input type="email" name="email" class="form-control" value="<?php echo set_value('email', $result->email); ?>">
                                <?php echo form_error('email'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"><span class="text-danger">*</span> Username:</label>
                            <div class="col-sm-10">
                                <input type="text" name="username" class="form-control" value="<?php echo set_value('username', $result->username); ?>">
                                <?php echo form_error('username'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Password:</label>
                            <div class="col-sm-10">
                                <input type="password" name="password" class="form-control" value="<?php echo set_value('password'); ?>">
                                <?php echo form_error('password'); ?>
                            </div>
                        </div>
						<div class="form-group">
                            <label class="col-sm-2 control-label"><span class="text-danger">*</span> Tipe Admin:</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="id_admin_role" id="id_admin_role">
                                    <option value="">-- Pilih Salah Satu --</option>
                                    <?php foreach ($admin_role as $row) { ?>
										<option value="<?php echo $row->id_admin_role; ?>" <?php if ($result->id_admin_role == $row->id_admin_role) { echo 'selected="selected"'; } echo set_select('id_admin_role', $row->id_admin_role); ?>><?php echo $row->name; ?></option>
                                    <?php } ?>
                                </select>
                                <?php echo form_error('id_admin_role'); ?>
                            </div>
                        </div>
                    </div>
                    <footer class="panel-footer">
                        <input type="submit" class="btn btn-primary" name="submit" value="Ubah" id="submit_create" />
                        <a type="button" class="btn btn-default" href="<?php echo $this->config->item('link_admin_lists'); ?>">Batal</a>
                    </footer>
                </form>
            </section>
        </div>
    </div>
    <!-- end: page -->
</section>