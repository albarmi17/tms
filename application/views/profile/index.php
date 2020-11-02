
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="box-header">
                    <h3 class="box-title">Profile</h3>
                	<div id="notif">
                      <?= $this->session->flashdata('message'); ?>
                      </div>
                    <div class="box-tools">
                        <a href="<?php echo site_url('profile/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                    </div>
                    
                </div>
            <div class="box-body">
                <table class="table">
                    <thead class="thead-light">
                    <tr>
						<th>Nama Karyawan</th>
						<th>Departemen Karyawan</th>
						<th>Posisi Karyawan</th>
						<th>Actions</th>
                    </tr>
                    </thead>
                    <?php foreach($profile as $p){ ?>
                    <tr>
						<td><?php echo $p['nama_karyawan']; ?></td>
						<td><?php echo $p['departemen_karyawan']; ?></td>
						<td><?php echo $p['posisi_karyawan']; ?></td>
						<td>
                            <a href="<?php echo site_url('profile/edit/'.$p['id_profile']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            
                            <a onclick="return myConfirm();" href="<?php echo site_url('profile/remove/'.$p['id_profile']); ?>" class="btn btn-danger btn-xs "><span class="fa fa-trash"></span> Delete</a>


    

                        </td>
                    </tr>
                    <?php } ?>
                </table>
                </div>               
            </div>
        </div>
    </div>
</div>
