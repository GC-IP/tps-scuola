<?php
include 'conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $cognome = $_POST['cognome'];
    $assenze = $_POST['assenze'];
    $media_voti = $_POST['media_voti'];

    $sql = "INSERT INTO scuola.5ia (id, nome, cognome, assenze, media_voti)
            VALUES ('$id', '$nome', '$cognome', '$assenze', '$media_voti')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        header("Location: index.php");
        exit;
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<form method="POST" action="">
    id: <input type="text" name="id" required><br>
    nome: <input type="text" name="nome" required><br>
    cognome: <input type="text" name="cognome" required><br>
    assenze: <input type="number" name="assenze" required><br>
    media_voti: <input type="number" name="media_voti" required><br>
    <input type="submit" value="Create studente di 5ia">
</form>