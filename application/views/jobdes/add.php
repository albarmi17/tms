<div class="row">
	<div class="col-md-12">
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title">Jobdes Add</h3>
			</div>
			<?php echo form_open('jobdes/add'); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-7">
						<label for="id_user" class="control-label"><span class="text-danger">*</span>User</label>
						<div class="form-group">
							<select name="id_user" class="form-control">
								<option value="">select user</option>
								<?php
								foreach ($all_user as $user) {
									$selected = ($user['id_user'] == $this->input->post('id_user')) ? ' selected="selected"' : "";

									echo '<option value="' . $user['id_user'] . '" ' . $selected . '>' . $user['username'] . '</option>';
								}
								?>
							</select>
							<span class="text-danger"><?php echo form_error('id_user'); ?></span>
						</div>
					</div>
					<div class="col-md-7">
						<label for="id_profile" class="control-label"><span class="text-danger">*</span>Profile</label>
						<div class="form-group">
							<select name="id_profile" class="form-control">
								<option value="">select profile</option>
								<?php
								foreach ($all_profile as $profile) {
									$selected = ($profile['id_profile'] == $this->input->post('id_profile')) ? ' selected="selected"' : "";

									echo '<option value="' . $profile['id_profile'] . '" ' . $selected . '>' . $profile['nama_karyawan'] . '</option>';
								}
								?>
							</select>
							<span class="text-danger"><?php echo form_error('id_profile'); ?></span>
						</div>
					</div>
					<div class="col-md-7">
						<label for="jobdes" class="control-label"><span class="text-danger">*</span>Jobdes</label>
						<div class="form-group">
							<input type="text" name="jobdes" value="<?php echo $this->input->post('jobdes'); ?>" class="form-control" id="jobdes" />
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