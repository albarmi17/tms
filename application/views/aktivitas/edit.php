<div class="row">
	<div class="col-md-12">
			<?php echo form_open('aplikasi/edit_aktivitas/'.$this->uri->segment(3).'/'.$this->uri->segment(4)); ?>
		<div id="addform">
			<div id="af1">
				<div id="adduraian0">
					<div id="uf0">
						<div class="form-row">
							<div class="form-group col-md-3">
								<label for="aktivitas" class="control-label"><span class="text-danger">*</span>Aktivitas</label>
								<input type="text" name="uraian" value="<?php echo ($this->input->post('uraian') ? $this->input->post('uraian') : $aktivitas['uraian']); ?>" class="form-control" id="uraian" />
							<span class="text-danger"><?php echo form_error('uraian'); ?></span>
							</div>
							<div class="form-group col-md-2">
								<label for="period" class="control-label"><span class="text-danger">*</span>Period</label>
								<select name="period" class="form-control">
									<option value="">Pilih Period</option>
									<?php 
									foreach ($period as $i) {
									$selected = ($i['name'].'/'.$i['value'] == $aktivitas['periode']) ? ' selected="selected"' : "";
									echo '<option value="' . $i['name'].'/'.$i['value'] . '"' . $selected . '>' . $i['name'] . '</option>';
								} ?>
								</select>
								<span class="text-danger"><?php echo form_error('period[]'); ?></span>
							</div>
							<div class="form-group col-md-2">
								<label for="waktu" class="control-label"><span class="text-danger">*</span>Waktu</label>
								<input type="text" name="waktu" value="<?php echo ($this->input->post('waktu') ? $this->input->post('waktu') : $aktivitas['waktu']); ?>" class="form-control" id="waktu" />
							<span class="text-danger"><?php echo form_error('waktu'); ?></span>
							</div>
							<div class="form-group col-md-3">
								<label for="frekuensi" class="control-label"><span class="text-danger">*</span>Frekuensi</label>
								<input type="text" name="frekuensi" value="<?php echo ($this->input->post('frekuensi') ? $this->input->post('frekuensi') : $aktivitas['frekuensi']); ?>" class="form-control" id="frekuensi" />
							<span class="text-danger"><?php echo form_error('frekuensi'); ?></span>
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