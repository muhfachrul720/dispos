<div class="container-fluid">

    <?php if($this->session->flashdata('msg') == 1){?>
        <div class="alert alert-success" role="alert">
            Pengajuan Anda Berhasil Dikirim Silahkan Menunggu Verifikasi Dari Admin
        </div>
    <?php } else if($this->session->flashdata('msg') == 2) {?>
        <div class="alert alert-danger" role="alert">
            Pengajuan Anda Gagal Terkirim Silahkan Melakukan Pengajuan Ulang dan pastikan semua data telah terisi dengan benar
        </div>
    <?php };?>

    <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Form Ajukan Cuti</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Monitoring</a>
    </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active mb-4" style="font-size:14px" id="home" role="tabpanel" aria-labelledby="home-tab">

            <div class="card border border-top-0">
                <div class="card-body px-5 pt-5 pb-4">
                    <h2>Form Ajukan Cuti</h2>
                    <p>Silahkan Mengisi Form dengan lengkap dengan data yang benar <br> Keterangan N = Tahun Ini , N-1 = Tahun Sebelumnya, dan N-2 = 2 Tahun Sebelumnya</p>
                </div>
            </div>

            <?= form_open('dashboard_p/create_ajuan_pensiun')?>

            <div class="card border mt-3">
                <div class="card-body px-5">
                    <h4 class="card-title">Data Pegawai</h4>
                    <hr>
                    <div class="row">
                        <div class="col">
                            <div class="row form-group">
                                <div class="col">
                                    <div class="row">
                                        <div class="col-4 pt-1">Nama : </div>
                                        <div class="col">
                                            <input type="text" readonly name="name" class="form-control form-control-sm" value="<?= $nama_tanpa_gelar_peg?>">
                                            <?php echo form_error('name') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="row">
                                        <div class="col-4 pt-1">Nip : </div>
                                        <div class="col">
                                            <input type="text" readonly name="nip" class="form-control form-control-sm" value="<?= $nip_peg?>">
                                            <?php echo form_error('nip') ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col">
                                    <div class="row">
                                        <div class="col-4 pt-1">Jabatan : </div>
                                        <div class="col">
                                            <input type="text" readonly class="form-control form-control-sm" value="-">
                                            <!-- <?php // echo form_error('jab') ?> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="row">   
                                        <div class="col-4 pt-1">Masa Kerja : </div>
                                        <div class="col-5">
                                            <input type="text" readonly name="maker" class="form-control form-control-sm" value="<?= $thn_masa_kerja_pensiun_peg?>">
                                            <?php echo form_error('maker') ?>
                                        </div>
                                        <div class="col pt-1">Tahun</div>
                                    </div>
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-2 pt-1">Unit Kerja</div>
                                <div class="col">
                                    <input type="text" readonly name="uker" class="form-control form-control-sm" value="<?= $program_studi_uker?>">
                                    <?php echo form_error('uker') ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card border mt-3">
                <div class="card-body px-5">
                    <h4 class="card-title">Jenis Cuti</h4>
                    <hr>
                    <div class="row">
                        <div class="col-6 my-auto">
                            <?php echo form_dropdown('jeniscuti', array(1 => 'Cuti Besar', 2 => 'Cuti Tahunan', 3 => 'Cuti Sakit', 4 => 'Cuti Melahirkan', 5 => 'Cuti Karena Alasan Penting', 6 => 'Cuti Di luar Tanggungan Negara'), '', array('class' => 'form-control form-control-sm', 'id' => 'thnTrigger')); ?>
                        </div>

                        <script>
                            $('#thnTrigger').on('change', function(){
                                var val = $(this).val();
                                $('.optThn').prop("disabled", true);
                                if(val == 2){
                                    $('.optThn').prop("disabled", false);
                                }
                            });
                        </script>

                        <div class="col-2 my-auto" style="text-align:center">Tahun :</div>
                        <div class="col my-auto">
                            <div class="pr-5" style="display:inline">
                                <input class="form-check-input optThn" disabled type="radio" name="thncuti" id="exampleRadios1" value="1">
                                <label class="form-check-label" for="exampleRadios1">
                                    N 
                                </label>
                            </div>
                            <div class="pr-5" style="display:inline">
                                <input class="form-check-input optThn" disabled type="radio" name="thncuti" id="exampleRadios1" value="2">
                                <label class="form-check-label" for="exampleRadios1">
                                    N-1 
                                </label>
                            </div>
                            <div class="pr-5" style="display:inline">
                                <input class="form-check-input optThn" disabled type="radio" name="thncuti" id="exampleRadios1" value="3">
                                <label class="form-check-label" for="exampleRadios1">
                                    N-2 
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card border mt-3">
                <div class="card-body px-5">
                    <h4 class="card-title">Alasan Cuti</h4>
                    <hr>
                    <div class="row">
                        <div class="col">
                            <textarea name="alasancuti" id="" cols="30" rows="5" class="form-control form-control-sm"></textarea> 
                            <?php echo form_error('alasancuti') ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card border mt-3">
                <div class="card-body px-5">
                    <h4 class="card-title">Lamanya Cuti</h4>
                    <hr>
                    <div class="row">
                        <div class="col">
                              <div class="row">
                                <div class="col">
                                    <div class="row">
                                        <div class="col-4 pt-1">Mulai : </div>
                                        <div class="col">
                                            <input type="date" name="startdate" class="form-control form-control-sm">
                                            <?php echo form_error('startdate') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="row">
                                        <div class="col-4 pt-1">Berakhir : </div>
                                        <div class="col">
                                            <input type="date" name="enddate" class="form-control form-control-sm">
                                            <?php echo form_error('enddate') ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card border mt-3">
                <div class="card-body px-5">
                    <h4 class="card-title">Alamat Cuti</h4>
                    <hr>
                    <div class="row">
                        <div class="col">
                            <div class="row form-group">
                                <div class="col-4 pt-1">Alamat Selama Menjalankan Cuti : </div>
                                <div class="col">
                                    <textarea class="form-control form-control-sm" name="addresscuti" id="" cols="30" rows="3"></textarea>
                                    <?php echo form_error('addresscuti') ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4 pt-1">Telepon Selama Menjalankan Cuti : </div>
                                <div class="col">
                                    <input type="text" name="phonecuti" class="form-control form-control-sm">
                                    <?php echo form_error('phonecuti') ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card border mt-3">
                <div class="card-body px-5">
                    <div class="row">
                        <div class="col" style="font-weight:bold"><button type="submit" class="btn btn-success w-100">Ajukan</button></div>
                        <div class="col pt-2">Dengan ini Saya setuju mengajukan Cuti</div>
                    </div>
                </div>
            </div>

            <?= form_close()?>

        </div>

        <div class="tab-pane fade border border-top-0 p-5" style="background-color:white; font-size:14px" id="contact" role="tabpanel" aria-labelledby="contact-tab">
            <div class="header mb-3">
                <h3 class="mb-2">Monitoring Pengajuan </h3>
                <p>Melihat Pengajuan Pengajuan yang telah diajukan bersama keterangan apabila di tolak</p>
            </div>
            <hr>
            <div class="body">
                <div class="table-responsive">
                <table id="example" style="font-size:12px; width:100%" class="table table-striped table-bordered table-sm text-center" style="width:100%">
                    <thead>
                    <tr>
                        <th width="40px">No</th>
                        <th>Waktu</th>
                        <th>Keterangan</th>
                        <th>Diverifikasi Oleh</th>
                        <th>Status</th>
                        <th>Download</th>
                    </tr>
                    </thead>
                </table>
                </div>

                <script type="text/javascript"> 
                    $(document).ready(function() {
                        $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
                        {
                            return {
                                "iStart": oSettings._iDisplayStart,
                                "iEnd": oSettings.fnDisplayEnd(),
                                "iLength": oSettings._iDisplayLength,
                                "iTotal": oSettings.fnRecordsTotal(),
                                "iFilteredTotal": oSettings.fnRecordsDisplay(),
                                "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                                "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
                            };
                        };
                        
                        // Netral
                        var t = $("#example").dataTable({
                            initComplete: function() {
                                var api = this.api();
                                $('#mytable_filter input')
                                        .off('.DT')
                                        .on('keyup.DT', function(e) {
                                            if (e.keyCode == 13) {
                                                api.search(this.value).draw();
                                    }
                                });
                            },
                            oLanguage: {
                                sProcessing: "loading..."
                            },
                            processing: true,
                            serverSide: true,
                            ajax: {"url": '<?= base_url()?>dashboard_p/json_cuti_individual', "type": "POST", data : {'id' : <?= $this->session->userdata('id_pegawai')?>}},
                            columns: [
                                {"data" : 'waktu_pengajuan_cuti', orderable:false},
                                {"data" : 'waktu_pengajuan_cuti'},
                                {"data" : 'keterangan_pengajuan_cuti'},
                                {"data" : 'username'},
                                {
                                    "data" : 'status_cuti',
                                    "render" : function(data, type, row){
                                        if(data == 1){
                                            return '<span style="font-size:12px" class="badge badge-success">Telah Diperiksa</span>';
                                        }else {
                                            return '<span style="font-size:12px" class="badge badge-danger">Ditolak</span>';
                                        };
                                    }
                                },
                                {
                                    "data" : 'id_pengajuan_cuti',
                                    "render" : function(data, type, row){
                                        if(row.status_cuti == 1){
                                            return '<a href="<?= base_url()?>dashboard_p/print_pdf_cuti/'+data+'" style="font-size:12px" class="btn py-0 btn-sm btn-info">Download</a>';
                                        }else {
                                            return '';
                                        };
                                    }
                                },
                            ],
                            order: [[0, 'asc']],
                            rowCallback: function(row, data, iDisplayIndex) {
                                var info = this.fnPagingInfo();
                                var page = info.iPage;
                                var length = info.iLength;
                                var index = page * length + (iDisplayIndex + 1);
                                $('td:eq(0)', row).html(index);
                            }
                            }); 
                    });
                </script>
                <script>
                    $(document).ready(function() {
                        $('#example').DataTable();
                    } );
                </script>

            </div>
        </div>
    </div>

</div>
