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
                      <b>Teman</b> <a class="pull-right"></a>
                    </li>
                    <li class="list-group-item">
                      <b>Nomor Telepon</b> <a class="pull-right"><?php echo '' .$this->session->userdata('phone');?></a>
                    </li>
                    <li class="list-group-item">
                      <b>Email</b> <a class="pull-right"><?php echo '' .$this->session->userdata('email');?></a>
                    </li>
                  </ul>
                  <a href="<?php echo base_url('Profile/Update_profile'); ?>" class="btn btn-primary btn-block"><b>Edit Profile</b></a>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
              <!-- About Me Box -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">About Me</h3>
                </div><!-- /.box-header -->
              </div><!-- /.box -->
            </div><!-- /.col -->
            <!--  -->
            <div class="col-md-9">
              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title"><strong>Detail pengajuan Perbaikan Kerusakan Sarpras</strong></h3>
               
                   <?php foreach ($konsumsi as $o) { ?>
                    <table class="table table-striped table-bordered table-hover"> 
                    <tr><td>Nama Pemesan</td><td><?= $this->session->userdata('name') ?></td></tr>
                    <tr><td>Lokasi pengiriman</td><td><?= $o->nama_lokasi ?></td></tr>
                    <tr><td>Keperluan<td><?= $o->keperluan ?></td></tr>
                    <tr><td>Jumlah snack <td><?= $o->jumlah ?></td></tr>
                    <tr><td>Jenis<td><?php 
                        if ($o->jenis==0) {
                          echo "Makanan kecil";
                        }else {
                          echo "Makanan Besar";
                        }
                     ?></td></tr>
                    <tr><td>Waktu pengiriman</td><td><?= $o->waktu_kirim ?></td></tr>
                    <tr><td>Nama pengirim</td><td><?= $o->nama ?></td></tr>
                    <tr><td>No telp pengirim</td><td><?= $o->no_telp ?></td></tr>
                    <tr><td>status</td><td><?php  if ($o->status==1) {
                      Echo "MENUNGGU";
                    }elseif ($o->status==2) {
                      echo "PROSES";
                    }elseif ($o->status==3) {
                      echo "DIKIRIM";
                    } ?></td></tr>
                  </table>
                <?php } ?>
                <?php echo anchor(site_url('Profile'), 'BACK', 'class="btn btn-danger btn-sm"'); ?>
                </div>
                </div>
            </div>
        </div>     
        </section><!-- /.content -->