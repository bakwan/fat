<!DOCTYPE html>
<html>


<!-- Mirrored from webapplayers.com/inspinia_admin-v2.3/login_two_columns.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 01 Sep 2015 13:14:14 GMT -->
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INSPINIA | Login 2</title>
	
	<link href="<?php echo base_url () ?>template/admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url () ?>template/admin/font-awesome-4.4.0/css/font-awesome.css" rel="stylesheet">
    

    <link href="<?php echo base_url() ?>template/admin/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url () ?>template/admin/css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">
        <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name"></h1>

            </div>
            <h3>Welcome to Login Page</h3>
            <p>Sarpras Biro umum Aplication</p>
            <?php echo form_open('Authen_member/get_login'); ?>
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="email" required="">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Password" required="">
                </div>
                <button type="submit" class="btn btn-danger block full-width m-b">Login</button>
				<?php
							$info = $this->session->flashdata('info');
							if(!empty($info))
							{
								echo $info;
							} ?>
            </form>
            <p class="m-t"> <small>Rumah tangga Biro umum provinsi jawa tengah &copy; <?php echo date('Y') ?></small> </p>
        </div>
    </div>
    </div>

</body>
<!-- Mirrored from webapplayers.com/inspinia_admin-v2.3/login_two_columns.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 01 Sep 2015 13:14:14 GMT -->
</html>
