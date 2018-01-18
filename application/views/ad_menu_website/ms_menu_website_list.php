
<div class="row">
<div class="col-lg-12">
            <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Ms_menu_website List</h5>
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
                <?php echo anchor(site_url('ad_menu_website/create'), 'Create', 'class="btn btn-danger btn-sm"'); ?>
		<?php echo anchor(site_url('ad_menu_website/excel'), ' <i class="fa fa-file-excel-o"></i> Excel', 'class="btn btn-primary btn-sm"'); ?>
		<?php echo anchor(site_url('ad_menu_website/word'), '<i class="fa fa-file-word-o"></i> Word', 'class="btn btn-info btn-sm"'); ?>
	    </div></br>
        <table class="table table-striped table-bordered table-hover dataTables-example">
            <thead>
            <tr>
            <th width="10px">No</th>
		    <th>Nama</th>
		    <th>Icon</th>
		    <th>Link</th>
		    <th>Akses</th>
		    <th>Status</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($ad_menu_website_data as $ad_menu_website)
            {
            	$active = $ad_menu_website->status==1?'AKTIF':'TIDAK AKTIF';
            	$akses = $ad_menu_website->akses==1?'ADMINISTRATOR':'TIDAK AKTIF';
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $ad_menu_website->nama ?></td>
		    <td><i class='<?php echo $ad_menu_website->icon ?>'></i></td>
		    <td><?php echo $ad_menu_website->link ?></td>
		    <td><?php echo $akses ?></td>
		    <td><?php echo $active ?></td>
		    <td style="text-align:center" width="90px">
			<?php 
			echo anchor(site_url('ad_menu_website/read/'.$ad_menu_website->id),'<img src="'.base_url().'font/Create.png'.'">',array('title'=>'detail')); 
			echo ' | '; 
			echo anchor(site_url('ad_menu_website/update/'.$ad_menu_website->id),'<img src="'.base_url().'font/Edit.png'.'">',array('title'=>'edit')); 
			echo ' | '; 
			echo anchor(site_url('ad_menu_website/delete/'.$ad_menu_website->id),'<img src="'.base_url().'font/Delete-48.png'.'">','title="delete" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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