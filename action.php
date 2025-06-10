<?php
include 'db.php';

// test dari hirzi

function evaluasiSnack($sugar, $fat, $calories) {
    if ($sugar > 20 || $fat > 15 || $calories > 250) {
        return "Tidak Sehat";
    } else {
        return "Sehat";
    }
}

if (isset($_POST['create'])) {
    $nama = $_POST['snackName'];
    $sugar = $_POST['sugar'];
    $fat = $_POST['fat'];
    $calories = $_POST['calories'];
    $hasil = evaluasiSnack($sugar, $fat, $calories);

    $stmt = $conn->prepare("INSERT INTO snack_history (nama, gula, lemak, kalori, hasil) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("siiis", $nama, $sugar, $fat, $calories, $hasil);
    $stmt->execute();
    header("Location: index.php");
}
?>
