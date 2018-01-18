<!DOCTYPE html>
<html>
<head>
    <title>Export PDF Pengaduan kerusakan Sarpras</title>
    <style type="text/css" media="screen">
        body{
            margin: 0px 0px 40px;
        }
        .invoice{
            width: 100%;
            margin: 0 auto;
            background-color: #fff;
            border:1px solid #999;
        }    
        .header{
            padding: 20px 25px 20px 20px; 
            background-color: #3367d6;
            height: 70px;
        }
        .right{
            position: absolute;
            left: 530px;
        }
        .right h1{
            color: #fff;
            font-family:arial;
            
        }
        .clear{
            clear: both;
        }
    </style>
</head>
<body>
    <div class="invoice">
        <div class="header">
         <img src="<?php echo base_url(); ?>template/logo-jateng-1k.png" title="Biro Umum" alt="Biro Umum" class="logo" style="width:250px;">
             
            <div class="right">
                <h1>INVOICE</h1>
            </div>
            <div class="clear"></div>
        </div>
        <div style="min-height: 400px;padding: 20px;font-size: 14px">
            <p>Terimakasih telah Melaporkan Kerusakan Sarpras Di Kantor setda Provjateng,</p>
            <p>Mohon maaf atas Ketidaknyamananya.</p>
            <p>Data laporan yang terekam di kami  sebagai berikut: </p>
            <table>
            <tr>
                    <td style="padding-left: 20px;">instansi</td>
                    <td>:</td>
                    <td><b><?php echo $instans['name'] ?></b></td>
                </tr>
                <tr>
                    <td style="padding-left: 20px;">Nama Pelapor</td>
                    <td>:</td>
                    <td><b><?php echo $row['name'] ?></b></td>
                </tr>
                <tr>
                    <td style="padding-left: 20px;"> nomor telephon
                    </td>
                    <td>:</td>
                    <td><b><?php echo $row['phone'] ?></b></td>
                </tr>
                <tr>
                    <td style="padding-left: 20px;">Email</td>
                    <td>:</td>
                    <td><b><?php echo $row['email'] ?></td>
                </tr>
                <tr>
                    <td style="padding-left: 20px;">Bagian</td>
                    <td>:</td>
                    <td><b><?php echo $pesanan['bagian'] ?></td>
                </tr>
                <tr>
                    <td style="padding-left: 20px;">Sub bagian</td>
                    <td>:</td>
                    <td><b><?php echo $pesanan['sub_bag'] ?></td>
                </tr>
                <tr>
                    <td style="padding-left: 20px;">Laporan</td>
                    <td>:</td>
                    <td><b><?php echo $pesanan['keluhan'] ?></td>
                </tr>
                <tr>
                    <td style="padding-left: 20px;">Lokasi</td>
                    <td>:</td>
                    <td><b><?php echo $lokasi['nama_lokasi'] ?></td>
                </tr>
                <tr>
                    <td style="padding-left: 20px;">Petugas penanganan</td>
                    <td>:</td>
                    <td><b><?php echo $unit['nama_unit'] ?></td>
                </tr>
                <tr>
                    <td style="padding-left: 20px;">Nomor telephone Petugas</td>
                    <td>:</td>
                    <td><b><?php echo $unit['no_telp'] ?></td>
                </tr>
                <tr>
                    <td style="padding-left: 20px;">waktu pelaporan</b>
                    </td>
                    <td>:</td>
                    <td><b><?php echo $pesanan['waktu_lapor'] ?></b></td>
                </tr>
                
                <tr>
                    <td style="padding-left: 20px;"></td>
                    <!-- <td>:</td> -->
                    <td>
                    </td><br>
                </tr>
            </table>
            <p>Mohon dikonfirmasikan kembali apabila belum tertangani  melalui telephone / WA  8947583745</p>
            <p>Terimakasih Telah menggunakan Aplikasi layanan Biro Umum</p>
            dicetak oleh : <?php echo 
        $this->session->userdata('name');
         ?>
        </div>
    </div>
</body>
</html>