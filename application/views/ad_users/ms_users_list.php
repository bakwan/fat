<div class="row">
<div class="col-lg-12">
            <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Ms_users List</h5>
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
                <?php echo anchor(site_url('ad_users/create'), 'Create', 'class="btn btn-danger btn-sm"'); ?>
		<?php echo anchor(site_url('ad_users/excel'), ' <i class="fa fa-file-excel-o"></i> Excel', 'class="btn btn-primary btn-sm"'); ?>
		<?php echo anchor(site_url('ad_users/word'), '<i class="fa fa-file-word-o"></i> Word', 'class="btn btn-info btn-sm"'); ?>
	    </div></br>
        <table class="table table-striped table-bordered table-hover dataTables-example">
            <thead>
            <tr>
            <th width="10px">No</th>
		    <th>Username</th>
		    <th>Email</th>
		    <th>Name</th>
		    <th>Last Login</th>
		    <th>Status</th>
		    <th>Level</th>
		    <th>Data dibuat Pada</th>
		    <th>Data diupdate pada</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($ad_users_data as $ad_users)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $ad_users->username ?></td>
		    <td><?php echo $ad_users->email ?></td>
		    <td><?php echo $ad_users->name ?></td>
		    <td><?php echo $ad_users->last_login ?></td>
		    <td><?php if($ad_users->status==1){
					  	echo "ACTIVE";
					  }elseif($ad_users->status==0){echo "NONACTIVE";} ?></td>
		    <td><?php echo $ad_users->nama ?></td>
		    <td><?php echo $ad_users->create_at ?></td>
		    <td><?php echo $ad_users->update_at ?></td>
		    <td style="text-align:center" width="90px">
			<?php 
			echo anchor(site_url('ad_users/read/'.$ad_users->id),'<img src="'.base_url().'font/Create.png'.'">',array('title'=>'detail')); 
			echo ' | '; 
			echo anchor(site_url('ad_users/update/'.$ad_users->id),'<img src="'.base_url().'font/Edit.png'.'">',array('title'=>'edit')); 
			echo ' | '; 
			echo anchor(site_url('ad_users/delete/'.$ad_users->id),'<img src="'.base_url().'font/Delete-48.png'.'">','title="delete" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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