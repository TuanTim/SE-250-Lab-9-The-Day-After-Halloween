<?php
$conn = mysqli_connect("localhost", "root", "", "costume_closet");

$result = $conn->query("SELECT id, item, borrower, due_date, returned FROM costume_closet ORDER BY id");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Costume Closet Loans</title>
</head>
<body>
    <h1>Costume Closet Loans</h1>

    <p><a href="add.php">Add a new loan</a></p>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Item</th>
            <th>Borrower</th>
            <th>Due Date</th>
            <th>Status</th>
        </tr>

        <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row["id"]; ?></td>
            <td><?php echo ($row["item"]); ?></td>
            <td><?php echo ($row["borrower"]); ?></td>
            <td><?php echo $row["due_date"]; ?></td>
            <td><?php echo $row["returned"] ? "Returned" : "Not Returned"; ?></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>