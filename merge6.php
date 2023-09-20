<!DOCTYPE html>
<html>

<head>
     <title>Iqshan</title>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
     <script src="bootstrap/js/bootstrap.min.js"></script>
     <script src="js/jquery-3.4.1.js"></script>
     <meta name="viewport" content="width=device-width, initial-scale=1">

     <style>
          .button {
               background-color: #4CAF50;
               /* Green */
               border: none;
               color: white;
               padding: 15px 32px;
               text-align: center;
               text-decoration: none;
               display: inline-block;
               font-size: 16px;
               margin: 4px 2px;
               cursor: pointer;
          }

          .button1 {
               background-color: white;
               color: black;
               border: 2px solid #4CAF50;
          }

          .button2 {
               background-color: white;
               color: black;
               border: 2px solid #008CBA;
          }

          .button3 {
               background-color: white;
               color: black;
               border: 2px solid #f44336;
          }

          .button4 {
               background-color: white;
               color: black;
               border: 2px solid #e7e7e7;
          }

          .button5 {
               background-color: white;
               color: black;
               border: 2px solid #555555;
          }
     </style>
     <style>
          body {
               margin: 0;
               font-family: Arial, Helvetica, sans-serif;
          }

          .topnav {
               overflow: hidden;
               background-color: #333;
          }

          .topnav a {
               float: left;
               color: #f2f2f2;
               text-align: center;
               padding: 14px 16px;
               text-decoration: none;
               font-size: 17px;
          }

          .topnav a:hover {
               background-color: #ddd;
               color: black;
          }

          .topnav a.active {
               background-color: #04AA6D;
               color: white;
          }
     </style>
     <style>
          #canvas {
               position: relative;
          }

          #image2 {
               position: absolute;
               cursor: move;
          }
     </style>
</head>

<body>

     <body>
          <div class="topnav">
               <a href="index.php">Upload Desain </a>
               <a href="template.php">Upload Template</a>
               <a href="qr.php">Upload QR</a>
               <a href="qr_code.php">QR Code Generator</a>
               <a href="uuid.php">UUID</a>
               <a href="merge.php">Merge</a>
               <a href="merge4.php">Merge2</a>
               <a href="merge6.php">Merge3</a>
          </div>

          <div style="padding-left:16px"><br>
               <center>
                    <h2>
                         Halaman Hasil Merge Gambar Dan Geser Gambar Serta Ngubah Ukuran QR Code Secara Manual
                    </h2>
               </center> <br>
               <?php
               include 'database.php';
               $sql = "select * from gambar order by id_gambar desc";
               $hasil = mysqli_query($kon, $sql);
               $no = 0;
               while ($data = mysqli_fetch_array($hasil)) :
                    $no++;
               ?>
                    <div id="canvas">
                         <img id="image1" src="gambar/<?php echo $data['gambar'];  ?>" alt="Gambar 1">
                    <?php endwhile; ?>
                    <?php
                    include 'database.php';
                    $sql = " select * from gambar2 order by id_gambar desc";
                    $hasil = mysqli_query($kon, $sql);
                    $no = 0;
                    while ($data = mysqli_fetch_array($hasil)) : $no++;   ?>

                         <img id="image2" src="gambar/<?php echo $data['gambar']; ?>" alt="Gambar 2"> <?php endwhile; ?>
                    </div>
                    <button onclick="getCoordinates()" class="button button2">Koordinat</button>
                    <label for="width">Lebar:</label>
                    <input type="text" id="width" name="width" value="">
                    <label for="height">Tinggi:</label>
                    <input type="text" id="height" name="height" value="">
                    <button onclick="resizeImage()" class="button button3">Ubah Ukuran</button>
                    <button onclick="saveMerge()" class="button button4">Simpan Merge</button>
                    <button onclick="copyToNextPage()" class="button button5">Copy ke Halaman Berikutnya</button>
                    <button class="button button2"> <a href="halaman_berikutnya.php">Halaman Berikutnya</a></button>

                    <script src="script.js"></script>
     </body>

</html>