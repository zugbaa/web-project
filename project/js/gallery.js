function showAlbum(albumId) {
    var modal = document.getElementById('album-' + albumId);
    modal.style.display = 'block';
}

function closeAlbum(albumId) {
    var modal = document.getElementById('album-' + albumId);
    modal.style.display = 'none';
}