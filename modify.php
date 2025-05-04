<?php
//open connection
include('conn.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM 5ia WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $nome = $row['nome'];
        $cognome = $row['cognome'];
        $assenze = $row['assenze'];
        $media_voti = $row['media_voti'];
    } else {
        echo "Record not found.";
        exit;
    }
} else {
    echo "ID not specified.";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $cognome = $_POST['cognome'];
    $assenze = $_POST['assenze'];
    $media_voti = $_POST['media_voti'];

    $update_sql = "UPDATE `5ia` SET nome='$nome', cognome='$cognome', assenze=$assenze, media_voti=$media_voti WHERE id=$id";

    if ($conn->query($update_sql) === TRUE) {
        echo "Record updated successfully. <a href='index.php'>Go back</a>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modify Record</title>
</head>
<body>
    <h1>Modify Student Record</h1>
    <form method="POST">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" value="<?php echo $nome; ?>" required><br><br>

        <label for="cognome">Cognome:</label>
        <input type="text" id="cognome" name="cognome" value="<?php echo $cognome; ?>" required><br><br>

        <label for="assenze">Assenze:</label>
        <input type="number" id="assenze" name="assenze" value="<?php echo $assenze; ?>" required><br><br>

        <label for="media_voti">Media Voti:</label>
        <input type="number" id="media_voti" name="media_voti" value="<?php echo $media_voti; ?>" required><br><br>

        <input type="submit" value="Update">
    </form>
</body>
</html>
<?php
    // close connection
    $conn->close();
?>