  <script src="<?php echo base_url()?>template/AdminLTE/plugins/jQuery/jQuery-2.1.4.min.js"></script>
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
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3><?php 
                    $this->db->where('id_member',$this->session->userdata('id'));
                    $this->db->from('tb_laporan');
                    echo $this->db->count_all_results();
                  ?></h3>
                  <strong>Pengaduan kerusakan sarpras</strong>
                </div>
                <!-- <div class="icon">
                  <i class="ion ion-ios-cog"></i>
                </div> -->
                <a href="<?php echo base_url('Pengaduan') ?>" class="small-box-footer">clik to input <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3>
                  <?php 
                    $this->db->where('id_member',$this->session->userdata('id'));
                    $this->db->from('tb_konsumsi');
                    echo $this->db->count_all_results();
                  ?>
                  </h3>
                  <strong>Permintaan KonsumsiK</strong>
                </div>
                <!-- <div class="icon">
                  <i class="ion ion-bag"></i>
                </div> -->
                <a href="<?php echo base_url('Konsumsi') ?>" class="small-box-footer">clik to input <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
          </div>   
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
 <script>
   $(document).ready(function() {
 	 $('#keluhan').summernote({
    lang: 'id-ID' // default: 'en-US'
  });
});
  </script>