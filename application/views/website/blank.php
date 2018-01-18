  <script src="<?php echo base_url()?>template/AdminLTE/plugins/jQuery/jQuery-2.1.4.min.js"></script>
   <!--summnernote-->
  <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.css" rel="stylesheet">
<script>
  $(function(){

   $("#save").click(function(){
      var lokasi = $("#lokasi").val();
      var keluhan = $("#keluhan").val();

      if(lokasi ==""){
        alert ("Masukkan lokasi yang terjadi kerusakan");
        return false;
      }else if (keluhan ==""){
        alert("masukkan keluhan atau kerusakan dari sarpras");
        return false;
      }else{
          $.ajax({
            url:"<?php echo site_url('Home/Create_Pengaduan');?>",
            type:"POST",
            data:"keluhan="+keluhan+"&lokasi="+lokasi,
             cache:false,
                    success:function(html){
                        alert("Transaksi Peminjaman berhasil");
                        location.reload("<?php echo site_url('Profile');?>");
                    }
          })
      } 
    })
  })
</script> 
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
                  <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url() ?>template/AdminLTE/dist/img/user4-128x128.jpg" alt="User profile picture">
                  <h3 class="profile-username text-center"><?php echo '' .$this->session->userdata('nama_lengkap');?></h3>
                  <p class="text-muted text-center"><?php echo '' .$this->session->userdata('pekerjaan');?></p>

                  <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                      <b>Teman</b> <a class="pull-right">1,322</a>
                    </li>
                    <li class="list-group-item">
                      <b>Nomor Telepon</b> <a class="pull-right"><?php echo '' .$this->session->userdata('no_telp');?></a>
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
            
            <div class="col-md-9">
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#activity" data-toggle="tab"><strong>Pengaduan Sarpras</strong></a></li>
                  <li><a href="#settings" data-toggle="tab"><strong>Pengaduan Konsumsi</strong></a></li>
                  
                </ul>
                <div class="tab-content">
                  <div class="active tab-pane" id="activity"></br>
                  <form class="form-horizontal" action="<?php echo site_url('Home/Create_keluhan');?>" method="post">
                        <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">Lokasi</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="lokasi" id="lokasi" >
                        	<?php echo form_error('lokasi') ?>
                        </div></br></br></br></br>
                      <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">Keluhan</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" name="keluhan" id="keluhan"></textarea>
                          <?php echo form_error('lokasi') ?>
                        </div>
                      </div></br></br>
                      </div><br>
                  </form>
                  <button class="btn btn-primary" id="save">Kirim</button><br /> <br />
                </div>
                  <div class="tab-pane" id="settings">
                   <form class="form-horizontal" action="<?php echo site_url('Home/Create_konsumsi');?>" method="post">
                      <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">Lokasi</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="lokasi" id="lokasi" placeholder="masukkan lokasi pengiriman snack" >
                        	<?php echo form_error('lokasi') ?>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputEmail" class="col-sm-2 control-label">Waktu</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="waktu"  id="waktu" placeholder="Waktu acara">
                        <?php echo form_error('waktu') ?>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">jenis</label>
                        <div class="col-sm-10">
                        <select class="form-control" name="jenis">
                        <option value="0">Makanan kecil
                        </option>
                        <option value="1">Makanan besar
                        </option>  
                        </select>
                        <?php echo form_error('jenis') ?>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">Jumlah</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="jumlah" id="jumlah"  placeholder="jumlah">
                        <?php echo form_error('jumlah') ?>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputExperience" class="col-sm-2 control-label">Keperluan</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="keperluan" id="keperluan"  placeholder="keperluan">
                        <?php echo form_error('keperluan') ?>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                        </form>
                          <button type="submit" id="simpan" class="btn btn-danger">Submit</button>
                        </div>
                      </div>
                  </div><!-- /.tab-pane -->
                </div><!-- /.tab-content -->
              </div><!-- /.nav-tabs-custom -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
 <script>
   $(document).ready(function() {
 	 $('#keluhan').summernote({
    lang: 'id-ID' // default: 'en-US'
  });
});
  </script>