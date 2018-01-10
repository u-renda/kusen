<section role="main" class="content-body">
	<header class="page-header">
		<h2>Testimonial</h2>
	
		<div class="right-wrapper pull-right mr-xl">
			<ol class="breadcrumbs">
				<li>
					<a href="<?php echo $this->config->item('link_admin_home'); ?>">
						<i class="fa fa-home"></i>
					</a>
				</li>
				<li><span>Testimonial</span></li>
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
                <form action="<?php echo $this->config->item('link_admin_testimonial_update').'?id='.$id; ?>" method="post" class="form-horizontal form-bordered">
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label"><span class="text-danger">*</span> Nama:</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control" value="<?php echo set_value('name', $result->name); ?>">
                                <?php echo form_error('name'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"><span class="text-danger">*</span> Jabatan & Perusahaan:</label>
                            <div class="col-sm-10">
                                <input type="text" name="job_title" class="form-control" value="<?php echo set_value('job_title', $result->job_title); ?>">
                                <?php echo form_error('job_title'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"><span class="text-danger">*</span> Testimonial:</label>
                            <div class="col-sm-10">
                                <textarea rows="5" name="content" class="form-control mceEditor"><?php echo set_value('content', $result->content); ?></textarea>
                                <?php echo form_error('content'); ?>
                            </div>
                        </div>
                    </div>
                    <footer class="panel-footer">
                        <input type="submit" class="btn btn-primary" name="submit" value="Ubah" id="submit_create" />
                        <a type="button" class="btn btn-default" href="<?php echo $this->config->item('link_admin_testimonial'); ?>">Batal</a>
                    </footer>
                </form>
            </section>
        </div>
    </div>
    <!-- end: page -->
</section>