
<div class="row">
<div class="col-lg-12">
            <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Ms_asset <?php echo $button ?></h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-wrench"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#">Config option 1</a>
                        </li>
                        <li><a href="#">Config option 2</a>
                        </li>
                    </ul>
                    <a class="close-link">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">
            <div class="">
            <div class="col-md-4 text-center">
                <div style="margin-top: 4px"  id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            </div>
        <?php echo form_open_multipart('Ad_asset/create_action');?>
	    <div class="form-group">
            <label for="int">Lokasi <?php echo form_error('id_lokasi') ?></label>
            <?php echo cmb_dinamis('id_lokasi', 'ms_lokasi', 'nama_lokasi', 'id', $id_lokasi) ?>    
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Asset <?php echo form_error('nama_asset') ?></label>
            <input type="text" class="form-control" name="nama_asset" id="nama_asset" placeholder="Nama Asset" value="<?php echo $nama_asset; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinytext">Image <?php echo form_error('image') ?></label>
            <input type="file" name="userfile" >
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('ad_asset') ?>" class="btn btn-default">Cancel</a>
	</form>
</div>
</div>
</div>
