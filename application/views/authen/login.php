<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Login</title>

    <link href="<?php echo base_url () ?>template/admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url () ?>template/admin/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="<?php echo base_url () ?>template/admin/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url () ?>template/admin/css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="loginColumns animated fadeInDown">
        <div class="row">

            <div class="col-md-6">
                <h2 class="font-bold">Selamat datang di Halaman Login</h2>
            </div>
            <div class="col-md-6">
                <div class="ibox-content">
                    <?php echo form_open('Authen/get_login'); ?>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" placeholder="Username" required="">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="Password" required="">
                        </div>
                        <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

                        <a href="#">
                            <small>Forgot password?</small>
                        </a>
                        <?php
							$info = $this->session->flashdata('info');
							if(!empty($info))
							{
								echo $info;
							} ?>
                    </form>
                    <p class="m-t">
                        <small>Biroumum setda jatengprov </small>
                    </p>
                </div>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-md-6">
               Biroumum setda jatengprov
            </div>
            <div class="col-md-6 text-right">
               <small>©2017</small>
            </div>
        </div>
    </div>

</body>

</html>

