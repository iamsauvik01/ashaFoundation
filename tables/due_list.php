<?php
// Include the database configuration file
require_once '../config.php';

// Handle the form submission for deletion
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_id'])) {
    $delete_id = intval($_POST['delete_id']);
    $delete_sql = "DELETE FROM due_list_immunization WHERE id = ?";
    $stmt = $conn->prepare($delete_sql);
    $stmt->bind_param("i", $delete_id);
    $stmt->execute();
    $stmt->close();
}

// Query to select all records from the due_list_immunization table
$sql = "SELECT * FROM due_list_immunization";

// Execute the query
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Due List of Children for Immunization</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="navbar">
        <h2>Due List of Children for Immunization</h2>
        <div class="button-container">
            <button>
                <a href="../forms/add_due_list.php">Add Data</a>
            </button>
            <button>
                <a href="../downloadRoutes/download_due_list.php">Download CSV</a>
            </button>
        </div>
        <form method="POST" action="">
            <input type="number" id="delete_id" name="delete_id" required>
            <button type="submit">Delete</button>
        </form>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name of Child</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Vaccine For</th>
                <th>Name of Father/Mother</th>
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
                    echo "<td>".$row["child_name"]."</td>";
                    echo "<td>".$row["age"]."</td>";
                    echo "<td>".$row["sender"]."</td>";
                    echo "<td>".$row["vaccine_for"]."</td>";
                    echo "<td>".$row["parent_name"]."</td>";
                    echo "</tr>";
                }
            } else {
                // Output message if no records found
                echo "<tr><td colspan='6'>No records found</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
