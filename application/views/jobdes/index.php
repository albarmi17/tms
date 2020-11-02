<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="box-header">
                    <h3 class="box-title">Jobdes</h3>
                    <div id="notif">
                        <?= $this->session->flashdata('message'); ?>
                    </div>
                    <div class="box-tools">
                        <a href="<?php echo site_url('jobdes/add'); ?>" class="btn btn-success btn-sm">Add</a>
                    </div>

                </div>
                <div class="box-body">
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th>Jobdes</th>
                                <th>User</th>
                                <th>Profile</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <?php foreach ($jobdes as $j) { ?>
                            <tr>
                                <td><?php echo $j['jobdes']; ?></td>
                                <td><?php echo $j['username']; ?></td>
                                <td><?php echo $j['nama_karyawan']; ?></td>
                                <td>
                                    <a href="<?php echo site_url('jobdes/edit/' . $j['id_jobdes']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a>
                                    <a onclick="return myConfirm();" href="<?php echo site_url('jobdes/remove/' . $j['id_jobdes']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                                </td>
                            </tr>
                        <?php } ?>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>