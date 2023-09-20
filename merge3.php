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
               border: 1px solid #000;
               width: 360px;
               height: 500px;
               margin-bottom: 20px;
          }

          .adjustable-image {
               position: absolute;
               cursor: move;
          }

          .adjustment-column {
               float: left;
               margin-right: 20px;
          }
     </style>
</head>

<body>
     <div class="topnav">
          <a href="index.php">Upload Desain</a>
          <a href="template.php">Upload Template</a>
          <a href="qr.php">Upload QR Code</a>
          <a href="qr_code.php"> QR Code Generator</a>
          <a href="uuid.php"> UUID </a>
          <a href="merge6.php">Merge</a>
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
          while ($data = mysqli_fetch_array($hasil)) : $no++;
          ?>

               <div id="canvas">
                    <img id="gambar1" class="adjustable-image" src="gambar/<?php echo $data['gambar']; ?>" style="left: 0; top: 0;"> <?php endwhile; ?>

               <?php
               include 'database.php';
               $sql = "select * from gambar2 order by id_gambar desc";
               $hasil = mysqli_query($kon, $sql);
               $no = 0;
               while ($data = mysqli_fetch_array($hasil)) : $no++;
               ?>

                    <img id="gambar2" class="adjustable-image" src="qr2.png" style="left: 0; top: 0;"> <?php endwhile; ?>
               </div>
               <div class="adjustment-column">
                    <h3>Ubah Ukuran Gambar 2:</h3>
                    <label for="gambar2-width">Lebar:</label>
                    <input type="number" id="gambar2-width" min="0">
                    <br>
                    <label for="gambar2-height">Tinggi:</label>
                    <input type="number" id="gambar2-height" min="0">
                    <br>
                    <button onclick="saveImage('gambar2')" class=" button button1">Ubah Ukuran</button> <button onclick="mergeImages()" class="button button3">Merge Images</button>
                    <button onclick="downloadImage()" class="button button5">Download Merged Image</button>
                    <button onclick="copyToNextPage()" class="button button2"> Copy Ke Halaman Berikutnya</button>
                    <button class="button button1"><a href="halaman_berikutnya.php">Halaman Berikutnya</a></button>
               </div>


               <br style="clear: both;">
               <br>
               <script>
                    var canvas = document.getElementById('canvas');
                    var images = document.getElementsByClassName('adjustable-image');
                    var draggingImage = null;

                    function moveImage(event) {
                         if (draggingImage && draggingImage.id !== 'gambar1') {
                              draggingImage.style.left = event.clientX - canvas.offsetLeft + 'px';
                              draggingImage.style.top = event.clientY - canvas.offsetTop + 'px';
                         }
                    }

                    function mergeImages() {
                         var mergedImage = document.createElement('canvas');
                         var canvasWidth = canvas.offsetWidth;
                         var canvasHeight = canvas.offsetHeight;
                         mergedImage.width = canvasWidth;
                         mergedImage.height = canvasHeight;
                         var context = mergedImage.getContext('2d');

                         for (var i = 0; i < images.length; i++) {
                              var image = images[i];
                              var left = parseInt(image.style.left);
                              var top = parseInt(image.style.top);
                              var width = image.offsetWidth;
                              var height = image.offsetHeight;

                              context.drawImage(image, left, top, width, height);
                         }

                         var mergedImageURL = mergedImage.toDataURL();
                         var mergedImageElement = document.createElement('img');
                         mergedImageElement.src = mergedImageURL;
                         canvas.innerHTML = '';
                         canvas.appendChild(mergedImageElement);
                    }

                    function saveImage(imageId) {
                         var image = document.getElementById(imageId);
                         var widthInput = document.getElementById(imageId + '-width');
                         var heightInput = document.getElementById(imageId + '-height');
                         var width = widthInput.value ? widthInput.value + 'px' : 'auto';
                         var height = heightInput.value ? heightInput.value + 'px' : 'auto';
                         image.style.width = width;
                         image.style.height = height;
                    }

                    function downloadImage() {
                         var mergedImage = canvas.querySelector('img');
                         var link = document.createElement('a');
                         link.href = mergedImage.src;
                         link.download = 'merged_image.tif';
                         link.click();
                    }

                    canvas.addEventListener('mousedown', function(event) {
                         if (event.target.classList.contains('adjustable-image')) {
                              draggingImage = event.target;
                         }
                    });

                    canvas.addEventListener('mouseup', function() {
                         draggingImage = null;
                    });

                    canvas.addEventListener('mousemove', moveImage);
               </script>
</body>

</html>