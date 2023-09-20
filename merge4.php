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

          .button2 {
               background-color: #008CBA;
          }

          /* Blue */
          .button3 {
               background-color: #f44336;
          }

          /* Red */
          .button4 {
               background-color: #e7e7e7;
               color: black;
          }

          /* Gray */
          .button5 {
               background-color: #555555;
          }

          /* Black */
     </style>
     <style>
          #canvas {
               border: 1px solid #000;
               cursor: pointer;
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
</head>

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
     <div style="padding-left:16px">
          <br>
          <center>
               <H2>Halaman Hasil Merge Gambar Dan Geser Gambar QR Code</H2>
          </center>
          <br>
          <canvas id="canvas" width="640" height="910"></canvas>
          <br><br>
          <button onclick="tampilkanKoordinat('gambar2')" class="button">Koordinat Gambar 2</button>

          <button onclick="gabungkanGambar()" class="button button5">Gabungkan Gambar</button>
          <script>
               var canvas = document.getElementById('canvas');
               var context = canvas.getContext('2d');
               var gambar2X = 0;
               var gambar2Y = 0;
               var gambar2Bergerak = false;

               function gambarLoaded() {
                    context.drawImage(document.getElementById('gambar1'), 0, 0);
                    context.drawImage(document.getElementById('gambar2'), gambar2X, gambar2Y);
               }

               function geserGambar(event) {
                    if (gambar2Bergerak) {
                         gambar2X = event.offsetX;
                         gambar2Y = event.offsetY;
                    }

                    context.clearRect(0, 0, canvas.width, canvas.height);
                    gambarLoaded();
               }

               function hentikanGeser() {
                    gambar2Bergerak = false;
               }

               function tampilkanKoordinat(gambar) {
                    if (gambar === 'gambar2') {
                         alert('Koordinat Gambar 2: X = ' + gambar2X + ', Y = ' + gambar2Y);
                    }
               }

               function gabungkanGambar() {
                    var canvasData = canvas.toDataURL();
                    var link = document.createElement('a');
                    link.href = canvasData;
                    link.download = 'gabungan_gambar.tif';
                    link.click();
               }
          </script>

          <?php
          $gambar1 = 'cak.png';
          $gambar2 = 'qr21.png';
          ?>

          <img id="gambar1" src="<?php echo $gambar1; ?>" style="display: none;" onload="gambarLoaded()">
          <img id="gambar2" src="<?php echo $gambar2; ?>" style="display: none;">

          <script>
               canvas.addEventListener('mousedown', function(event) {
                    if (event.button === 0) {
                         if (event.offsetX >= gambar2X && event.offsetX <= gambar2X + document.getElementById('gambar2').width &&
                              event.offsetY >= gambar2Y && event.offsetY <= gambar2Y + document.getElementById('gambar2').height) {
                              gambar2Bergerak = true;
                         }
                    }
               });

               canvas.addEventListener('mousemove', geserGambar);

               canvas.addEventListener('mouseup', function() {
                    hentikanGeser();
               });
          </script>
</body>

</html>