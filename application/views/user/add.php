<div class="row">
	<div class="col-md-12">
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title">User Add</h3>
			</div>
			<?php echo form_open('user/add'); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-7">
						<label for="level" class="control-label"><span class="text-danger">*</span>Level</label>
						<div class="form-group">
							<select name="level" class="form-control">
								<option value="">select</option>
								<?php
								$level_values = array(
									'1' => 'admin',
									'2' => 'user',
								);

								foreach ($level_values as $value => $display_text) {
									$selected = ($value == $this->input->post('level')) ? ' selected="selected"' : "";

									echo '<option value="' . $value . '" ' . $selected . '>' . $display_text . '</option>';
								}
								?>
							</select>
							<span class="text-danger"><?php echo form_error('level'); ?></span>
						</div>
					</div>
					<div class="col-md-7">
						<label for="username" class="control-label"><span class="text-danger">*</span>Username</label>
						<div class="form-group">
							<input type="text" name="username" value="<?php echo $this->input->post('username'); ?>" class="form-control" id="username" />
							<span class="text-danger"><?php echo form_error('username'); ?></span>
						</div>
					</div>
					<div class="col-md-7">
						<label for="password" class="control-label"><span class="text-danger">*</span>Password</label>
						<div class="form-group">
							<input type="password" name="password" value="<?php echo $this->input->post('password'); ?>" class="form-control" id="password" />
							<span class="text-danger"><?php echo form_error('password'); ?></span>
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