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
    <title>About</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/about.css">
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
    <section id="about" class="section">
        <div class="content">
            <h2>O nama</h2>
            <p>Dječji vrtić Lane je novoosnovana privatna predškolska ustanova za jednu mješovitu grupu. Smješten je u posebno pripremljenom prostoru lijepih obiteljskih kuća na Uskim Njivama gdje je ulica udaljena od velikih prometnica i parkirališta. Nalazi se u sastavu obiteljske kuće i ima svoje vlastito ograđeno i opremljeno igralište.</p>
        </div>
        <div class="image">
          <img src="../images/vrtic.jpg" alt="Image Description">
        </div>
    </section>

    <section id="experience" class="section">
        <div class="content">
            <h2>Iskustvo</h2>
            <p>Dječji vrtić je koncipiran na dugogodišnjem iskustvu i završenim studijem vlasnice u Kanadi (Toronto-Ryerson University) gdje se steklo bogato iskustvo radeći i organizirajući raznolike dječje programe (Montessori, High Scope,vježbaonica, obiteljski centri, igraonice u bolnicama, rad sa djecom s posebnim potrebama, itd.).</p>
        </div>
        <div class="image">
          <img src="../images/iskustvo.webp" alt="Image Description">
        </div>
    </section>

    <section id="environment" class="section">
        <div class="content">
            <h2>Okruženje</h2>
            <p>Kao majci troje djece, vlasnici vrtića želja je stvoriti okružje u kojem će se djeca osjećati kao u vlastitom domu. U tom smislu uređen je i osmišljen prostor vrtića, tj. ostvareno je  obiteljsko ozračje. Vrtić obiluje bogato opremljenim prostorom i didaktičkim materijalima koji djeci omogućava aktivno istraživanje i učenje uz kreativno osmišljene poticaje od strane odgojiteljica.</p>
        </div>
        <div class="image">
          <img src="../images/okruzenje.jpg" alt="Image Description">
        </div>
    </section>

    <section id="approach" class="section">
        <div class="content">
            <h2>Pristup</h2>
            <p>Rad u jednoj mješovitoj odgojnoj skupini omogućava individualni pristup svakom djetetu te planiranje bazirano prema njegovim sposobnostima i interesima. Okružje sliči realnom životu gdje djeca rastu integrirajući se i učeći jedni od drugih(mlađi od starijih, stariji od mlađih).</p>
        </div>
        <div class="image">
          <img src="../images/pristup.webp" alt="Image Description">
        </div>
    </section>
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
</body>
</html>
