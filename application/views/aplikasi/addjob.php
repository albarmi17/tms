<div class="row">
	<div class="col-md-12">
		<div class="col-md-12">
			<div class="row mt">
				<div class="col-md-12">
					<div class="content-panel">
						<h4><?php echo $profile['nama_karyawan'] ?></h4>
						<h4><?php echo $profile['departemen_karyawan'] ?></h4>
						<h4><?php echo $profile['posisi_karyawan'] ?></h4>
						<table class="table table-striped table-advance table-hover">
							<thead>
								<tr>
									<th><i class="fa fa-bullhorn"></i> Jobdes</th>
									<th><i class=" fa fa-edit"></i> Actions</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($jobdes  as $j) { ?>
									<tr>
										<td>
											<a><?php echo $j['jobdes'] ?></a>
										</td>
										<td>
											<a href="<?php echo base_url('aplikasi/edit/' . $j['id_jobdes'] . '/' . $j['id_profile']) ?>" class="btn btn-success btn-xs"><i class="fa fa-pencil"></i></a>

											<a data-toggle="modal" data-target="#exampleModal<?php echo $j['id_jobdes'] ?>" class="btn btn-primary btn-xs"><span class="fa fa-eye"></span></a>
											<div class="modal fade" id="exampleModal<?php echo $j['id_jobdes'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
												<div class="modal-dialog" role="document">
													<div class="modal-content">
														<div class="modal-header">
															<h3 class="modal-title" id="exampleModalLabel">Jobdes : <?php echo $j['jobdes'] ?></h3>
														</div>
														<div class="modal-body">
															<table class="tablen table-bordered table-striped table-condensed">
																<thead>
																	<tr>
																		<th>Uraian</th>
																		<th>Period</th>
																		<th>Waktu</th>
																		<th>Frekuensi</th>
																		<th>Actions</th>
																	</tr>
																</thead>
																<tbody>
																	<?php
																	foreach ($aktivitas as $a) {
																		if ($a['id_jobdes'] == $j['id_jobdes']) {
																	?>
																			<tr>
																				<td><?php echo $a['uraian'] ?></td>
																				<td><?php echo $a['periode'] ?></td>
																				<td><?php echo $a['waktu'] ?></td>
																				<td><?php echo $a['frekuensi'] ?></td>
																				<td>
																					<a href="<?php echo base_url('aplikasi/edit_aktivitas/' . $a['id_aktivitas']. '/'. $this->uri->segment(3)) ?>" type="button" class="btn btn-xs btn-warning">Edit</a>
																				</td>
																		<?php }
																	} ?>
																</tbody>
																<div>
																	<a href="<?php echo base_url('aplikasi/add_aktivitas/' . $j['id_jobdes']) . '/' . $this->uri->segment(3) ?>" type="button" class="btn btn-xs btn-success">Tambah Uraian</a>
																</div>
															</table>
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
														</div>
													</div>
												</div>
											</div>
											<a onclick="return myConfirm();" href="<?php echo base_url('aplikasi/remove/' . $j['id_jobdes'] . '/' . $j['id_profile']) ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></a>
										</td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

		<div class="col-md-12">
			<br>
			<button class="btn btn-info btn-small" id="addjob" type="button">Tambah jobdes</button>
		</div>
		<?php echo form_open('aplikasi/addjobdes/' . $this->uri->segment(3)); ?>
		<div id="addform">
			<div id="af1">
				<div class="form-row">
					<div class="form-group col-md-12">
						<label for="jobdes" class="control-label"><span class="text-danger">*</span>Jobdes</label>
						<input type="text" name="jobdes[]" class="form-control" id="jobdes" />
						<span class="text-danger"><?php echo form_error('jobdes'); ?></span>
					</div>

				</div>
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
								<span class="text-danger"><?php echo form_error('period'); ?></span>
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
			<div class="col-md-2"> <button type="submit" class="btn btn-sm btn-success col-md-12">Simpan</button></div>
			<div class="col-md-2"><a href="<?php echo base_url('aplikasi/selesai/' . $this->uri->segment(3)) ?>" class="btn btn-sm btn-primary col-md-12">Selesai</a></div>
			<div class="pull-right"><a href="<?php echo base_url('aplikasi/index') ?>" type="button" class="btn btn-xs btn-danger">Back</a></div>
		</div>
		<?= form_close() ?>
	</div>
</div>