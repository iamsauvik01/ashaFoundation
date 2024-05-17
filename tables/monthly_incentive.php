<?php
// Include the database configuration file
require_once '../config.php';

// Handle form submission for deletion
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_id'])) {
    $delete_id = $_POST['delete_id'];
    $delete_sql = "DELETE FROM monthly_incentive_claim WHERE id = ?";
    $stmt = $conn->prepare($delete_sql);
    $stmt->bind_param("i", $delete_id);
    $stmt->execute();
    $stmt->close();
}

// Query to select all records from the monthly_incentive_claim table
$sql = "SELECT * FROM monthly_incentive_claim";

// Execute the query
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monthly Incentive Claim Data</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="navbar">
    <h2>Monthly Incentive Claim Data</h2>
    <div class="button_container">
        <button> 
            <a href="../forms/add_monthly_incentive.php">Add Data</a>
        </button>
        <button>
            <a href="../downloadRoutes/download_monthly_incentive.php">Download CSV</a>
        </button>
        <form method="post" action="">
            <input type="number" id="delete_id" name="delete_id" required>
            <button type="submit">Delete</button>
        </form>
    </div>
</div>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>ASHA Name</th>
            <th>Bank Account Number</th>
            <th>Bank Name</th>
            <th>Block Name</th>
            <th>PHC Name</th>
            <th>Subcenter Name</th>
            <th>District</th>
            <th>Month</th>
            <th>Year</th>
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
                echo "<td>".$row["asha_name"]."</td>";
                echo "<td>".$row["bank_account_number"]."</td>";
                echo "<td>".$row["bank_name"]."</td>";
                echo "<td>".$row["block_name"]."</td>";
                echo "<td>".$row["phc_name"]."</td>";
                echo "<td>".$row["subcenter_name"]."</td>";
                echo "<td>".$row["district"]."</td>";
                echo "<td>".$row["month"]."</td>";
                echo "<td>".$row["year"]."</td>";
                echo "</tr>";
            }
        } else {
            // Output message if no records found
            echo "<tr><td colspan='9'>No records found</td></tr>";
        }
        ?>
    </tbody>
</table>

</body>
</html>
