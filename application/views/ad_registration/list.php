<div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Registration</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="<?php echo base_url('Dashboard') ?>">Administrator</a>
                    </li>
                    <li>
                        <a>Registration</a>
                    </li>
                    <li class="active">
                        <strong>Registration All</strong>
                    </li>
                </ol>
            </div>
        </div>
        <br/>    
<div class="row">
<div class="col-lg-12">
            <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Ms_keluhan List</h5>
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
		</div></br>
        <table class="table table-striped table-bordered table-hover dataTables-example">
            <thead>
                <tr>
                    <th width="10px">No</th>
		    <th>Nik</th>
		    <th>name</th>
		    <th>gender</th>
            <th>tinggi badan</th>
            <th>berat badan</th>
		    <th>negara</th>
		    <th>status</th>
		    <th>pendidikan</th>
		    <th>domisili</th>
		    <th>email</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($ad_Registration_data as $us)
            {
                ?>
                <tr>
		    <td width="10px" ><?php echo ++$start ?></td>
		    <td><?php echo $us->nik ?></td>
		    <td><?php echo $us->name ?></td>
            <td><?php 
                    if($us->gender=='P'){
                    echo "perempuan";
                    }elseif($us->gender=='L'){
                    echo "laki-laki";
                    }
            ?></td>
            <td><?php echo $us->tbadan ?> cm</td>
            <td><?php echo $us->bbadan ?> kg</td>
		    <td><?php echo $us->negara ?></td>
		    <td><?php echo $us->status ?></td>
		    <td><?php echo $us->pendidikan ?></td>
		    <td><?php echo $us->domisili ?></td>
            <td><?php echo $us->email ?></td>	
		    <td style="text-align:center" width="90px">
			<?php 
			echo anchor(site_url('ad_registration/detail/'.$us->id),'<img src="'.base_url().'font/Create.png'.'">',array('title'=>'detail')); 
			echo ' | '; 
			echo anchor(site_url('ad_registration/cetak/'.$us->id),'<img src="'.base_url().'font/Edit.png'.'">',array('title'=>'print')); 
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