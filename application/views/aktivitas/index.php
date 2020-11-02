<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="box-header">
                    <h3 class="box-title">Aktivitas Listing</h3>
                    <div id="notif">
                        <?= $this->session->flashdata('message'); ?>
                    </div>
                    <div class="box-tools">
                        <a href="<?php echo site_url('aktivitas/add'); ?>" class="btn btn-success btn-sm">Add</a>
                    </div>

                </div>
                <div class="box-body">
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th>Uraian</th>
                                <th>Periode</th>
                                <th>Waktu</th>
                                <th>Frekuensi</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <?php foreach ($aktivitas as $a) { ?>
                            <tr>
                                <td><?php echo $a['uraian']; ?></td>
                                <td><?php echo $a['periode'] == 'D' ? 'Daily' : ($a['periode'] == 'W' ? 'Weakly' : ($a['periode'] == 'M' ? 'Monthly' : 'Annualy')); ?></td>
                                <td><?php echo $a['waktu']; ?></td>
                                <td><?php echo $a['frekuensi']; ?></td>
                                <td>
                                    <a href="<?php echo site_url('aktivitas/edit/' . $a['id_aktivitas']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a>
                                    <a onclick="return myConfirm();" href="<?php echo site_url('aktivitas/remove/' . $a['id_aktivitas']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                                </td>
                            </tr>
                        <?php } ?>


                    </table>
                </div>
            </div>
        </div>
    </div>
</div>