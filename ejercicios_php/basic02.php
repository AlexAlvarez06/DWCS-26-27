<?php
if (isset($_GET["user"]) && isset($_GET["password"])) {
    $user = strtolower($_GET["user"]);
    $password = strtolower($_GET["password"]);

    $isValid = true;
    $vocales = ["a", "e", "i", "o", "u"];

    foreach ($vocales as $vocal) {
        if (strpos($user, $vocal) !== false && strpos($password, $vocal) !== false) {
            $isValid = false;
            break;
        }
    }

    if ($isValid) {
        echo "<h1>Welcome, " . htmlspecialchars($_GET['user']) . "</h1>";
        echo '<p>Click the link below to download your file:</p>';
        echo '<a href="image.jpg" download>Download Image</a>';
    } else {
        echo "User os pass incorrect...";
    }
} else {
    echo "Please provide user and password parameters in the URL.";
}

