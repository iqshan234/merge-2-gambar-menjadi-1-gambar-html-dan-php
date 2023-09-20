// Membuat variabel untuk elemen gambar 1 dan gambar 2
var image1 = document.getElementById('image1');
var image2 = document.getElementById('image2');

// Membuat variabel untuk status pergerakan gambar
var isMoving = false;

// Menambahkan event listener ketika tombol mouse ditekan pada gambar 2
image2.addEventListener('mousedown', function (event) {
    isMoving = true;
});

// Menambahkan event listener ketika tombol mouse dilepas pada gambar 2
image2.addEventListener('mouseup', function (event) {
    isMoving = false;
});

// Menambahkan event listener ketika mouse bergerak di dalam canvas
canvas.addEventListener('mousemove', function (event) {
    if (isMoving) {
        // Mengeser gambar 2 sesuai dengan posisi mouse
        image2.style.left = event.clientX - canvas.offsetLeft - (image2.width / 2) + 'px';
        image2.style.top = event.clientY - canvas.offsetTop - (image2.height / 2) + 'px';
    }
});

// Fungsi untuk menghentikan pergerakan gambar 2
function stopMovement() {
    isMoving = false;
}

// Fungsi untuk mendapatkan koordinat X dan Y gambar 2
function getCoordinates() {
    var x = parseInt(image2.style.left, 10) + (image2.width / 2);
    var y = parseInt(image2.style.top, 10) + (image2.height / 2);
    alert('Koordinat: X=' + x + ', Y=' + y);
}

// Fungsi untuk mengubah ukuran gambar 2 sesuai dengan input lebar dan tinggi
function resizeImage() {
    var width = document.getElementById('width').value;
    var height = document.getElementById('height').value;

    image2.style.width = width + 'px';
    image2.style.height = height + 'px';
}

// Fungsi untuk menyimpan merge gambar 1 dan gambar 2
function saveMerge() {
    var image2 = document.getElementById();
    var widthInput = document.getElementById('width');
    var heightInput = document.getElementById('height');
    var width = widthInput.value ? widthInput.value + 'px' : 'auto';
    var height = heightInput.value ? heightInput.value + 'px' : 'auto';
    image2.style.width = width;
    image2.style.height = height;
    

    var canvas = document.createElement('canvas');
    var width = canvas.offsetWidth;
    var height = canvas.offsetHeight;
    canvas.width = width;
    canvas.height = height;
    var context = canvas.getContext('2d');

    for (var i = 0; i <image2.length; i++) {
        var image2 = image[i];
        var left = parseInt(image2.style.left);
        var top = parseInt(image2.style.top);
        var width = image2.offsetWidth;
        var height = image2.offsetHeight;

        context.drawImage(image2, left, top, width, height);
    }

    var mergedImageURL = canvas.toDataURL();
    var mergedImageElement = document.createElement('img');
    mergedImageElement.src = mergedImageURL;
    canvas.innerHTML = '';
    canvas.appendChild(mergedImageElement);


    canvas.width = image1.width;
    canvas.height = image1.height;

    context.drawImage(image1, 0, 0);
    context.drawImage(image2, parseInt(image2.style.left, 10), parseInt(image2.style.top, 10));

    var mergedImage = canvas.toDataURL('image/jpeg');

    // Simpan merge gambar ke local storage atau kirim ke server sesuai kebutuhan
    // ...

    alert('Merge gambar berhasil disimpan.');
}

// Fungsi untuk mengirim merge gambar ke halaman berikutnya
function copyToNextPage() {
    var canvas = document.createElement('canvas');
    var context = canvas.getContext('2d');

    canvas.width = image1.width;
    canvas.height = image1.height;

    context.drawImage(image1, 0, 0);
    context.drawImage(image2, parseInt(image2.style.left, 10), parseInt(image2.style.top, 10));

    var mergedImage = canvas.toDataURL('image/jpeg');

    // Simpan merge gambar dalam sessionStorage
    sessionStorage.setItem('mergedImage', mergedImage);
}
