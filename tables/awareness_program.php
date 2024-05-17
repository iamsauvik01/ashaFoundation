<?php
// Include the database configuration file
require_once '../config.php';

// Handle form submission for deletion
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_id'])) {
    $delete_id = $_POST['delete_id'];
    $delete_sql = "DELETE FROM awareness_program WHERE id = ?";
    $stmt = $conn->prepare($delete_sql);
    $stmt->bind_param("i", $delete_id);
    $stmt->execute();
    $stmt->close();
}

// Query to select all records from the awareness_program table
$sql = "SELECT * FROM awareness_program";

// Execute the query
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Awareness Program Data</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <div class="navbar">
        <h2>Awareness Program Data</h2>
        <div class="button-container">
            <button>
                <a href="../forms/add_awareness.php">Add Data</a>
            </button>
            <button>
                <a href="../downloadRoutes/download_awareness_program.php">Download CSV</a>
            </button>
        </div>
        <form method="post" action="">
            <!-- <label for="delete_id">Delete Record by ID:</label> -->
            <input type="number" id="delete_id" name="delete_id" required>
            <button type="submit">Delete</button>
        </form>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Date</th>
                <th>Place</th>
                <th>Number of Attendants</th>
                <th>Topic</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Check if any records were returned
            if ($result->num_rows > 0) {
                // Loop through each row of the result set
                while($row = $result->fetch_assoc()) {
                    // Output data from each row into table rows
                    echo "<tr>";
                    echo "<td>".$row["id"]."</td>";
                    echo "<td>".$row["date"]."</td>";
                    echo "<td>".$row["place"]."</td>";
                    echo "<td>".$row["attendants"]."</td>";
                    echo "<td>".$row["topic"]."</td>";
                    echo "</tr>";
                }
            } else {
                // Output message if no records found
                echo "<tr><td colspan='5'>No records found</td></tr>";
            }
            ?>
        </tbody>
    </table>

</body>
</html>
