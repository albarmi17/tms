<div class="row mt">
    <div class="col-lg-12">
        <?php echo form_open('aplikasi/info/' . $this->uri->segment(3)); ?>
        <div class="content-panel">
            <h4><?php echo $profile['nama_karyawan'] ?></h4>
            <section id="no-more-tables">
                <table class="table table-bordered table-striped table-condensed cf">
                    <thead class="cf">
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Jobdes</th>
                            <th>Uraian</th>
                            <th>Periode</th>
                            <th>Waktu</th>
                            <th>FTE</th>
                            <th>Frekuensi</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $tot = [];
                        foreach ($job as $j) { ?>

                            <tr>
                                <td rowspan=""><?php echo $no; ?></td>
                                <td rowspan=""><?php echo $j['tanggal']; ?></td>
                                <td rowspan=""><?php echo $j['jobdes']; ?>
                                <td rowspan=""></td>
                                <td rowspan=""></td>
                                <td rowspan=""></td>
                                <td rowspan=""></td>
                                <td rowspan=""></td>
                                <td rowspan=""></td>
                                

                                    <?php $total = 0;
                                    $totalFTE = 0;
                                    foreach ($aktivitas as $a) {
                                        if ($a['id_jobdes'] == $j['id_jobdes']) {
                                    ?>
                            <tr>
                                <td>
                                <td>
                                <td>
                                <td><?php echo $a['uraian'] ?></td>
                                <td><?php echo $a['periode'] ?></td>
                                <td><?php echo $a['waktu'] . ' menit' ?></td>
                                <td><?php $ex = explode("/", $a['periode']);
                                            $fte = $ex[1] * ($a['waktu'] / 60);
                                            echo number_format($fte, 2, '.', ',');
                                    ?></td>
                                <td><?php echo $a['frekuensi'] ?></td>
                                <td><?php echo number_format(($fte * $a['frekuensi']), 2, '.', ','); ?></td>
                                <?php
                                            $total += ($fte * $a['frekuensi']);
                                            array_push($tot, ($fte * $a['frekuensi']));
                                ?>
                            </tr>
                    <?php }
                                    }
                    ?>
                <?php $no++;
                        } ?></td>
                </tr>
                    </tbody>
                    <tr>
                        <td colspan="8">Total</td>
                        <td><?php echo number_format(array_sum($tot), 2, '. ', ', ') ?></td>
                    </tr>
                    <tr>
                        <td colspan="8">FTE Standard</td>
                        <td><?= number_format((array_sum($tot) / 1840), 4, '. ', ', '); ?></td>
                    </tr>
                </table>
                <?php if ($this->session->userdata('level') == 1) { ?>
                    <a href="<?php echo base_url('dashboard') ?>" type="button" class="btn btn-success">Back</a>
                    <a class="btn btn-warning" href="<?php echo base_url('admin/get_pdf_test/'.$this->uri->segment(3))?>"><i class="fa fa-print"></i> Cetak</a>
                <?php } else { ?>
                    <a href="<?php echo base_url('aplikasi/index') ?>" type="button" class="btn btn-success">Back</a>
                <?php } ?>
                
            </section>
        </div>
        <!-- /content-panel -->
    </div>
    <!-- /col-lg-12 -->
</div>