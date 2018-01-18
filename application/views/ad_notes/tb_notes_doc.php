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
        <h2>Tb_notes List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nama</th>
		<th>Keterangan</th>
		<th>Users</th>
		<th>Create At</th>
		
            </tr><?php
            foreach ($ad_notes_data as $ad_notes)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $ad_notes->nama ?></td>
		      <td><?php echo $ad_notes->keterangan ?></td>
		      <td><?php echo $ad_notes->users ?></td>
		      <td><?php echo $ad_notes->create_at ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>