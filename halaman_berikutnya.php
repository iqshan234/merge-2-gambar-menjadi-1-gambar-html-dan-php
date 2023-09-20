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
</head>

<body>

     <div class="topnav">
          <a href="index.php">Upload Desain</a>
          <a href="template.php">Upload Template</a>
          <a href="qr.php">Upload QR Code</a>
          <a href="qr_code.php"> QR Code Generator</a>
          <a href="uuid.php"> UUID </a>
          <a href="merge.php"> Merge </a>
          <a href="merge4.php"> Merge2</a>
          <a href="merge6.php">Merge3</a>
     </div>
     <div style="padding-left:16px"><br>
          <center>
               <p id="position">
                    <br>
               <h2>
                    Halaman Hasil Kumpulan Merge
                    <button onclick="downloadImage()" class="button button3">Download Gambar</button>
               </h2>
               <br>
               <div id="imageContainer"></div>

               <script src="script2.js"></script>
               </p>
          </center>
</body>

</html>