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
        <h2>Ms_menu_admin List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nama</th>
		<th>Link</th>
		<th>Icon</th>
		<th>Akses</th>
		<th>Parent</th>
		<th>Status</th>
		
            </tr><?php
            foreach ($ad_menu_admin_data as $ad_menu_admin)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $ad_menu_admin->nama ?></td>
		      <td><?php echo $ad_menu_admin->link ?></td>
		      <td><?php echo $ad_menu_admin->icon ?></td>
		      <td><?php echo $ad_menu_admin->akses ?></td>
		      <td><?php echo $ad_menu_admin->parent ?></td>
		      <td><?php echo $ad_menu_admin->status ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>