<script src="<?php echo base_url('') ?>template/admin/js/jquery-3.1.1.min.js"></script>
<?php if ($this->session->userdata('message')): ?>
  <div class="box-body">
    <div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <?php echo $this->session->userdata('message'); ?>
    </div>
  </div>    
<?php endif; ?>
<div class="row">
<div class="col-lg-12">
            <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Menu Admin</h5>
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
            <div class="table-responsive">
                <?php echo anchor(site_url('ad_menu_admin/create'), 'Create', 'class="btn btn-danger btn-sm"'); ?>
				<?php echo anchor(site_url('ad_menu_admin/excel'), ' <i class="fa fa-file-excel-o"></i> Excel', 'class="btn btn-primary btn-sm"'); ?>
				<?php echo anchor(site_url('ad_menu_admin/word'), '<i class="fa fa-file-word-o"></i> Word', 'class="btn btn-info btn-sm"'); ?>
	    </div></br>
        <table class="table table-striped table-bordered table-hover dataTables-example">
            <thead>
                <tr>
                    <th width="10px">No</th>
		    <th>Nama</th>
		    <th>Link</th>
		    <th>Icon</th>
		    <th>Akses</th>
		    <th>Parent</th>
		    <th>Status</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($ad_menu_admin_data as $ad_menu_admin)
            {	
            	 $active = $ad_menu_admin->status==1?'AKTIF':'TIDAK AKTIF';
            	 $parent = $ad_menu_admin->parent>1?'SUBMENU':'MAINMENU'
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $ad_menu_admin->nama ?></td>
		    <td><?php echo $ad_menu_admin->link ?></td>
		    <td><i class='<?php echo $ad_menu_admin->icon ?>'></i></td>
		    <td><?php echo $ad_menu_admin->name ?></td>
		    <td><?php echo $parent ?></td>
		    <td><?php echo $active ?></td>
		    <td style="text-align:center" width="90px">
			<?php 
			echo anchor(site_url('ad_menu_admin/read/'.$ad_menu_admin->id),'<img src="'.base_url().'font/Create.png'.'">',array('title'=>'detail')); 
			echo ' | '; 
			echo anchor(site_url('ad_menu_admin/update/'.$ad_menu_admin->id),'<img src="'.base_url().'font/Edit.png'.'">',array('title'=>'edit')); 
			echo ' | '; 
			echo anchor(site_url('ad_menu_admin/delete/'.$ad_menu_admin->id),'<img src="'.base_url().'font/Delete-48.png'.'">','title="delete" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
			?>
		    </td>
	        </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        </div>
        </div>
        </div>
        </div>