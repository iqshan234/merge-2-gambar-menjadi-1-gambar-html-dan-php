<!DOCTYPE html>
<html>

<head>
     <title>iqshan</title>
     <link href="style.css" rel="stylesheet">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
     <script src="bootstrap/js/bootstrap.min.js"></script>
     <script src="js/jquery-3.4.1.js"></script>
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <meta charset="utf-100">
     <link href="style.css" rel="stylesheet">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
     <script src="bootstrap/js/bootstrap.min.js"></script>
     <script src="js/jquery-3.4.1.js"></script>
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <style>
          * {
               box-sizing: border-box;
          }

          .row {
               margin-left: -5px;
               margin-right: -5px;
          }

          .column {
               float: left;
               width: 50%;
               padding: 5px;
          }

          /* Clearfix (clear floats) */
          .row::after {
               content: "";
               clear: both;
               display: table;
          }

          table {
               border-collapse: collapse;
               border-spacing: 0;
               width: 100%;
               border: 1px solid #ddd;
          }

          th,
          td {
               text-align: left;
               padding: 16px;
          }

          tr:nth-child(even) {
               background-color: #f2f2f2;
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

     <body>
          <div class="topnav">
               <a href="index.php">Upload Desain </a>
               <a href="template.php">Upload Template</a>
               <a href="qr.php">Upload QR</a>
               <a href="qr_code.php">QR Code Generator</a>
               <a href="uuid.php">UUID</a>
               <a href="merge6.php">Merge</a>
          </div>

          <div style="padding-left:16px">
               <br>
               <br>
               <br>
               <h1>UUID Generator</h1>
               <form method="post" action="generate.php">

                    <label for="num">Jumlah UUID:</label>
                    <input type="number" name="num" id="num" min="1" max="1000" required>
                    <button type="submit" class="btn btn-primary">Generate</button>
               </form>
     </body>

</html>