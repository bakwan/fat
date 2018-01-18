<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>Tb_log List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Users</th>
		<th>Level</th>
		<th>Activity</th>
		<th>Keterangan</th>
		<th>Tabel</th>
		<th>Create At</th>
		
            </tr><?php
            foreach ($ad_log_data as $ad_log)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $ad_log->users ?></td>
		      <td><?php echo $ad_log->level ?></td>
		      <td><?php echo $ad_log->activity ?></td>
		      <td><?php echo $ad_log->keterangan ?></td>
		      <td><?php echo $ad_log->tabel ?></td>
		      <td><?php echo $ad_log->create_at ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>