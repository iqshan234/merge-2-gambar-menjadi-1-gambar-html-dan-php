document.addEventListener("mousemove", function(event) {

     var x = event.clientX;
     var y = event.clientY;

     document.getElementById('position').innerHTML = " X = " + x + " & Y = " + y;
});
var mergedImage = sessionStorage.getItem('mergedImage');
var columns = parseInt(prompt('Masukkan jumlah kolom:'));
var rows = parseInt(prompt('Masukkan jumlah baris:'));

for (var i = 0; i < rows; i++) {
     for (var j = 0; j < columns; j++) {
          var image = document.createElement('img');
          image.src = mergedImage;
          document.getElementById('imageContainer').appendChild(image);
     }
     document.getElementById('imageContainer').appendChild(document.createElement('br'));
     
}

function downloadImage() {
     var mergedImage = canvas.querySelector('img');
     var link = document.createElement('a');
     link.href = mergedImage.src;
     link.download = 'kumpulan_merge.tif';
     link.click;
}