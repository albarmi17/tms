<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="box-header">
                    <h3 class="box-title">Jadwal</h3>
                    <div id="notif">
                        <?= $this->session->flashdata('message'); ?>
                    </div>
                    <div class="box-tools">
                        <a href="<?php echo site_url('jadwal/add'); ?>" class="btn btn-success btn-sm">Add</a>
                    </div>

                </div>
                <div class="box-body">
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th>Profile</th>
                                <th>User</th>
                                <th>Status</th>
                                <th>Tanggal</th>
                                <th>Actions</th>
                            </tr>
                            <?php foreach ($jadwal as $j) { ?>
                                <tr>

                                    <td><?php echo $j['nama_karyawan']; ?></td>
                                    <td><?php echo $j['username']; ?></td>
                                    <td><?php echo $j['status'] == 1 ? 'Belum Selesai' : 'Selesai' ?></td>
                                    <td><?php echo $j['tanggal']; ?></td>
                                    <td>
                                        <a href="<?php echo site_url('jadwal/edit/' . $j['id_jadwal']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a>
                                        <a onclick="return myConfirm();" href="<?php echo site_url('jadwal/remove/' . $j['id_jadwal']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                                    </td>
                                </tr>
                            <?php } ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>