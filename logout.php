<?php
    // logout.php
    session_start();
    session_unset();
    session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Logged Out</title>
    
    <!-- Meta refresh: dopo 5 secondi, redirect a login.php -->
    <meta http-equiv="refresh" content="5;url=login.php">
    
    <script>
        let countdown = 5; // Countdown a partire da 5 secondi
        function updateCountdown() {
            const countdownElement = document.getElementById('countdown');
            countdownElement.textContent = countdown;
            countdown--;
            if (countdown >= 0) {
                setTimeout(updateCountdown, 1000);
            }
        }
        window.onload = updateCountdown;
    </script>

    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin-top: 100px;
        }
    </style>
</head>
<body>
    <h1>Sei stato espulso dal programma!! ;-).</h1>
    <p>Ti sto per rimandare... alla <a href="login.php">login page</a> in <span id="countdown">5</span> seconds...</p>
</body>
</html>