
const rotatingImages = document.querySelectorAll(".rotating-image");
let currentImageIndex = 0;

function rotateImages() {
    rotatingImages[currentImageIndex].style.display = "none";
    currentImageIndex = (currentImageIndex + 1) % rotatingImages.length;
    rotatingImages[currentImageIndex].style.display = "block";
}
rotateImages();
// Set an interval to rotate the images every 3 seconds
setInterval(rotateImages, 2000);

