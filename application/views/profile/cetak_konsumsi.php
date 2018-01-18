<!DOCTYPE html>
<html>
<head>
    <title>Export PDF konsumsi</title>
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
            <!-- <a href="layananbiroumum.jatengprov.go.id"><img src="<?php echo base_url(); ?>template/logo-jateng-1k.png" title="Biro Umum" alt="Biro Umum" class="logo" style="width:250px;"></a>
             -->
            <div class="right">
                <h1>INVOICE</h1>
            </div>
            <div class="clear"></div>
        </div>
        <div style="min-height: 400px;padding: 20px;font-size: 14px">
            <p>Terima kasih telah melakukan transaksi pada biro umum</p>
            <p>Data Pemesanan Sebagai Berikut : </p>
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
                    <td style="padding-left: 20px;">Keperluan</td>
                    <td>:</td>
                    <td><b><?php echo $pesanan['keperluan'] ?></td>
                </tr>
                <tr>
                    <td style="padding-left: 20px;">Jenis konsumsi</td>
                    <td>:</td>
                    <td><b><?php
                        if ($pesanan['jenis']==1) {
                            echo "MAKANAN BESAR";
                        }elseif($pesanan['jenis']==0){echo "MAKANAN KECIL";}
                    ?></td>
                </tr>
                <tr>
                    <td style="padding-left: 20px;">Jumlah</td>
                    <td>:</td>
                    <td><b><?php echo $pesanan['jumlah'] ?></td>
                </tr>
                <tr>
                    <td style="padding-left: 20px;">Lokasi</td>
                    <td>:</td>
                    <td><b><?php echo $lokasi['nama_lokasi'] ?></td>
                </tr>
                <tr>
                    <td style="padding-left: 20px;">Pengirim</td>
                    <td>:</td>
                    <td><b><?php echo $pengantar['nama'] ?></td>
                </tr>
                <tr>
                    <td style="padding-left: 20px;">No telp Pengirim</td>
                    <td>:</td>
                    <td><b><?php echo $pengantar['no_telp'] ?></td>
                </tr>
                <tr>
                    <td style="padding-left: 20px;">waktu pengiriman</b>
                    </td>
                    <td>:</td>
                    <td><b><?php echo $pesanan['waktu_kirim'] ?></b></td>
                </tr>
                <tr>
                    <td style="padding-left: 20px;">Jalur pesan</b>
                    </td>
                    <td>:</td>
                    <td><b><?php 
                        if ($pesanan['jalur_pesan']==0) {
                            echo "Website";
                        }elseif ($pesanan['jalur_pesan']==1) {
                            echo "TELEPHONE";
                        }
                    ?></b></td>
                </tr>
                <tr>
                    <td style="padding-left: 20px;">Status</b>
                    </td>
                    <td>:</td>
                    <td><b><?php 
                        if ($pesanan['status']==1) {
                            echo "MENUNGGU";
                        }elseif ($pesanan['status']==2) {
                            echo "PROSES";
                        }elseif ($pesanan['status']==3) {
                            Echo "SELESAI";
                        }
                    ?></b></td>
                </tr>
                <tr>
                    <td style="padding-left: 20px;"></td>
                    <!-- <td>:</td> -->
                    <td>
                    </td><br>
                </tr>
            </table>
            <p>Jika ingin melakukan pembatalan silahkan menghubungi <b></b> maksimal dua hari Sebelum acara</p>
            <p>Terima kasih telah melakukan Transaksi di Biro Umum Pemerintah Provinsi Jawa Tengah</p>
        dicetak oleh : <?php echo 
        $this->session->userdata('name');
         ?>
        </div>
    </div>
</body>
</html>