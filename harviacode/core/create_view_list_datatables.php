<?php 
$string = "";
$string .= "
<div class=\"row\">
<div class=\"col-lg-12\">
            <div class=\"ibox float-e-margins\">
            <div class=\"ibox-title\">
                <h5>".ucfirst($table_name)." List</h5>
                <div class=\"ibox-tools\">
                    <a class=\"collapse-link\">
                        <i class=\"fa fa-chevron-up\"></i>
                    </a>
                    <a class=\"dropdown-toggle\" data-toggle=\"dropdown\" href=\"#\">
                        <i class=\"fa fa-wrench\"></i>
                    </a>
                    <ul class=\"dropdown-menu dropdown-user\">
                        <li><a href=\"#\">Config option 1</a>
                        </li>
                        <li><a href=\"#\">Config option 2</a>
                        </li>
                    </ul>
                    <a class=\"close-link\">
                        <i class=\"fa fa-times\"></i>
                    </a>
                </div>
            </div>
            <div class=\"ibox-content\">
            <div class=\"\">
                <?php echo anchor(site_url('".$c_url."/create'), 'Create', 'class=\"btn btn-danger btn-sm\"'); ?>";
if ($export_excel == '1') {
    $string .= "\n\t\t<?php echo anchor(site_url('".$c_url."/excel'), ' <i class=\"fa fa-file-excel-o\"></i> Excel', 'class=\"btn btn-primary btn-sm\"'); ?>";
}
if ($export_word == '1') {
    $string .= "\n\t\t<?php echo anchor(site_url('".$c_url."/word'), '<i class=\"fa fa-file-word-o\"></i> Word', 'class=\"btn btn-info btn-sm\"'); ?>";
}
if ($export_pdf == '1') {
    $string .= "\n\t\t<?php echo anchor(site_url('".$c_url."/pdf'),'<i class=\"fa fa-file-pdf-o\"></i> PDF', 'class=\"btn btn-info btn-sm\"'); ?>";
}
$string .= "\n\t    </div></br>
        <table class=\"table table-striped table-bordered table-hover\" id=\"editable\">
            <thead>
                <tr>
                    <th width=\"80px\">No</th>";
foreach ($non_pk as $row) {
    $string .= "\n\t\t    <th>" . label($row['column_name']) . "</th>";
}
$string .= "\n\t\t    <th>Action</th>
                </tr>
            </thead>";
$string .= "\n\t    <tbody>
            <?php
            \$start = 0;
            foreach ($" . $c_url . "_data as \$$c_url)
            {
                ?>
                <tr>";

$string .= "\n\t\t    <td><?php echo ++\$start ?></td>";

foreach ($non_pk as $row) {
    $string .= "\n\t\t    <td><?php echo $" . $c_url ."->". $row['column_name'] . " ?></td>";
}

$string .= "\n\t\t    <td style=\"text-align:center\" width=\"90px\">"
        . "\n\t\t\t<?php "
        . "\n\t\t\techo anchor(site_url('".$c_url."/read/'.$".$c_url."->".$pk."),'<img src=\"'.base_url().'font/Create.png'.'\">',array('title'=>'detail')); "
        . "\n\t\t\techo ' | '; "
        . "\n\t\t\techo anchor(site_url('".$c_url."/update/'.$".$c_url."->".$pk."),'<img src=\"'.base_url().'font/Edit.png'.'\">',array('title'=>'edit')); "
        . "\n\t\t\techo ' | '; "
        . "\n\t\t\techo anchor(site_url('".$c_url."/delete/'.$".$c_url."->".$pk."),'<img src=\"'.base_url().'font/Delete-48.png'.'\">','title=\"delete\" onclick=\"javasciprt: return confirm(\\'Are You Sure ?\\')\"'); "
        . "\n\t\t\t?>"
        . "\n\t\t    </td>";
$string .=  "\n\t        </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        </div>
        </div>
        </div>";


$hasil_view_list = createFile($string, $target."views/" . $c_url . "/" . $v_list_file);

?>