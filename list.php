<?php
$conn = mysqli_connect("127.0.0.1", "root", "root", "costume_closet", 8889);

$result = $conn->query("SELECT id, item, borrower, due_date, returned FROM loans ORDER BY id");?>
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
            <th>Actions</th>
        </tr>

        <?php
        if ($result->num_rows == 0) {
            echo "<tr><td colspan='6'>No loans yet. The closet is empty!</td></tr>";
        }
        ?>

        <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row["id"]; ?></td>
            <td><?php echo ($row["item"]); ?></td>
            <td><?php echo ($row["borrower"]); ?></td>
            <td><?php echo $row["due_date"]; ?></td>
            <td><?php echo $row["returned"] ? "Returned" : "Not Returned"; ?></td>
            <td>
                <a href="mark_returned.php?id=<?php echo $row['id']; ?>">Mark returned</a>
                <a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>