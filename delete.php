<?php
include 'conn.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM `scuola`.`5ia` WHERE id='$id'";
    $result = $conn->query($sql);
    $quintaia = $result->fetch_assoc();
}            

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sql = "DELETE FROM `scuola`.`5ia` WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
        header("Location: index.php");
        exit;
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<form method="POST" action="">
    <p>Are you sure you want to delete the record for:</p>
    <p><strong>id:</strong> <?php echo $quintaia['id']; ?> <strong>nome:</strong> <?php echo $quintaia['nome']; ?></p>
    <input type="submit" value="Delete">
</form>
