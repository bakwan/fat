<?php
if($this->session->userdata('id')=='')
{
    redirect('Authen');
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Administrator page</title>

    <link href="<?php echo base_url() ?>template/admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>template/admin/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>template/admin/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>template/admin/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>template/admin/css/plugins/dataTables/datatables.min.css" rel="stylesheet">
     <!-- Date Picker -->
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>template/datetime/jquery.datetimepicker.css">
 
</head>
<body class="md-skin fixed-nav no-skin-config">
<div id="wrapper">
<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="<?php echo base_url('') ?>template/admin/img/avatar5.png" />
                             </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?= $this->session->userdata('username'); ?></strong>
                             </span> <span class="text-muted text-xs block">Art Director <b class="caret"></b></span> </span> </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="profile.html">Profile</a></li>
                        <li><a href="contacts.html">Contacts</a></li>
                        <li><a href="mailbox.html">Mailbox</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo base_url('Authen/logout') ?>">Logout</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    BK+
                </div>
            </li>
            <li>
                <!--manggil menu dari database-->
                        <?php 
                        $menu_admin = $this->db->get_where('ms_menu_admin',array('parent'=>0,'status'=>1,'akses'=>$this->session->userdata('level')));
                        foreach ($menu_admin->result() as $menu) {
                        	//cek submenu
							$submenu = $this->db->get_where('ms_menu_admin',array('parent'=>$menu->id,'status'=>1,'akses'=>$this->session->userdata('level')));
							if($submenu->num_rows()>0){
								echo "<li>
								".anchor('#',"<i class='$menu->icon'></i><span class='nav-label'> ".strtoupper($menu->nama).'</span><span class="fa arrow"></span></i>')."
							<ul class='nav nav-second-level collapse'>";
							foreach($submenu->result() as $s ){
                            
								echo "<li>" . anchor($s->link, "<i class='$s->icon'></i> <span>" . strtoupper($s->nama)) . "</span></li>";
							}echo"</ul>
                                    </li>";	
							}else{
                                echo "<a>" . anchor($menu->link, "<i class='$menu->icon'></i> <span class='nav-label'>" . strtoupper($menu->nama)) . "</span></a>";
                            }
						}
                        ?>
            </li>   
        </ul>

    </div>
</nav>

<div id="page-wrapper" class="gray-bg">
<div class="row border-bottom">
    <nav class="navbar navbar-fixed-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            <form role="search" class="navbar-form-custom" action="search_results.html">
                <div class="form-group">
                    <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                </div>
            </form>
        </div>
        <ul class="nav navbar-top-links navbar-right">
            <li>
                <span class="m-r-sm text-muted welcome-message">Administrator Page</span>
            </li>
            

            <li>
                <a href="<?php echo base_url('Authen/logout') ?>">
                    <i class="fa fa-sign-out"></i> Log out
                </a>
            </li>
        </ul>

    </nav>
</div>
      <!--isi dari konten-->       
        <?php echo $contents; ?>
        <!--end isi konten-->
</br>
</br>
</br>
</br>

<div class="footer">
    <div class="pull-right">
        10GB of <strong>250GB</strong> Free.
    </div>
    <div>
        <strong>Copyright</strong> Example Company &copy; 2014-2017
    </div>
</div>
</div>
</div>
<!-- Mainly scripts -->
<script src="<?php echo base_url() ?>template/admin/js/jquery-3.1.1.min.js"></script>
<script src="<?php echo base_url() ?>template/admin/js/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>template/admin/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="<?php echo base_url() ?>template/admin/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<!-- Date Picker -->
<script type="text/javascript" src="<?php echo base_url(); ?>template/datetime/jquery.datetimepicker.full.min.js"></script>    
<!-- Custom and plugin javascript -->
<script src="<?php echo base_url() ?>template/admin/js/inspinia.js"></script>
<script src="<?php echo base_url() ?>template/admin/js/plugins/pace/pace.min.js"></script>
<script src="<?php echo base_url() ?>template/admin/js/plugins/dataTables/datatables.min.js"></script>
<script src="<?php echo base_url() ?>template/admin/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
 <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                "dom": 'lTfigt',
                "scrollX":true,
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},

                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }
                ]

            });
        $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
            $("#jam_tangan").datetimepicker({
                            format: 'Y-m-d H:i:s'
                        });
            $("#waktu").datetimepicker({
                            format: 'Y-m-d H:i:s'
                        });            
            $("#jam_selesai").datetimepicker({
                            format: 'Y-m-d H:i:s'
                        });
        });
    </script>
</body>
</html>
