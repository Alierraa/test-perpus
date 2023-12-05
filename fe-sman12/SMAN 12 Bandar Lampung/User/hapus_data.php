<?php
session_start();
include 'config.php';

$idToDelete = isset($_GET['id']) ? $_GET['id'] : '';
$table_name = isset($_GET['name']) ? $_GET['name'] : '';

if (!empty($idToDelete)) {
    $sqlDelete = "DELETE FROM $table_name WHERE id = '$idToDelete'";
    $resultDelete = mysqli_query($conn, $sqlDelete);

    if (!$resultDelete) {
        echo "Error deleting record: " . mysqli_error($conn);
    } else {
        header("Location: " . $_SERVER['HTTP_REFERER']);
    }
} else {
    echo "Invalid request";
}
mysqli_close($conn);
?>
