
<div class="row">
<div class="col-lg-12">
            <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Tb_notes List</h5>
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
                <?php echo anchor(site_url('ad_notes/create'), 'Create', 'class="btn btn-danger btn-sm"'); ?>
		<?php echo anchor(site_url('ad_notes/excel'), ' <i class="fa fa-file-excel-o"></i> Excel', 'class="btn btn-primary btn-sm"'); ?>
		<?php echo anchor(site_url('ad_notes/word'), '<i class="fa fa-file-word-o"></i> Word', 'class="btn btn-info btn-sm"'); ?>
	    </div></br>
        <table class="table table-striped table-bordered table-hover" id="editable">
            <thead>
                <tr>
                    <th width="80px">No</th>
		    <th>Nama</th>
		    <th>Keterangan</th>
		    <th>Users</th>
		    <th>Create At</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($ad_notes_data as $ad_notes)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $ad_notes->nama ?></td>
		    <td><?php echo $ad_notes->keterangan ?></td>
		    <td><?php echo $ad_notes->users ?></td>
		    <td><?php echo $ad_notes->create_at ?></td>
		    <td style="text-align:center" width="90px">
			<?php 
			echo anchor(site_url('ad_notes/read/'.$ad_notes->id),'<img src="'.base_url().'font/Create.png'.'">',array('title'=>'detail')); 
			echo ' | '; 
			echo anchor(site_url('ad_notes/update/'.$ad_notes->id),'<img src="'.base_url().'font/Edit.png'.'">',array('title'=>'edit')); 
			echo ' | '; 
			echo anchor(site_url('ad_notes/delete/'.$ad_notes->id),'<img src="'.base_url().'font/Delete-48.png'.'">','title="delete" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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