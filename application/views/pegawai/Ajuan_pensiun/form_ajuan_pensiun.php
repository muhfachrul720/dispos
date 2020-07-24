<div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Ajukan Pensiunan</h6>
        </div>
        <div class="card-body">
            <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="input1"><small>Masukkan Inputan</small></label>
                    <input id="input1" class="form-control" type="text" name="input1" value="<?= $input1?>">
                </div>
                <div class="form-group">
                    <label for=""><small>Masukkan Inputan</small></label>
                    <input class="form-control" type="text" name="input2">
                </div>
                <div class="form-group">
                    <label for=""><small>lampirkan File : </small></label>
                    <input type="file" name="input1">
                </div>
                <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
                <button value="save" name="submit" type="submit" class="btn btn-danger"><?php echo $button ?></button> 
                <a href="<?= base_url('dashboard_p/ajuan_pensiun') ?>" class="btn btn-info">Kembali</a></td></tr>
            </form> 

            <!-- optional -->
             <!-- </tr>
                        <td width='200'>Level User <?php echo form_error('id_user_level') ?></td>
                        <td>
                        <?php echo cmb_dinamis('id_user_level', 'tbl_user_level', 'nama_level', 'id_user_level', $id_user_level,'DESC') ?>
                        </td>
                    </tr> -->
