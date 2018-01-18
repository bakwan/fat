<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins m-t-xl">
                <div class="ibox-content text-center p-xl">

                    <h2><span class="text-navy">Administrator Panel</span>
                    <br/><small>Dahboard</small></h2>
              
                </div>
            </div>
        </div>
    </div>
<?php if ($this->session->userdata('message')): ?>
  <div class="box-body">
    <div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <?php echo $this->session->userdata('message'); ?>
    </div>
  </div>    
<?php endif; ?>
<div class="row">
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Data pendaftaran</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins"><?= $this->db->count_all('tb_users_gi'); ?></h1>
                                <div class="stat-percent font-bold text-success"><a href="<?php echo base_url('Ad_Registration') ?>">Detail</a> <i class="fa fa-bolt"></i></div>
                                <small>Total transaction</small>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        