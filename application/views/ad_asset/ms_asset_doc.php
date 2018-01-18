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
        <h2>Ms_asset List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id Lokasi</th>
		<th>Nama Asset</th>
		<th>Image</th>
		<th>Create At</th>
		<th>Update At</th>
		<th>Delete At</th>
		
            </tr><?php
            foreach ($ad_asset_data as $ad_asset)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $ad_asset->id_lokasi ?></td>
		      <td><?php echo $ad_asset->nama_asset ?></td>
		      <td><?php echo $ad_asset->image ?></td>
		      <td><?php echo $ad_asset->create_at ?></td>
		      <td><?php echo $ad_asset->update_at ?></td>
		      <td><?php echo $ad_asset->delete_at ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>