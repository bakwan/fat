<script src="<?php echo base_url()?>template/AdminLTE/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script>
    			$(function(){
                        $("#waktu").datetimepicker({
                            format: 'Y-m-d H:i:s'
                        });
                        $("input,select,textarea").not("[type=submit]").jqBootstrapValidation();
                    })
</script>
<section class="content-header">
                    <h1>
                      Konsumsi
                      <small>halaman Input pengajuan Konsumsi</small>
                    </h1>
                    <ol class="breadcrumb">
                      <li><a href="<?php echo base_url('') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                      <li class="active">Konsumsi</li>
                    </ol>
          </section></br>
           <div class="row">
           <!-- left column -->
            <div class="col-md-9 col-md-offset-2">
              <!-- general form elements -->
              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Form Input Konsumsi</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <?php echo form_open_multipart('Konsumsi/save');?>
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Keperluan <?php echo form_error('keperluan') ?></label>
                      <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-anchor"></i>
                      </div>
                      <input type="text" class="form-control" name="keperluan" id="keperluan" placeholder="masukan keperluan" require="require">
                    </div>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Lokasi pengiriman <?php echo form_error('lokasi') ?></label>
                      <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-location-arrow"></i>
                      </div>
                      <?php echo cmb_dinamis('id_lokasi', 'ms_lokasi', 'nama_lokasi', 'id', $lokasi) ?>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Bagian <?php echo form_error('bagian') ?></label>
                      <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-user"></i>
                      </div>
                      <input type="text" class="form-control" name="bagian" id="bagian" placeholder="masukan bagian" require="require">
                    </div>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Sub bagian <?php echo form_error('sub_bag') ?></label>
                      <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-users"></i>
                      </div>
                      <input type="text" class="form-control" name="sub_bag" id="sub_bag" placeholder="masukan keperluan" require="require">
                    </div>
                    </div>
                     <div class="form-group">
                      <label for="exampleInputPassword1">jenis <?php echo form_error('jenis') ?></label>
                      <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa  fa-clone"></i>
                      </div>
                      <select class="form-control" id="jenis" name="jenis">
                        <option value="">Pilih salah satu</option>
                        <option value="0">1.snack</option>
                        <option value="1">2.makanan besar</option>  
                      </select>
                    </div>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">waktu pengiriman <?php echo form_error('waktu_kirim') ?> <small>(isikan 2 jam sebelum acara berlangsung)</small></label>
                      <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar-check-o"></i>
                      </div>
                      <input type="text" class="form-control" name="waktu_kirim" id="waktu" placeholder="masukan waktu kirim">
                    </div>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Jumlah Pesanan <?php echo form_error('jumlah') ?></label>
                      <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-cart-plus"></i>
                      </div>
                      <input type="text" class="form-control" name="jumlah" id="jumlah" placeholder="masukan jumlah pesanan">
                    </div>
                    </div>
                   
                  </div><!-- /.form group -->
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
                </form>
              </div><!-- /.box -->
              </div>