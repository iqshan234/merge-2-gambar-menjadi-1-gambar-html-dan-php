<!DOCTYPE html>
<html>

<head>
    <title>iqshan</title>
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
            <center>
                <h1>Halaman Upload Desain</h1>
                </a></h1>
            </center>
            <br>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h4>Silahkan Upload Foto Desain</h4>
                        <hr>
                        <form method="post" enctype="multipart/form-data" action="file-upload.php">
                            <div class="form-group">
                                <label>Multi Image</label>
                                <input type="file" name="image[]" class="form-control" multiple />
                            </div>
                            <input type="submit" name="submit" value="Submit" class="btn btn-primary">
                        </form>
                        <br> <img src="gambar/80x80.png" id="preview" class="img-thumbnail">
                    </div>
                </div>
            </div>

        </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
        </script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
        </script>

        <hr>

        <hr>
        <div class="container">
            <div class="row">
                <div class="col-sm-150">
                    <div class="table-responsive">
                        <table class="table table-bordered" width='10%' cellspacing="10">
                            <thead>
                                <tr>
                                    <th width='1%'>No</th>
                                    <th width='1000%'>
                                        <center>Gambar </center>
                                    </th>

                                    <th width='1%'>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // include database
                                include 'database.php';
                                // perintah sql untuk menampilkan daftar bank yang berelasi dengan tabel kategori bank
                                $sql = "select * from gambar order by id_gambar desc";
                                $hasil = mysqli_query($kon, $sql);
                                $no = 0;
                                //Menampilkan data dengan perulangan while
                                while ($data = mysqli_fetch_array($hasil)) :
                                    $no++;
                                ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><img src="gambar/<?php echo $data['gambar']; ?>" class="rounded" width='100%' alt="Cinque Terre"></td>
                                        <td>

                                            <a href="hapus.php?id_gambar=<?php echo $data['id_gambar']; ?>&gambar=<?php echo $data['gambar']; ?>" onclick="konfirmasi()" class="btn btn-danger" role="button">Hapus</a>
                                        </td>
                                    </tr>
                                    <!-- bagian akhir (penutup) while -->
                                <?php endwhile; ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        </div>

    </body>

</html>
<style>
    .file {
        visibility: hidden;
        position: absolute;
    }
</style>

<script>
    function konfirmasi() {
        konfirmasi = confirm("Apakah anda yakin ingin menghapus gambar ini?")
        document.writeln(konfirmasi)
    }

    $(document).on("click", "#pilih_gambar", function() {
        var file = $(this).parents().find(".file");
        file.trigger("click");
    });

    $('input[type="file"]').change(function(e) {
        var fileName = e.target.files[0].name;
        $("#file").val(fileName);

        var reader = new FileReader();
        reader.onload = function(e) {
            // get loaded data and render thumbnail.
            document.getElementById("preview").src = e.target.result;
        };
        // read the image file as a data URL.
        reader.readAsDataURL(this.files[0]);
    });
</script>