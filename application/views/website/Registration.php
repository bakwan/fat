<script src="<?php echo base_url()?>template/AdminLTE/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script>
    			$(function(){
                        $("#waktu").datetimepicker({
                            format: 'Y-m-d H:i:s'
                        });
                        $("#tgl_lahir").datetimepicker({
                            format: 'Y-m-d'
                        });
                        $("input,select,textarea").not("[type=submit]").jqBootstrapValidation();
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
           <div class="row">
           <!-- left column -->
            <div class="col-md-9 col-md-offset-2">
              <!-- general form elements -->
              <div class="box box-warning">
                <div class="box-header with-border">
                  <h3 class="box-title">Form Registrasi</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
               <?php 
               echo form_open_multipart('Registration/Save');
                ?>
                  <div class="box-body">
                  <div class="form-group">
                      <label for="exampleInputPassword1">Nik <?php echo form_error('nik') ?></label>
                      <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-tasks"></i>
                      </div>
                      <input type="text" name="nik" class="form-control" placeholder="masukan nik">
                    </div>
                    <br>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Name <?php echo form_error('name') ?></label>
                      <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-tasks"></i>
                      </div>
                      <input type="text" name="name" class="form-control" placeholder="masukan nama">
                    </div>
                    <br>
                  <div class="form-group">
                      <label for="exampleInputPassword1">Lokasi <?php echo form_error('lokasi') ?></label>
                      <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-location-arrow"></i>
                      </div>
                        <select id="gender" name="gender" class="form-control">
                        <option value='0'>pilih gender<option/>
                        <option value='L'>laki-laki<option/>
                        <option value='P'>perempuan<option/>
                      </select>
                    </div>
                    <br>
                  <div class="form-group">
                      <label for="exampleInputPassword1">tanggal lahir <?php echo form_error('tanggal_lahir') ?></label>
                      <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-user"></i>
                      </div>
                      <input type="text" name="tanggal_lahir" id="tgl_lahir" class="form-control" placeholder="tanggal_lahir">
                    </div>
                    <br>
                  <div class="form-group">
                      <label for="exampleInputPassword1">fat <?php echo form_error('fat') ?></label>
                      <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-users"></i>
                      </div>
                      <input type="text" name="fat" class="form-control" placeholder="masukan fat">
                    </div>
                    <br>
                    <div class="form-group">
                      <label for="exampleInputPassword1">negara <?php echo form_error('negara') ?></label>
                      <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-users"></i>
                      </div>
                      <input type="text" name="negara" class="form-control" placeholder="masukan negara anda">
                    </div>
                    <br>
                    <div class="form-group">
                      <label for="exampleInputPassword1">status <?php echo form_error('status') ?></label>
                      <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-users"></i>
                      </div>
                      <input type="text" name="status" class="form-control" placeholder="masukan status anda">
                    </div>
                    <br>
                    <div class="form-group">
                      <label for="exampleInputPassword1">tinggi badan <?php echo form_error('tbadan') ?></label>
                      <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-users"></i>
                      </div>
                      <input type="text" name="tbadan" class="form-control" placeholder="masukan tinggi badan anda">
                    </div>
                    <br>    
                    <div class="form-group">
                      <label for="exampleInputPassword1">berat badan <?php echo form_error('bbadan') ?></label>
                      <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-users"></i>
                      </div>
                      <input type="text" name="bbadan" class="form-control" placeholder="masukan berat badan anda">
                    </div>
                    <br>
                    <div class="form-group">
                      <label for="exampleInputPassword1">kacamata <?php echo form_error('kacamata') ?></label>
                      <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-users"></i>
                      </div>
                      <input type="text" name="kacamata" class="form-control" placeholder="masukan kacamata anda">
                    </div>
                    <br>
                    <div class="form-group">
                      <label for="exampleInputPassword1">pendidikan <?php echo form_error('pendidikan') ?></label>
                      <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-users"></i>
                      </div>
                      <input type="text" name="pendidikan" class="form-control" placeholder="masukan pendidikan terakhir anda">
                    </div>
                    <br>
                    <div class="form-group">
                      <label for="exampleInputPassword1">domisili <?php echo form_error('domisili') ?></label>
                      <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-users"></i>
                      </div>
                      <input type="text" name="domisili" class="form-control" placeholder="masukan domisili anda">
                    </div>
                    <br>
                    <div class="form-group">
                      <label for="exampleInputPassword1">no telp <?php echo form_error('telp') ?></label>
                      <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-users"></i>
                      </div>
                      <input type="text" name="telp" class="form-control" placeholder="masukan no telephone anda">
                    </div>
                    <br>
                    <div class="form-group">
                      <label for="exampleInputPassword1">email <?php echo form_error('email') ?></label>
                      <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-users"></i>
                      </div>
                      <input type="email" name="email" class="form-control" placeholder="masukan email anda">
                    </div>
                    <br>
                    <div class="form-group">
                      <label for="exampleInputPassword1">family <?php echo form_error('family') ?></label>
                      <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-users"></i>
                      </div>
                      <input type="text" name="family" class="form-control" placeholder="masukan family anda">
                    </div>
                    <br>  
                    <div class="form-group">
                      <label for="exampleInputPassword1">Kota <?php echo form_error('kota') ?></label>
                      <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-users"></i>
                      </div>
                      <input type="text" name="kota" class="form-control" placeholder="masukan kota anda">
                    </div>
                    <br>    
                    <div class="form-group">
                    <label>full foto <?php echo form_error('userfile') ?></label>
                    <?php echo form_upload('userfile_1') ?>
                  </div>
                  <div class="form-group">
                    <label>pas foto <?php echo form_error('userfile') ?></label>
                    <?php echo form_upload('userfile_2') ?>
                  </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">motivasi <?php echo form_error('motivasi') ?></label>
                      <textarea class="form-control" name="motivasi" ></textarea>
                    </div>
                    </div>
                    <div class="checkbox">
                      <label>
                            <input 
                          type="checkbox" 
                          name="terms-and-conditions" 
                          required 
                          data-validation-required-message=
                            "You must agree to the terms and conditions"
                        >Dengan ini anda menyetujui semua kebijakan yang berlaku di Biro Umum setda jatengprov.
                      </label>
                    </div>
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button type="submit" class="btn bg-navy btn-flat margin"><?php echo $button ?></button>
                  </div>
                  <?php echo form_close() ?>
              </div><!-- /.box -->
              </div>