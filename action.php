<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['create'])) {
        $name = $_POST['name'];
        $sugar = $_POST['sugar'];
        $fat = $_POST['fat'];
        $calories = $_POST['calories'];
        $evaluation = $_POST['evaluation'];

        // Simpan ke database
        $stmt = $conn->prepare("INSERT INTO snack (name, sugar, fat, calories, evaluation) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sddds", $name, $sugar, $fat, $calories, $evaluation);
        $stmt->execute();
        $stmt->close();

        // Redirect kembali ke halaman utama
        header("Location: index.php");
        exit();
    }

    if (isset($_POST['update'])) {
        $id = intval($_POST['id']);
        $name = $_POST['name'];
        $sugar = $_POST['sugar'];
        $fat = $_POST['fat'];
        $calories = $_POST['calories'];
        $evaluation = $_POST['evaluation'];

        $stmt = $conn->prepare("UPDATE pasien SET name = ?, sugar = ?, fat = ?, calories = ?, evaluation= ? WHERE id = ?");
        $stmt->bind_param("sissi", $name, $sugar, $fat, $calories, $evaluation, $id);
        $stmt->execute();
        $stmt->close();

        header('Location: index.php');
        exit;
    }
}

if (isset($_GET['delete_id'])) {
    $id = intval($_GET['delete_id']);
    $stmt = $conn->prepare("DELETE FROM pasien WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();

    header('Location: index.php');
    exit;
}
?>
