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
        <h2>Ms_footer List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Name</th>
		<th>Link</th>
		<th>Create At</th>
		<th>Update At</th>
		
            </tr><?php
            foreach ($ad_footer_data as $ad_footer)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $ad_footer->name ?></td>
		      <td><?php echo $ad_footer->link ?></td>
		      <td><?php echo $ad_footer->create_at ?></td>
		      <td><?php echo $ad_footer->update_at ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>