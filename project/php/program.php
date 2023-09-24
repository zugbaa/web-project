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
    <title>Program</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/program.css">
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
      <div class="programi">
        <div class="text">
          <h2>Engleski jezik</h2>
          <p>Nudimo redoviti desetosatni i poludnevni odgojno obrazovni program učenja situacijskog engleskog jezika gdje djeca uče spontano i opušteno u bogatom prostorno-materijalnom i poticajnom okruženju.</p>          
          <p>Program je verificiran od strane Ministarstva znanosti, obrazovanja i sporta, i provodi se od strane odgojitelja certificaranim za provođenje engleskog programa.</p>            
          <p>Program se velikim dijelom bazira na High-Scope metodi tzv. "Hands on" i podijeljen je u tri glavna segmenta "Plan-do-review" gdje se djecu potiče na samostalnost, istraživanje, donošenje zaključaka, rješavanje problema, slobodu izbora aktivnosti (sudjeluju u planiranju svojih aktivnosti, materijala koje će koristiti, itd.), i nakon toga dolazi prisjećanje gdje zaokružuju jednu cjelinu svoga dana. Ovaj pristup se temelji na radu psihologa Jeana Piageta i Deweya (zagovornika konstruktivističkog pristupa odgoju i učenju)...</p>
        </div>
        <div class="image-container">
          <img src="../images/en.png" alt="">
        </div>         
      </div>

      <div class="programi">
        <div class="image-container">
          <img src="../images/talent.png" alt="">
        </div> 
        <div class="text">
          <h2>Buđenje talenta!</h2>
          <p>Uz bogat redovni program u sigurnom, poticajnom i ugodnom okruženju planiramo ponuditi i veliki broj dodatnih programa: engleska igraonica za one koji ne pohađaju naš vrtić, kreativna radionica, i druge ovisno o interesu roditelja.</p>         
        </div>        
      </div>

      <div class="programi">
        <div class="text">
          <h2>Suradnja sa roditeljima! </h2>
          <p>Polazeći od činjenice da su roditelji prvi odgajatelji i najbolji poznavatelji svoje djece, oslanjamo se i na njihove prijedloge i u suradnji s njima osmišljavamo programe i aktivnosti za njihovu djecu.</p>                
        </div>
        <div class="image-container">
          <img src="../images/meeting.webp" alt="">
        </div>         
      </div>

      <div class="programi">
        <div class="image-container">
          <img src="../images/skillful.png" alt="">
        </div>   
        <div class="text">
          <h2>Vješt i Iskusan Tim ljudi</h2>
          <p>Naše stručne odgojiteljice neprestano prate dijete i njegove aktivnosti, bilježe i dokumentiraju što dijete radi, njegove iskaze i analiziraju kako dijete uči jer na taj način se planiraju nova i primjerena iskustava djeteta.</p>                
          <p>Individualiziranim pristupom od strane osjećajnih i motiviranih odgojiteljica, nastojimo primjenjivati načela, metode i djelatnosti koje će kod svakog djeteta rezultirati razvojno i poticajno na svim područjima njegove osobnosti uvažavajući i poštivajući potrebe, sposobnosti i interese svakog djeteta.</p>
        </div>      
      </div>

      <div class="programi">
        <div class="text">
          <h2>Jelovnik</h2>
          <p>Naš fini jelovnik Svakodnevno imamo 4 obroka (doručak, voćna užina, ručak, užina) a cilj nam je da naša hrana bude raznovrsna, svježa i kuhana pa su voće i povrće naš svakodnevni meni.</p>                
          <p>Potičemo djecu na samostalnost pri jelu i samoposluživanje pri obrocima.</p>                
          <p>Svako jutro pečemo svoj integralni kruh.</p>
        </div>
        <div class="image-container">
          <img src="../images/meal.png" alt="">
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
</body>
</html>
