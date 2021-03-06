<script src="<?php echo base_url('') ?>template/admin/js/jquery-3.1.1.min.js"></script>
<div class="row">
<div class="col-lg-12">
            <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Ms_header List</h5>
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
                <?php echo anchor(site_url('ad_header/create'), 'Create', 'class="btn btn-danger btn-sm"'); ?>
		<?php echo anchor(site_url('ad_header/excel'), ' <i class="fa fa-file-excel-o"></i> Excel', 'class="btn btn-primary btn-sm"'); ?>
		<?php echo anchor(site_url('ad_header/word'), '<i class="fa fa-file-word-o"></i> Word', 'class="btn btn-info btn-sm"'); ?>
	    </div></br>
        <table class="table table-striped table-bordered table-hover dataTables-example">
            <thead>
                <tr>
                    <th width="10px">No</th>
		    <th>Nama</th>
		    <th>Link</th>
		    <th>Image</th>
		    <th>Create At</th>
		    <th>Update At</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($ad_header_data as $ad_header)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $ad_header->nama ?></td>
		    <td><?php echo $ad_header->link ?></td>
		    <td><?php echo $ad_header->image ?></td>
		    <td><?php echo $ad_header->create_at ?></td>
		    <td><?php echo $ad_header->update_at ?></td>
		    <td style="text-align:center" width="90px">
			<?php 
			echo anchor(site_url('ad_header/read/'.$ad_header->id),'<img src="'.base_url().'font/Create.png'.'">',array('title'=>'detail')); 
			echo ' | '; 
			echo anchor(site_url('ad_header/update/'.$ad_header->id),'<img src="'.base_url().'font/Edit.png'.'">',array('title'=>'edit')); 
			echo ' | '; 
			echo anchor(site_url('ad_header/delete/'.$ad_header->id),'<img src="'.base_url().'font/Delete-48.png'.'">','title="delete" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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