<div class="row">
	<div class="col-md-12">
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title">Profile Edit</h3>
			</div>
			<?php echo form_open('profile/edit/' . $profile['id_profile']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-7">
						<label for="nama_karyawan" class="control-label"><span class="text-danger">*</span>Nama Karyawan</label>
						<div class="form-group">
							<input type="text" name="nama_karyawan" value="<?php echo ($this->input->post('nama_karyawan') ? $this->input->post('nama_karyawan') : $profile['nama_karyawan']); ?>" class="form-control" id="nama_karyawan" />
							<span class="text-danger"><?php echo form_error('nama_karyawan'); ?></span>
						</div>
					</div>
					<div class="col-md-7">
						<label for="departemen_karyawan" class="control-label"><span class="text-danger">*</span>Departemen Karyawan</label>
						<div class="form-group">
							<input type="text" name="departemen_karyawan" value="<?php echo ($this->input->post('departemen_karyawan') ? $this->input->post('departemen_karyawan') : $profile['departemen_karyawan']); ?>" class="form-control" id="departemen_karyawan" />
							<span class="text-danger"><?php echo form_error('departemen_karyawan'); ?></span>
						</div>
					</div>
					<div class="col-md-7">
						<label for="posisi_karyawan" class="control-label"><span class="text-danger">*</span>Posisi Karyawan</label>
						<div class="form-group">
							<input type="text" name="posisi_karyawan" value="<?php echo ($this->input->post('posisi_karyawan') ? $this->input->post('posisi_karyawan') : $profile['posisi_karyawan']); ?>" class="form-control" id="posisi_karyawan" />
							<span class="text-danger"><?php echo form_error('posisi_karyawan'); ?></span>
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