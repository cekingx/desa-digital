<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payangan Hospital</title>
</head>
<body>
     <div style=" margin: auto;width: 80%;padding: 10px;text-align:center;padding:20px;background:white;">
        <div style="background-image: linear-gradient(90deg, #b32322, #ff4e0e);border-top-left-radius:10px;border-top-right-radius:10px;padding:20px;">
            <img src="<?php echo base_url('assets/img/icon.png')?>" width="50">
            <p style="font-family: Poppins, sans-serif;margin-bottom:0px;font-weight:bold;margin-top:0px;color:white;">Akun Payangan Hospital Terverifikasi</p>
            <p style="font-family: Poppins, sans-serif;margin-top:0px;font-weight:bold;color:white;">Pemerintah Kabupaten Gianyar</p>
        </div>
        <div style="background:white;border-bottom-left-radius:10px;border-bottom-right-radius:10px;padding:20px;">
            <p style="font-family: Poppins, sans-serif;margin-bottom:0px;font-weight:bold;margin-top:0px;font-size:15pt;color:#222;">Akun Terverifikasi</p>
            <p style="font-family: Poppins, sans-serif;margin-top:20px;">Akun anda dengan NIK : <?php echo $nik;?> telah terverifikasi. Mohon untuk segera login dengan menggunakan password "payanganhospital" dan lakukan penggantian password</p>
            <!-- <a href="<?php echo base_url('update_email?nip=')?><?php echo $nik;?>&email=<?php echo $email;?>" style="font-family: Poppins, sans-serif;background-color: #b32322;
                border: none;
                cursor: pointer;
                color: white;
                padding: 10px 32px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 14px;">UPDATE</a> -->
            <!-- <hr> -->
            <!-- <p style="font-family: Poppins, sans-serif;margin-top:0px;font-weight:bold;color:white;">Pemerintah Kabupaten Gianyar</p> -->
        </div>
       
        <!-- <p style="font-family: Arial, Helvetica, sans-serif;">Provider / Pemilik</p> -->
      </div>
</body>
</html>