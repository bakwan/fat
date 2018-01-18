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
                <!-- /.box-header --></br>
                <!-- /.box-header --></br>
                   <?php foreach ($order as $o) { ?>
                    <table class="table table-striped table-bordered table-hover"> 
                    <tr><td><strong>Nama Pengadu </strong></td><td><?= $this->session->userdata('name') ?></td></tr>
                    <tr><td><strong>Nama Lokasi</strong></td><td><?= $o->nama_lokasi ?></td></tr>
                    <tr><td><strong>Nama Asset</strong></td><td><?= $o->nama_asset ?></td></tr>
                    <tr><td><strong>Keluhan</strong></td><td><?= $o->keluhan ?></td></tr>
                    <tr><td><strong>Image</strong></td><td><img src="<?php echo base_url().'upload/keluhan/'. $o->image?>" alt="150" width="350" height="400"/></td></tr>
                    <tr><td><strong>Waktu Lapor</strong></td><td><?php
                    if($o->waktu_lapor==NULL ){
                      echo "waktu lapor belum diperbaharui oleh admin";
                    }else{
                      echo $o->waktu_lapor;
                    }
                    ?></td></tr> 
                    <tr><td><strong>status</strong></td><td><?php  if ($o->status==1) {
                      Echo "MENUNGGU";
                    }elseif ($o->status==2) {
                      echo "Proses";
                    }elseif ($o->status==3) {
                      echo "SELESAI";
                    } ?></td></tr>
                    <tr><td><strong>Unit penanganan</strong></td><td><?php 
                    if($o->nama_unit==NULL ){
                      echo "waktu lapor belum diperbaharui oleh admin";
                    }else{
                      echo $o->nama_unit;
                    }
                    ?></td></tr>
                    <tr><td><strong>Perkembangan</strong></td><td><?php
                    if($o->perkembangan==NULL ){
                      echo "waktu lapor belum diperbaharui oleh admin";
                    }else{
                      echo $o->perkembangan;
                    } ?></td></tr>
                    <tr><td><strong>Hasil</strong></td><td><?php 
                    if($o->hasil==NULL ){
                      echo "Hasil dari pengaduan kerusakan sarpras belum diperbaharui oleh admin";
                    }else{
                      echo $o->hasil;
                    } ?></td></tr>
                    <tr><td><strong>Waktu selesai</strong></td><td><?= $o->waktu_selesai ?></td></tr>
                  </table>  
                
                <?php } ?>
                <?php echo anchor(site_url('Profile'), 'BACK', 'class="btn btn-danger btn-xl"'); ?>
                </div>
                </div>
            </div>
        </div>     
        
        </section><!-- /.content -->