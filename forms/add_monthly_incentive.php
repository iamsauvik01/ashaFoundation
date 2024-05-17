<?php
// Include the database configuration file
require_once '../config.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Extract form data
    $asha_name = $_POST['asha_name'];
    $bank_account_number = $_POST['bank_account_number'];
    $bank_name = $_POST['bank_name'];
    $block_name = $_POST['block_name'];
    $phc_name = $_POST['phc_name'];
    $subcenter_name = $_POST['subcenter_name'];
    $district = $_POST['district'];
    $month = $_POST['month'];
    $year = $_POST['year'];

    // Prepare and execute the SQL statement to insert data into the table
    $sql = "INSERT INTO monthly_incentive_claim (asha_name, bank_account_number, bank_name, block_name, phc_name, subcenter_name, district, month, year) 
            VALUES ('$asha_name', '$bank_account_number', '$bank_name', '$block_name', '$phc_name', '$subcenter_name', '$district', '$month', '$year')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monthly Incentive Claim Form</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<h2>Monthly Incentive Claim Form</h2>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <label for="asha_name">ASHA Name:</label><br>
    <input type="text" id="asha_name" name="asha_name" required><br>

    <label for="bank_account_number">Bank Account Number:</label><br>
    <input type="text" id="bank_account_number" name="bank_account_number" required><br>

    <label for="bank_name">Bank Name:</label><br>
    <input type="text" id="bank_name" name="bank_name" required><br>

    <label for="block_name">Block Name:</label><br>
    <input type="text" id="block_name" name="block_name" required><br>

    <label for="phc_name">PHC Name:</label><br>
    <input type="text" id="phc_name" name="phc_name" required><br>

    <label for="subcenter_name">Subcenter Name:</label><br>
    <input type="text" id="subcenter_name" name="subcenter_name" required><br>

    <label for="district">District:</label><br>
    <input type="text" id="district" name="district" required><br>

    <label for="month">Month:</label><br>
    <input type="text" id="month" name="month" required><br>

    <label for="year">Year:</label><br>
    <input type="text" id="year" name="year" required><br><br>

    <input type="submit" value="Submit">
    <button class="go-back-button">
        <a href="../tables/monthly_incentive.php">
            Go Back
        </a>
    </button>
</form>

</body>
</html>
