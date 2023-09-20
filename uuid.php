<!DOCTYPE html>
<html>

<head>
    <title>Iqshan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        .uuid-column {
            display: inline-block;
            vertical-align: top;
            margin-right: 12px;
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
        <a href="merge6.php">Merge</a>
    </div>
    <div style="padding-left:16px">
        <center>
            <h1>Halaman UUID Generator Dengan QR Code</h1>
        </center>
        <form action="uuid.php" method="post">
            <input type="number" name="columns" placeholder="Number of Columns">
            <input type="number" name="rows" placeholder="Number of Rows">
            <input type="submit" class="btn btn-danger" value="Generate UUIDs and QR Codes">
        </form>
        <?php
        if (isset($_POST['columns']) && isset($_POST['rows'])) {
            $columns = $_POST['columns'];
            $rows = $_POST['rows'];

            for ($row = 1; $row <= $rows; $row++) {
                echo '<div class="uuid-row">';

                for ($col = 1; $col <= $columns; $col++) {
                    $uuid = generateUUID();
                    $produk = "Black Series 0.25 gr";
                    $data = '{"uuid":"' . $uuid . '", "produk":"' . $produk . '"}';
                    $njay = ' ';
                    $qrCodeUrl = 'https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=' . urlencode($data);

                    echo '<div class="uuid-column">';
                    echo '<h3>UUID ' . (($row - 1) * $columns + $col) . '</h3>';
                    echo '<img src="' . $qrCodeUrl . '" alt="QR Code">';
                    echo '<p>UUID: ' . $uuid . '</p>';
                    echo '<p>Produk: ' . $produk . '</p>';
                    echo '<p>' . $njay . '</p>';
                    echo '<a href="' . $qrCodeUrl . '" download="qr_code_' . $uuid . '">Download QR Code</a>';
                    echo '</div>';
                }

                echo '</div>';
            }
        }

        function generateUUID()
        {
            $data = random_bytes(16);
            assert(strlen($data) == 16);
            $data[6] = chr(ord($data[6]) & 0x0f | 0x40); // set version to 4
            $data[8] = chr(ord($data[8]) & 0x3f | 0x80); // set bits 6-7 to 10
            return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
        }
        ?>
</body>

</html>