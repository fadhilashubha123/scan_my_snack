<?php
include 'db.php';

$action = $_POST['action'] ?? $_GET['action'];

if ($action == 'add') {
    $name = $_POST['name'];
    $sugar = floatval($_POST['sugar']);
    $fat = floatval($_POST['fat']);
    $calories = floatval($_POST['calories']);

    // Evaluasi
    $evaluation = (($sugar <= 5) + ($fat <= 5) + ($calories <= 150)) >= 2 ? 'Sehat' : 'Tidak Sehat';

    $stmt = $conn->prepare("INSERT INTO snacks (name, sugar, fat, calories, evaluation) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sddds", $name, $sugar, $fat, $calories, $evaluation);
    $stmt->execute();
    $stmt->close();

    header("Location: about.php");
} elseif ($action == 'edit') {
    $id = intval($_GET['id']);
    $result = $conn->query("SELECT * FROM snacks WHERE id = $id");
    $snack = $result->fetch_assoc();

    // Render form edit
    include 'edit_form.php';
} elseif ($action == 'update') {
    $id = intval($_POST['id']);
    $name = $_POST['name'];
    $sugar = floatval($_POST['sugar']);
    $fat = floatval($_POST['fat']);
    $calories = floatval($_POST['calories']);

    $evaluation = (($sugar <= 5) + ($fat <= 5) + ($calories <= 150)) >= 2 ? 'Sehat' : 'Tidak Sehat';

    $stmt = $conn->prepare("UPDATE snacks SET name = ?, sugar = ?, fat = ?, calories = ?, evaluation = ? WHERE id = ?");
    $stmt->bind_param("sdddsi", $name, $sugar, $fat, $calories, $evaluation, $id);
    $stmt->execute();
    $stmt->close();

    header("Location: about.php");
} elseif ($action == 'delete') {
    $id = intval($_GET['id']);
    $stmt = $conn->prepare("DELETE FROM snacks WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();

    header("Location: about.php");
} else {
    echo "Aksi tidak valid.";
}
?>
