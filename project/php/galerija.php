<?php
session_start();

$_SESSION['original_url'] = $_SERVER['REQUEST_URI'];

$mysqli = require __DIR__ . "/database.php";

if (isset($_SESSION["user_id"])) {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = "SELECT * FROM user
            WHERE id = {$_SESSION["user_id"]}";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galerija</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-black.css">
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/galerija.css">
</head>
<body>
    <header>
    <div class="navbar">
            <div class="logo">
            <a href="index.php">
              <img src="../images/logo.png" alt="Dječji Vrtić Lane" class="logo-image">
            </a>
            </div>
            <h1 class="title">Dječji Vrtić "LANE"</h1>
            <ul class="links">
              <li <?php if ($_SERVER['REQUEST_URI'] == '/project/php/index.php'): ?>class="new-link squiggly-underline"<?php endif; ?>><a href="index.php">Naslovna</a></li>
              <li <?php if ($_SERVER['REQUEST_URI'] == '/project/php/about-us.php'): ?>class="new-link squiggly-underline"<?php endif; ?>><a href="about-us.php">O nama</a></li>
              <li <?php if ($_SERVER['REQUEST_URI'] == '/project/php/program.php'): ?>class="new-link squiggly-underline"<?php endif; ?>><a href="program.php">Program</a></li>
              <li <?php if ($_SERVER['REQUEST_URI'] == '/project/php/galerija.php'): ?>class="new-link squiggly-underline"<?php endif; ?>><a href="galerija.php">Galerija</a></li>
              <?php if (isset($user)): ?>
                <p class="loginInfo">Pozdrav <?= htmlspecialchars($user["name"]) ?></p>
                <li><a href="../html/kid-signup.html" class="action_btn2">Upiši Dijete!</a> </li>
                <p><a href="logout.php" class="action_btn3">Log out</a></p>
              <?php else: ?>
                <li><a href="../php/login.php" class="action_btn1">Log in</a> </li>
                <li><a href="../html/signup.html" class="action_btn2">Registriraj se</a></li>
              <?php endif; ?>
            </ul>

            <div class="toggle_btn">
                <i class="fa-solid fa-bars"></i>
            </div>
        </div>
        <div class="dropdown_menu">
              <li <?php if ($_SERVER['REQUEST_URI'] == '/project/php/index.php'): ?>class="dropdown-link squiggly"<?php endif; ?>><a href="index.php">Naslovna</a></li>
              <li <?php if ($_SERVER['REQUEST_URI'] == '/project/php/about-us.php'): ?>class="dropdown-link squiggly"<?php endif; ?>><a href="about-us.php">O nama</a></li>
              <li <?php if ($_SERVER['REQUEST_URI'] == '/project/php/program.php'): ?>class="dropdown-link squiggly"<?php endif; ?>><a href="program.php">Program</a></li>
              <li <?php if ($_SERVER['REQUEST_URI'] == '/project/php/galerija.php'): ?>class="dropdown-link squiggly"<?php endif; ?>><a href="galerija.php">Galerija</a></li>
            <?php if (isset($user)): ?>
                <li class="loginInfo">Pozdrav <?= htmlspecialchars($user["name"]) ?></li>
                <li><a href="../html/kid-signup.html" class="action_btn2">Upiši Dijete!</a> </li>
                <li>
                  <a href="logout.php" class="action_btn3">Log out</a>
              </li>
              <?php else: ?>
                <li><a href="../php/login.php" class="action_btn1">Log in</a></li>
                <li><a href="../html/signup.html" class="action_btn2">Registriraj se</a></li>
              <?php endif; ?>
        </div>
    </header>
    <main>

    <?php
// Fetch albums from the database
$albums = $mysqli->query("SELECT * FROM albums");

if ($albums->num_rows > 0) {
    while ($album = $albums->fetch_assoc()) {
        echo "<h2 class='w3-container w3-center album-header' onclick='showAlbum(" . $album['id'] . ")'>" . $album['name'] . "</h2>";
        
        // Fetch and display a preview of associated images
        echo "<div class='album-preview' id='preview-" . $album['id'] . "'>";
        $images = $mysqli->query("SELECT * FROM images WHERE album_id=" . $album['id'] . " LIMIT 4"); // Limit to 3 images for the preview
        while ($image = $images->fetch_assoc()) {
            echo "<img class='album-preview-image' src='" . $image['image_path'] . "' alt='Image'>";
        }
        echo "</div>";
    }
}

// Fetch images for each album and create hidden popups
$albums->data_seek(0);
while ($album = $albums->fetch_assoc()) {
    echo "<div id='album-" . $album['id'] . "' class='w3-modal'>";
    echo "<div class='w3-modal-content w3-animate-zoom w3-center'>";
    $images = $mysqli->query("SELECT * FROM images WHERE album_id=" . $album['id']);
    while ($image = $images->fetch_assoc()) {
        echo "<img class='album-image w3-image' src='" . $image['image_path'] . "' alt='Image' onclick='closeAlbum(" . $album['id'] . ")'>";
    }
    echo "</div>";
    echo "</div>";
}
?>


    </main>

    <footer>
        <div class="footer-media">
            <div class="footer-social">            
                <p>Zapratite nas:</p>
                <a href="#"><i class="fab fa-facebook"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
            </div>
            <div class="footer-logo">
            <a href="index.php">
              <img src="../images/logo.png" alt="Dječji Vrtić Lane" class="logo-image">
            </a>
            </div>
            <div class="footer-contact">
                <p>Kontaktirajte nas:</p>
                <p>Adresa: Bogdanovačka 21, Osijek</p>
                <p>Email: info@djecji-vrtic-lane.hr</p>
                <p>Phone: +385 (91) 551 9494</p>
            </div>
        </div>
    </footer>
    <script src="../js/nav-toggle.js"></script>
    <script src="../js/gallery.js"></script>
    <script src="https://www.w3schools.com/lib/w3.js"></script>
</body>
</html>
