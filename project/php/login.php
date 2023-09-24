<?php

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = sprintf("SELECT * FROM user
                    WHERE email = '%s'",
                   $mysqli->real_escape_string($_POST["email"]));
    
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
    
    if ($user) {
        
        if (password_verify($_POST["password"], $user["password_hash"])) {
            
            session_start();
            
            session_regenerate_id();
            
            $_SESSION["user_id"] = $user["id"];
            
            if (isset($_SESSION['original_url'])) {
                $original_url = $_SESSION['original_url'];
                unset($_SESSION['original_url']); 
                header("Location: " . $original_url);
            exit;
            
            } else {
                header("Location: index.php");
                exit;
            }
        }
    }
    
    $is_invalid = true;
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
    
    <h1>Login</h1>

    
    <form method="post">
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email"
                value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">
        </div>
        
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
        </div>

        <div>
        <?php if ($is_invalid): ?>
        <em>Invalid login</em>
        <?php endif; ?>
        </div>
        
        <button>Log in</button>
    </form>
    
</body>
</html>







