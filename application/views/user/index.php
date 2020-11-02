<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="box-header">
                    <h3 class="box-title">User</h3>
                    <div id="notif">
                        <?= $this->session->flashdata('message'); ?>
                    </div>

                    <div class="box-tools">
                        <a href="<?php echo site_url('user/add'); ?>" class="btn btn-success btn-sm">Add</a>
                    </div>

                </div>
                <div class="box-body">
                    <table class="table table-striped">
                        <thead class="thead-light">
                            <tr>
                                <th>Level</th>
                                <th>Username</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <?php foreach ($user as $u) { ?>
                            <tr>

                                <td><?php echo $u['level'] == 1 ? 'Admin' : 'User'  ?></td>
                                <td><?php echo $u['username']; ?></td>
                                <td>
                                    <a href="<?php echo site_url('user/edit/' . $u['id_user']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a>
                                    <a onclick="return myConfirm();" href="<?php echo site_url('user/remove/' . $u['id_user']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>