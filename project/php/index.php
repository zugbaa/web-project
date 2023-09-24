<?php
session_start();

$_SESSION['original_url'] = $_SERVER['REQUEST_URI'];

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
    <title>Početna - Vrtić Lane</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/styles.css">
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
        <div class="image-container">
            <div class="image-wrapper">
                <img src="../images/slika1.webp" alt="Image 1" class="rotating-image">
            </div>
            <div class="image-wrapper">
                <img src="../images/slika2.jpg" alt="Image 2" class="rotating-image">
            </div>
            <div class="image-wrapper">
                <img src="../images/slika3.webp" alt="Image 3" class="rotating-image">
            </div>
        </div>

        <div class="news">
            <h1>NOVO! Engleska igraonica za djecu od 3 - 7 godina. 1x Tjedno po 45 min. - Prijave su u tijeku! Veselimo se Vašem dolasku!</h2>
        </div>

        <div class="image-container1">
          <div class="image-item">
            <img src="../images/english.png">
            <h2>Situacijski engleski jezik</h2>
            <p>Nudimo redoviti desetosatni i poludnevni odgojno obrazovni program učenja situacijskog engleskog jezika gdje djeca uče spontano i opušteno u bogatom prostorno-materijalnom i poticajnom okruženju.</p>
          </div>
          <div class="image-item">
            <img src="../images/pencil.png">
            <h2>Engleska Igraonica</h2>
            <p>Za djecu od 3 - 7 godina. 1x Tjedno po 45 min. Nazovite nas i registrirajte se za besplatan ogledni sat!</p>
          </div>
          <div class="image-item">
            <img src="../images/library.png">
            <h2>Naša mala Knjižnica</h2>
            <p>Imamo svoju vlastitu knjižnicu sa pregrštom pomno odabranih slikovnica, knjiga, stručne literature za djecu i roditelje koje mogu svakodnevno posuđivati i čitati ih kod kuće.</p>
          </div>
        </div>

        <div class="project-header">
            <h1>Nedavni projekti:</h1>
        </div>
        
        <div class="image-container2">
          <div class="image-item2">
            <img src="../images/Jabuke.jpg">
            <h2>JABUKE</h2>
            <p>su najdraže voće u našem vrtiću, pa smo otišli u voćnjak kako bi vidjeli gdje jabuke rastu, zatim smo ih rezali, pravili kompot, pitu i štrudlu od jabuka i pili jabučni sok.</p>
          </div>
          <div class="image-item2">
            <img src="../images/mali_kuhari.jpg">
            <h2>MALI KUHAR</h2>
            <p>Ideja je potekla od jednog dječaka koji pomaže mami i baki u kuhanju. Dječak je rekao teti: „Meni se teta jedu kolači“, teta: „pa nemamo kolača“, dječak : „ajmo ih ispeći“. I tako je krenulo….</p>
          </div>
          <div class="image-item2">
            <img src="../images/Boje.jpg">
            <h2>ISTRAŽIVANJE BOJA</h2>
            <p>Volimo slikati i igrati se bojama pa ih miješamo i pravimo svoje nove nijanse i slikamo sa različitim rekvizitima. Istražujemo i upotrebljavamo razne materijale dok radimo naše pokuse.</p>
          </div>
          <div class="image-item2">
            <img src="../images/istrazujemo_slova.jpg">
            <h2>IGRA SLOVIMA</h2>
            <p>Djevojčice su poželjele naučiti pisati imena svojih prijatelja pa smo počeli istrživati slova i igrati se slovima na razne načine.</p>
          </div>
        </div>

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
    <script src="../js/script.js"></script>
</body>
</html>
