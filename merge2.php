<?php
$image1 = 'gambar/desain.jpg';
$image2 = 'gambar/qr1.png';
list($width, $height) = getimagesize($image2);
$image1 = imagecreatefromstring(file_get_contents($image1));
$image2 = imagecreatefromstring(file_get_contents($image2));

imagecopymerge($image1, $image2, 168, 525, 0, 0, $width, $height, 100);
header('Content-Type: image/png');
imagepng($image1);
imagepng($image1, 'anjay.tif');
  ?>
  <!DOCTYPE html>
<html>
<head>
    <title>Image Merge</title>
</head>
<body>
    <h1>Gambar Hasil Merge</h1>
    <img src="<?php echo $image1; ?>" alt="anjay" />
</body>
</html>