<?php
// connect to the database
$conn = mysqli_connect("127.0.0.1", "root", "root", "costume_closet", 8889);

// get the loan ID
$id = 0;

if (isset($_POST["id"])) {
    $id = (int) $_POST["id"];
}

// delete the loan
if ($id > 0) {
    $stmt = $conn->prepare("DELETE FROM loans WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
}

// go back to the loan list
header("Location: list.php");
exit;
?>
