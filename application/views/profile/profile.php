  <script src="<?php echo base_url()?>template/AdminLTE/plugins/jQuery/jQuery-2.1.4.min.js"></script>
   <!--summnernote-->
  <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.css" rel="stylesheet">
  <?php if ($this->session->userdata('message')): ?>
    <div class="box-body">
      <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <?php echo $this->session->userdata('message'); ?>
      </div>
    </div>    
  <?php endif; ?>
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
          </h1>
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-3">
              <!-- Profile Image -->
              <div class="box box-primary">
                <div class="box-body box-profile">
                  <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url() ?>template/AdminLTE/dist/img/avatar5.png" alt="User profile picture">
                  <h3 class="profile-username text-center"><?php echo '' .$this->session->userdata('nama_lengkap');?></h3>
                  <p class="text-muted text-center"><?php echo '' .$this->session->userdata('pekerjaan');?></p>
                  <ul class="list-group list-group-unbordered">
                  <li class="list-group-item">
                    <b>Your Name</b> <a class="pull-right"><?php echo '' .$this->session->userdata('name');?></a>
                    </li>  
                  <li class="list-group-item">
                    <b>address</b> <a class="pull-right"><?php echo '' .$this->session->userdata('address');?></a>
                    </li>
                    <li class="list-group-item">
                      <b>Nomor Telepon</b> <a class="pull-right"><?php echo '' .$this->session->userdata('phone');?></a>
                    </li>
                    <li class="list-group-item">
                      <b>Email</b> <a class="pull-right"><?php echo '' .$this->session->userdata('email');?></a>
                    </li>
                  </ul>
                  <a href="<?php echo base_url('Profile/Update_profile'); ?>" class="btn btn-primary btn-block"><b>Your Profile</b></a>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
            <div class="col-md-9">
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#activity" data-toggle="tab"><strong>Pengaduan Sarpras</strong></a></li>
                  <li><a href="#settings" data-toggle="tab"><strong>Pengaduan Konsumsi</strong></a></li>
                </ul>
                <div class="tab-content">
                  <div class="active tab-pane" id="activity"></br>
                   <table class="table table-striped table-bordered table-hover" id="mytable">
                            <thead>
                                <tr>
                            <th width="10px">No</th>
                            <th>Lokasi</th>
                            <th>Jenis Kerusakan</th>
                            <th>Waktu Pelaporan</th>
                            <th>Status</th>
                            <th>Konfirmasi</th>
                            <th>Perkembangan</th>
                            <th>Petugas</th>                            
                            <th>Action</th>
                                </tr>
                            </thead>
                        <tbody>
                        <?php
                        $start = 0;
                        foreach ($pengaduan as $adu)
                        {
                            ?>
                        <tr>
                        <td><?php echo ++$start ?></td>
                        <td><?php echo $adu->nama_lokasi ?></td>
                        <td><?php echo $adu->nama_asset ?></td>
                        <td><?php echo $adu->waktu_lapor ?></td>
                        <td><?php if($adu->status==1){
                          echo "MENUNGGU";
                        }elseif($adu->status==2){echo "PROSES";}
                        elseif($adu->status==3){echo "SELESAI";} ?>
                        </td>
                        <td>
                        <a href="#StatusPopUp<?php echo $adu->id?>"  data-toggle="modal" class="btn btn-primary btn-xs">
                            <?php if($adu->Confirmation_member==1){
                                  echo "BELUM";
                                }elseif($adu->Confirmation_member==2){echo "SUDAH";}?></a>
                    </td>
                        <td><?= $adu->perkembangan ?></td>
                        <td><?= $adu->nama_unit ?></td>
                        <td style="text-align:center" width="90px">
                        <?php 
                        echo anchor(site_url('Profile/Cetak_keluhan/'.$adu->id),'<img src="'.base_url().'font/pdf.png'.'">',array('title'=>'Cetak')); 
                        echo ' | '; 
                        echo anchor(site_url('Profile/detail/'.$adu->id),'<img src="'.base_url().'font/Edit.png'.'">',array('title'=>'edit')); 
                        ?>
                        </td>
                        </tr>
                           <?php
                        }
                        ?>
                        </tbody>
                    </table>   
                   </div>

                  <div class=" tab-pane" id="settings"</<br>
                    <table class="table table-striped table-bordered table-hover" id="mytable1">
                            <thead>
                                <tr>
                             <th width="20px">No</th>
                            <th>Keperluan</th>
                            <th>Lokasi</th>
                            <th>jenis</th>
                            <th>Jumlah</th>
                            <th>Waktu</th>
                            <th>Status</th>
                            <th>Dibuat Pada</th>
                            <th>Action</th>
                                </tr>
                            </thead>
                        <tbody>
                        <?php
                      $start = 0;
                      foreach ($konsumsi as $konsum)
                      {
                          ?>
                        <tr>
                        <td><?php echo ++$start ?></td>
                        <td><?php echo $konsum->keperluan ?></td> 
                        <td><?php echo $konsum->nama_lokasi ?></td>
                        <td><?php if ($konsum->jenis==0) {
                          echo "Makanan Kecil";
                        }else {
                          echo "Makanan Besar";
                        } ?></td>
                        <td><?php echo $konsum->jumlah ?></td>
                        <td><?php echo $konsum->waktu_kirim ?></td>
                        <td><?php if($konsum->status==1){
                          echo "PROSES";
                        }elseif($konsum->status==0){echo "MENUNGGU";}
                        elseif($konsum->status==2){echo "SELESAI";} ?></td>
                        <td><?= $konsum->create_at ?></td>
                        <td style="text-align:center" width="90px">
                        <?php 
                        echo anchor(site_url('Profile/cetak_konsumsi/'.$konsum->id),'<img src="'.base_url().'font/pdf.png'.'">',array('title'=>'cetak')); 
                        echo ' | '; 
                        echo anchor(site_url('Profile/konsum/'.$konsum->id),'<img src="'.base_url().'font/Edit.png'.'">',array('title'=>'edit')); 
                        ?>
                        </td>
                        </tr>
                        </tr>
                          <?php
                      }
                      ?>
                        </tbody>
                    </table>   
                  </div><!-- /.tab-pane -->
                </div><!-- /.tab-content -->
              </div><!-- /.nav-tabs-custom -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <div id="StatusPopUp<?php echo $adu->id?>" class="modal" tabindex="-1" role="basic" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog">
                                <form action="<?php echo base_url('Profile/UpdateKonfirmasi/'.$adu->id) ?>" method="POST">
                                 <input type="hidden" name="id" value="<?php echo $adu->id?>"/>
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Edit Status</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    </div>
                                    <div class="modal-body"> 
                                        <div class="form-group">
                                            <label for="int">Edit Konfirmasi </label>
                                            <?php
                                            $Confirmation_member=array(1=>'BELUM',2=>'SUDAH');
                                            echo form_dropdown('Confirmation_member',$Confirmation_member,$adu->Confirmation_member,"class='form-control'");
                                            ?>
                                        </div>
                                    <div>
                                </div>
                                <div class="">
                                        <button class="btn btn-primary" type="button" data-dismiss="modal">Close</button>
                                        <button class="btn btn-success" type="submit">Save</button>
                                </div>
                                </form>    
                            </div>
                        </div>
                    </div> 
 <script src="<?php echo base_url('AdminLTE/plugin/datatables/dataTables.bootstrap.js') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#mytable").dataTable({
                "dom": 'lTfigt',
                "scrollX":true,
                pageLength: 25,
                responsive: true,});
                
            });
            $(document).ready(function () {
                $("#mytable1").dataTable({
                "dom": 'lTfigt',
                pageLength: 25,
                responsive: true,});
            });
        </script>
        <script>
        $(document).ready(function() {
            $('#comment').summernote({
            lang: 'id-ID' // default: 'en-US'
        });
        });
        </script>