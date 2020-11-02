<div class="row">
	<div class="col-md-12">
	<h3 style="margin-left: 15px">Jobdes : <?=$job['jobdes']?></h3>
		<?php echo form_open('aplikasi/add_aktivitas/' . $this->uri->segment(3) . '/' . $this->uri->segment(4)); ?>
		<div id="addform">
			<div id="af1">
				<div id="adduraian0">
					<div id="uf0">
						<div class="form-row">
							<div class="form-group col-md-3">
								<label for="aktivitas" class="control-label"><span class="text-danger">*</span>Aktivitas</label>
								<input type="text" name="aktivitas[]" value="" class="form-control" id="aktivitas" />
								<span class="text-danger"><?php echo form_error('aktivitas[]'); ?></span>
							</div>
							<div class="form-group col-md-2">
								<label for="period" class="control-label"><span class="text-danger">*</span>Period</label>
								<select name="period[]" class="form-control">
									<option value="">Pilih Period</option>
									<?php
									foreach ($period as $p) {
										echo '<option value="' . $p['name'] . '/' . $p['value'] . '">' . $p['name'] . '</option>';
									}
									?>
								</select>
								<span class="text-danger"><?php echo form_error('period[]'); ?></span>
							</div>
							<div class="form-group col-md-2">
								<label for="waktu" class="control-label"><span class="text-danger">*</span>Waktu</label>
								<input type="text" name="waktu[]" value="" class="form-control" id="waktu" />
								<span class="text-danger"><?php echo form_error('waktu[]'); ?></span>
							</div>
							<div class="form-group col-md-3">
								<label for="frekuensi" class="control-label"><span class="text-danger">*</span>Frekuensi</label>
								<input type="text" name="frekuensi[]" value="" class="form-control" id="frekuensi" />
								<span class="text-danger"><?php echo form_error('frekuensi[]'); ?></span>
							</div>
							<div class="form-group col-md-2">
								<br>
								<label class="col-md-12"></label>
								<button class=" btn btn-success btn-add-u" id="0" type="button" title="Tambah uraian">
									<i class="glyphicon glyphicon-plus"></i>
								</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-12">
			<br>
			<br>
			<div class="col-md-2"> <button type="submit" class="btn btn-sm btn-success col-md-12">save</button></div>

			<div class="pull-right"><a href="<?php echo base_url('aplikasi/addjobdes/' . $this->uri->segment(4)) ?>" type="button" class="btn btn-xs btn-danger">Back</a></div>
		</div>
		<?= form_close() ?>
	</div>
</div>