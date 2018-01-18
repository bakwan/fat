<script src="<?php echo base_url () ?>template/inspinia/js/jquery-2.1.1.js"></script>

<section class="content-header">
                    <h1>
                      Pengaduan
                      <small>Halaman Input form pengaduan kerusakan sapras</small>
                    </h1>
                    <ol class="breadcrumb">
                      <li><a href="<?php echo base_url('') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                      <li class="active">Pengaduan</li>
                    </ol>
          </section></br>
          <?=$this->session->flashdata('pesan')?>
           <div class="row">
           <!-- left column -->
            <div class="col-md-9 col-md-offset-2">
              <!-- general form elements -->
              <div class="box box-warning">
                <div class="box-header with-border">
                  <h3 class="box-title">Form Input pengaduan</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
               <?php echo form_open_multipart('Pengaduan/save');?>
                  <div class="box-body">
                  <div class="form-group">
                      <label for="exampleInputPassword1">Jenis Kerusakan <?php echo form_error('nama_asset') ?></label>
                      <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-tasks"></i>
                      </div>
                      <input type="text" name="nama_asset" class="form-control" placeholder="masukan Nama asset yang mengalami kerusakan">
                    </div>
                    <br>
                  <div class="form-group">
                      <label for="exampleInputPassword1">Lokasi <?php echo form_error('lokasi') ?></label>
                      <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-location-arrow"></i>
                      </div>
                        <select id="lokasi" name="id_lokasi" onchange="loadasset()" class="form-control">
                       <?php
                      foreach ($lokasi->result() as $p) {
                          echo "<option value='$p->id'>$p->nama_lokasi</option>";
                      }
                      ?>
                      </select>
                    </div>
                    <br>
                  <div class="form-group">
                      <label for="exampleInputPassword1">Bagian <?php echo form_error('bagian') ?></label>
                      <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-user"></i>
                      </div>
                      <input type="text" name="bagian" class="form-control" placeholder="masukan bagian kerja">
                    </div>
                    <br>
                  <div class="form-group">
                      <label for="exampleInputPassword1">sub bagian <?php echo form_error('sub_bag') ?></label>
                      <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-users"></i>
                      </div>
                      <input type="text" name="sub_bag" class="form-control" placeholder="masukan sub bagian kerja">
                    </div>
                    <br>    
                  <div class="form-group">
                      <label for="exampleInputFile">Masukan gambar <?php echo form_error('userfile') ?></label>
                      <input type="file" name="userfile">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">keluhan <?php echo form_error('keluhan') ?></label>
                      <textarea class="form-control" name="keluhan" ></textarea>
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
                </form>
              </div><!-- /.box -->
              </div>