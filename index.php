<?php
    // per poter utilizzare la sessionela devo avviare
    session_start();
    // Verifico se l'utente è loggato
    if (!isset($_SESSION['username'])) {
        // se nessun utente è loggato faccio il redirect alla pagina di login
        header('Location: login.php');
        exit();
    }

    // !! => se arrivo qui vuol dire che nella SESSION c'è un utente autenticato, quindi posso connettermi al DB e recuperare gli studenti
    include('conn.php');
    // gli studenti sono contenuti nella tabella 5ia
    $sql = "SELECT * FROM `5ia`";
    $result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Studenti</title>
</head>
<body>
    <h1>Elenco degli studenti</h1>
    <h3>Tipo accesso: <strong><?= $_SESSION['ruolo'] ?></strong></h3>
    <table style="border: 1 solid black;">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Cognome</th>
            <th>Assenze</th>
            <th>Media Voti</th>
            <?php if ($_SESSION['ruolo'] == "docente") { ?>
                <th>Azioni docente</th>
            <?php } ?>
        </tr>
        <?php
        // se la query sql restituisce ALMENO  una riga, allora riporto per ciascun record una <TR> della tabella
        if ($result->num_rows > 0) {
            // il ciclo si ripete finché ci sono righe da leggere; fetch_assoc() restituisce false quando i record sono finiti!
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["id"] . "</td>
                        <td>" . $row["nome"] . "</td>
                        <td>" . $row["cognome"] . "</td>
                        <td>" . $row["assenze"] . "</td>
                        <td>" . $row["media_voti"] . "</td>
                    ";
                    // le azioni le mostro solo se il ruolo dell'utente che ho autenticato nella pagina di login è un "docente"
                    if ($_SESSION['ruolo'] == "docente") {
                        echo "<td>
                            <a href='modify.php?id=" . $row["id"] . "'>Modifica</a><a>    </a>
                            <a href='delete.php?id=" . $row["id"] . "'>Elimina</a>
                            </td>
                        </tr>";
                    }
            }
        } else {
            echo "<tr><td colspan='6'>Nessuno studente nella tabella</td></tr>";
        }
        ?>
    </table>
    <?php if ($_SESSION['ruolo'] == "docente") { ?>    
        <a href='create.php?id=" . $row["id"] . "'>Crea un nuovo studente</a>
    <?php } ?>
    <a href='logout.php'>Logout</a>
</body>
</html>
<?php
    // mi devo sempre ricordare di chiedere la connessione aperta in conn.php!!
    $conn->close();
?>