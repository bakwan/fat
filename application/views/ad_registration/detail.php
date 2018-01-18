<!DOCTYPE html>
<html>
<head>
    <title>Registrasi Form Pendaftaran Flight Attendance Training</title>
    <script>
	function printDiv(divName) {
	    var printContents = document.getElementById(divName).innerHTML;
	    var originalContents = document.body.innerHTML.buttonprint;
	    document.body.innerHTML = printContents;
	    window.print();
	    document.body.innerHTML = originalContents;
	} 
	</script>
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

    <div id="printableArea" class="invoice">
        <div style="min-height: 400px;padding: 20px;font-size: 14px">
            <h4>Registrasi Form Pendaftaran Flight Attendance Training</h4>
            <table>
            <tr>
                    <td style="padding-left: 20px;">Submission Date</td>
                    <td>:</td>
                    <td><b><?php echo $pesanan['date'] ?></b></td>
                </tr>
                <tr>
                    <td style="padding-left: 20px;">nik</td>
                    <td>:</td>
                    <td><b><?php echo $pesanan['nik'] ?></td>
                </tr>
                <tr>
                    <td style="padding-left: 20px;">Nama</td>
                    <td>:</td>
                    <td><b><?php echo $pesanan['name'] ?></b></td>
                </tr>

                <tr>
                    <td style="padding-left: 20px;">gender</td>
                    <td>:</td>
                    <td><b><?php echo $pesanan['gender'] ?></td>
                </tr>
                <tr>
                    <td style="padding-left: 20px;">tanggal lahir</td>
                    <td>:</td>
                    <td><b><?php echo $pesanan['tanggal_lahir'] ?></td>
                </tr>
                <tr>
                    <td style="padding-left: 20px;"> nomor telephon
                    </td>
                    <td>:</td>
                    <td><b><?php echo $pesanan['telp'] ?></b></td>
                </tr>
                <tr>
                    <td style="padding-left: 20px;">Email</td>
                    <td>:</td>
                    <td><b><?php echo $pesanan['email'] ?></td>
                </tr>
                <tr>
                    <td style="padding-left: 20px;">tinggi badan</td>
                    <td>:</td>
                    <td><b><?php echo $pesanan['tbadan'] ?> cm</td>
                </tr>
                <tr>
                    <td style="padding-left: 20px;">berat badan</td>
                    <td>:</td>
                    <td><b><?php echo $pesanan['bbadan'] ?> kg</td>
                </tr>
                <tr>
                    <td style="padding-left: 20px;">fat</td>
                    <td>:</td>
                    <td><b><?php echo $pesanan['fat'] ?></td>
                </tr>
                <tr>
                    <td style="padding-left: 20px;">negara</td>
                    <td>:</td>
                    <td><b><?php echo $pesanan['negara'] ?></td>
                </tr>
                <tr>
                    <td style="padding-left: 20px;">kacamata</td>
                    <td>:</td>
                    <td><b><?php echo $pesanan['kacamata'] ?></td>
                </tr>
                <tr>
                    <td style="padding-left: 20px;">pendidikan</td>
                    <td>:</td>
                    <td><b><?php echo $pesanan['pendidikan'] ?></td>
                </tr>
                <tr>
                    <td style="padding-left: 20px;">domisili</td>
                    <td>:</td>
                    <td><b><?php echo $pesanan['domisili'] ?></td>
                </tr>
                <tr>
                    <td style="padding-left: 20px;">Kota</td>
                    <td>:</td>
                    <td><b><?php echo $pesanan['kota'] ?></td>
                </tr>
                <tr>
                    <td style="padding-left: 20px;">motivasi</td>
                    <td>:</td>
                    <td><b><?php echo $pesanan['motivasi'] ?></td>
                </tr>
                <tr>
                    <td style="padding-left: 20px;">family</td>
                    <td>:</td>
                    <td><b><?php echo $pesanan['family'] ?></td>
                </tr>
                <tr>
                    <td style="padding-left: 20px;">full foto</td>
                    <td>:</td>
                    <td><b><img src="<?php echo base_url().'upload/asset/'. $pesanan['full_foto']?>" alt="100" width="300" height="400"/></td>
                </tr>
				</br>
                <tr>
                    <td style="padding-left: 20px;">pas foto</td>
                    <td>:</td>
                    <td><b><img src="<?php echo base_url().'upload/asset/'. $pesanan['pas_foto']?>" alt="100" width="300" height="400"/></td>
                </tr>
                <tr>
                    <td style="padding-left: 20px;"></td>
                    <!-- <td>:</td> -->
                    <td>
                    </td><br>
                </tr>
            </table>
            
        </div>
    </div>
	</br>
	</br>
	<input type="button" class="btn btn-primary"  onclick="printDiv('printableArea')" value="Print" /></td></tr>
</body>
</html>