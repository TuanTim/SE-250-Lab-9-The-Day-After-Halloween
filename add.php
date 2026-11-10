<?php
$conn = mysqli_connect("localhost", "root", "", "costume_closet");

// Runs only when the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $item = $_POST["item"];
    $borrower = $_POST["borrower"];
    $due_date = $_POST["due_date"];

    // returned is not listed, so it uses the default (0 = still out)
    $stmt = $conn->prepare("INSERT INTO costume_closet (item, borrower, due_date) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $item, $borrower, $due_date);
    $stmt->execute();
    $stmt->close();

    // Go to the list after saving
    header("Location: list.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Loan</title>
</head>
<body>
    <h1>Add a New Loan</h1>

    <form method="post" action="add.php">
        <p>
            <label>Item:</label><br>
            <input type="text" name="item" maxlength="60" required>
        </p>
        <p>
            <label>Borrower:</label><br>
            <input type="text" name="borrower" maxlength="60" required>
        </p>
        <p>
            <label>Due date:</label><br>
            <input type="date" name="due_date" required>
        </p>
        <p>
            <button type="submit">Save Loan</button>
        </p>
    </form>

</body>
</html>