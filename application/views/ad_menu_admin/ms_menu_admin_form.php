<div class="row">
<div class="<blockquote>col-lg-12</blockquote>">
            <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Ms_menu_admin <?php echo $button ?></h5>
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
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nama <?php echo form_error('nama') ?></label>
            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Link <?php echo form_error('link') ?></label>
            <input type="text" class="form-control" name="link" id="link" placeholder="Link" value="<?php echo $link; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Icon <?php echo form_error('icon') ?></label>
            <input type="text" class="form-control" name="icon" id="icon" placeholder="Icon" value="<?php echo $icon; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Akses <?php echo form_error('akses') ?></label>
            <?php echo cmb_dinamis('akses', 'ms_user_level', 'name', 'id', $akses) ?>
        </div>
	    <div class="form-group">
            <label for="int">Parent <?php echo form_error('parent') ?></label>
            <select name="parent" class="form-control">
                    <option value="0">YA</option>
                    <?php
                    $menu = $this->db->get('ms_menu_admin');
                    foreach ($menu->result() as $m){
                        echo "<option value='$m->id' ";
                        echo $m->id==$parent?'selected':'';
                        echo">".  strtoupper($m->nama)."</option>";
                    }
                    ?>
                </select>
        </div>
	    <div class="form-group">
            <label for="int">Status <?php echo form_error('status') ?></label>
                <?php echo form_dropdown('status',array('1'=>'AKTIF','0'=>'TIDAK AKTIF'),$status,"class='form-control'");?>
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('ad_menu_admin') ?>" class="btn btn-default">Cancel</a>
	</form>
</div>
</div>
</div>
</div>	
