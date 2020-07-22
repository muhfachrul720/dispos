<div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit DUK Pegawai</h6>
        </div>
        <div class="card-body">
            <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">

                <table class='table table-bordered'>        

                    <tr>
                        <td width='200'>Nama Lengkap <?php echo form_error('full_name') ?></td><td><input type="text" class="form-control" name="name" id="name" placeholder="Masukkan Nama Lengkap" value="<?= $name ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td width='200'>Telepon <?php echo form_error('telepon') ?></td><td><input type="text" class="form-control" name="telepon" id="telepon" placeholder="Masukkan Telepon" value="<?= $telepon ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td width='200'>Alamat <?php echo form_error('alamat') ?></td><td><input type="text" class="form-control" name="alamat" id="alamat" placeholder="Masukkan Alamat" value="<?= $alamat ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td width='200'>Kewarganegaraan <?php echo form_error('kewarganegaraan') ?></td><td><input type="text" class="form-control" name="kewarganegaraan" id="kewarganegaraan" placeholder="Masukkan Kewarganegaraan" value="<?= $kewarganegaraan ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td width='200'>Tempat Lahir <?php echo form_error('birthplace') ?></td><td><input type="text" class="form-control" name="birthplace" id="birthplace" placeholder="Masukkan Tempat Lahir" value="<?= $tempat_lahir ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td width='200'>Tangga Lahir <?php echo form_error('birthdate') ?></td><td><input type="date" class="form-control" name="birthdate" id="birthdate" placeholder="Masukkan Tanggal Lahir" value="<?= $tanggal_lahir ?>" />
                        </td>
                    </tr>
                    <tr>
                    <tr>
                        <td width='200'>Jenis Kelamin <?php echo form_error('gender') ?></td>
                        <td>
                            <?php echo form_dropdown('gender', array('1' => 'Laki Laki', '2' => 'Perempuan'), $jenis_kelamin, array('class' => 'form-control')); ?>
                        </td>
                    </tr>
                    <tr>
                        <td width='200'>Status Perkawinan <?php echo form_error('married') ?></td>
                        <td>
                            <?php echo form_dropdown('married', array('1' => 'Kawin', '2' => 'Belum Kawin'), $status_kawin, array('class' => 'form-control')); ?>
                        </td>
                    </tr>
                    <tr>
                        <td width='200'>Agama <?php echo form_error('religion') ?></td>
                        <td>
                            <?php echo form_dropdown('religion', array('1' => 'Islam', '2' => 'Katolik', '3' => 'Protestan', '4' => 'Hindu', '5' => 'Buddha'), $agama, array('class' => 'form-control')); ?>
                        </td>
                    <tr>
                        <td width='200'>Foto Profile <?php echo form_error('images') ?>
                        </td>
                        <td>
                            <input type="file" name="images">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            
                        </td>
                        <td>
                            <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
                            <button value="save" name="submit" type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
                            <a href="<?= base_url('dashboard_p') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
                </table>
            </form> 

            <!-- optional -->
             <!-- </tr>
                        <td width='200'>Level User <?php echo form_error('id_user_level') ?></td>
                        <td>
                        <?php echo cmb_dinamis('id_user_level', 'tbl_user_level', 'nama_level', 'id_user_level', $id_user_level,'DESC') ?>
                        </td>
                    </tr> -->
