<?php
include 'conn.php';  // Includo il file centralizzato per la connessione al DB
// devo lavorare con la sessione, quindi mi serve il session_start()
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = mysqli_real_escape_string($conn, $_POST['username']);
    $pass = mysqli_real_escape_string($conn, $_POST['password']);

    // Verifico username e password
    $sql = "SELECT * FROM users WHERE username = '$user' AND password = MD5('$pass')";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION['username'] = $user; // Memorizzo l'username in sessione
        $row = $result->fetch_assoc(); 
        $_SESSION['ruolo'] = $row['ruolo']; // Memorizzo anche il ruolo che però è nel record(!!)
        header("location: index.php");  // Fatto tutto => faccio redirect alla index
        exit();
    } else {
        $error = "Invalid Username or Password!";
    }

    // mi devo sempre ricordare di chiedere la connessione aperta in conn.php!!
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    <style><?php include "style.css"; ?>
    	body {
        text-align: center;
        }
    </style>
</head>
<body>
    <h2>Login Form</h2>
    <form method="POST" action="login.php">
        <label>Username:</label>
        <input type="text" name="username" required><br>

        <label>Password:</label>
        <input type="password" name="password" required><br>

        <button type="submit">Login</button>
    </form>

    <?php if (isset($error)) { echo "<p style='color:red;'>$error</p>"; } ?>
</body>
</html>