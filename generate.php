<?php
function generateUUID()
{
    $data = openssl_random_pseudo_bytes(16);
    assert(strlen($data) == 16);
    $data[6] = chr(ord($data[6]) & 0x0f | 0x40); // Set version to 0100
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80); // Set bits 6-7 to 10
    return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
}

function generateUUIDs($num)
{
    $uuids = array();
    for ($i = 0; $i < $num; $i++) {
        $uuid = generateUUID();
        array_push($uuids, $uuid);
    }
    return $uuids;
}

// Ambil jumlah UUID dari data yang dikirimkan melalui formulir
$num = $_POST['num'];

// Generate UUIDs
$uuids = generateUUIDs($num);
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/jquery-3.4.1.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
</head>

<body>

    <body>
        <div class="topnav">
            <a href="index.php">Upload Desain </a>
            <a href="template.php">Upload Template</a>
            <a href="qr.php">Upload QR</a>
            <a href="qr_code.php">QR Code Generator</a>
            <a href="uuid.php">UUID</a>
            <a href="merge6.php">Merge3</a>
        </div>
        <div style="padding-left:16px">



            <br>
            <br>
            <h1>Hasil UUID Generator</h1>
            <p>Berikut adalah <?= $num ?> UUID yang dihasilkan secara acak:</p><br>
            <h4> UUID Generator </h4>
            <hr>

            <?php foreach ($uuids as $uuid) : ?>
                <h4>
                    <p><?= $uuid ?>
                    </p>
                </h4>
            <?php endforeach; ?>

            <!-- bagian akhir (penutup) while -->



    </body>

</html>