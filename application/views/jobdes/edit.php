<div class="row">
	<div class="col-md-12">
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title">Jobdes Edit</h3>
			</div>
			<?php echo form_open('aplikasi/edit/' . $jobdes['id_jobdes'] . '/' . $id_profile); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-7">
						<label for="jobdes" class="control-label"><span class="text-danger">*</span>Jobdes</label>
						<div class="form-group">
							<input type="text" name="jobdes" value="<?php echo ($this->input->post('jobdes') ? $this->input->post('jobdes') : $jobdes['jobdes']); ?>" class="form-control" id="jobdes" />
							<span class="text-danger"><?php echo form_error('jobdes'); ?></span>
						</div>
					</div>
				</div>
			</div>
			<div class="box-footer">
				<button type="submit" class="btn btn-success">
					<i class="fa fa-check"></i> Save
				</button>
			</div>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>