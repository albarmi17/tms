<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="box-header">
                    <h3 class="box-title">Dashboard</h3>

                </div>
                <div class="box-body">
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th>Nama Karyawan</th>
                                <th>Departemen Karyawan</th>
                                <th>Posisi Karyawan</th>
                                <th>Tanggal</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <?php foreach ($profile as $p) { ?>
                            <tr>
                                <td><?php echo $p['nama_karyawan']; ?></td>
                                <td><?php echo $p['departemen_karyawan']; ?></td>
                                <td><?php echo $p['posisi_karyawan']; ?></td>
                                <td><?php echo $p['tanggal']; ?></td>
                                <td>
                                    <?php if ($this->session->userdata('level') != 1) { ?>
                                        <a href="<?php echo site_url('aplikasi/info/') . $p['id_profile']; ?>" class="btn btn-info btn-xs"><span class="fa fa-info"></span></a>
                                        <?php if ($p['tanggal'] == date('Y-m-d') && $p['status'] == 1) { ?>
                                            <a href="<?php echo site_url('aplikasi/addjobdes/' . $p['id_profile']); ?>" class="btn btn-success btn-xs"><span class="fa fa-pen"></span>Add Jobdes</a>
                                        <?php }
                                    } else { ?>
                                        <a href="<?php echo site_url('aplikasi/infoadmin/') . $p['id_profile']; ?>" class="btn btn-info btn-xs"><span class="fa fa-info"></span></a>
                                        <a class="btn btn-xs <?php echo $p['status'] == 1 ? 'btn-danger' : 'btn-success'; ?>"><?php echo $p['status'] == 1 ? 'Belum Selesai' : 'Selesai'; ?></a>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>