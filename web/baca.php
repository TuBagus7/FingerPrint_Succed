<!DOCTYPE html>
<html>

<head>

    <?php
    $namaaplikasi = "face recognition";
    $lokasi =  "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $lokasi_request =  $_SERVER[REQUEST_URI];
    ?>
    <title> <?php echo $namaaplikasi;?> </title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>-
    <script src="face-api.js"></script>

</head>

<body>

<br>
<br>
<br>
<style>
    body {
        background: url(https://img.freepik.com/free-vector/abstract-white-background_23-2148810888.jpg?size=626&ext=jpg) no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }
</style>

<div id="parent1" style="padding-left: 20px;">

    <div class="margin" style="position: relative; float:left; border: 3px solid black;

      padding-bottom: 12px;
      padding-top: 13px;
      border: 3px solid black;
      background-color: black;

      ">

        <video id="vidDisplay" style="height: 500px; width: 700px; display: inline-block; vertical-align: baseline;"
               onloadedmetadata="onPlay(this)" autoplay="true"></video>
        <canvas id="overlay" style="position: absolute; top: 0; left: 0;" width="1200" height="800" />
    </div>



    <div id="parent2" style="position: relative;
    float: right;
    border: 15px solid black;
    padding-right: -1px;
    margin-right: 20px;
    background-color: grey;">
        <br>
        <center>
            <button id="register" class="button button1" style="background-color: #1e7d44;"> Pendaftaran Wajah </button>
            <button id="login" class="button button1" style="background-color: #ec7f22;"> Pengenalan Wajah </button>
        </center>
        <br>

        <img id="prof_img"
             style="margin-left: 210px; height:200px; width: 200px; border: 3px solid black; border-radius: 10px;"></img><br><br>
        <div id="siapa"
             style=" text-align: center; font-size: 23px; font-family:Lucida Console,Monaco,monospace; font-weight: bold; margin-bottom: 50px;">
            ... Deteksi Wajah ... </div>
        <div id="reg_disp" style="display: none;">
            <input id="fname"
                   style="margin-left:50px; margin-right:50px; width:500px; height: 30px; border-radius: 5px; border:1px solid black;"
                   type="text" placeholder="Nama : "></input><br></br>

            <button id="capture" class="button button1" style="margin-left: 220px;height:72px;"> Simpan
                Wajah</button>
            <br>
            <div id="tries"
                 style=" text-align: center; font-size: 23px; font-family:Lucida Console,Monaco,monospace; font-weight: bold;">
                Jumlah : </div>
            <br>
        </div>

        <div id="log_disp">

            <div id="logname"
                 style="font-size: 35px; font-weight: bold; margin-left: 40px; width: 570px; white-space: pre-wrap; text-align: center;">
            </div>

        </div>
    </div>
</div>
</body>
<br>
<br>
<br>
<br>

<?php include 'deteksiwajah.php';?>



</html>