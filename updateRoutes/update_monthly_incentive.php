<?php
include '../config.php'; // Assuming config.php contains your database connection details

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all fields are filled
    if (!empty($_POST['id']) && !empty($_POST['asha_name']) && !empty($_POST['bank_account_number']) && !empty($_POST['bank_name']) && !empty($_POST['block_name']) && !empty($_POST['phc_name']) && !empty($_POST['subcenter_name']) && !empty($_POST['district']) && !empty($_POST['month']) && !empty($_POST['year'])) {
        
        // Sanitize input data
        $id = mysqli_real_escape_string($conn, $_POST['id']);
        $asha_name = mysqli_real_escape_string($conn, $_POST['asha_name']);
        $bank_account_number = mysqli_real_escape_string($conn, $_POST['bank_account_number']);
        $bank_name = mysqli_real_escape_string($conn, $_POST['bank_name']);
        $block_name = mysqli_real_escape_string($conn, $_POST['block_name']);
        $phc_name = mysqli_real_escape_string($conn, $_POST['phc_name']);
        $subcenter_name = mysqli_real_escape_string($conn, $_POST['subcenter_name']);
        $district = mysqli_real_escape_string($conn, $_POST['district']);
        $month = mysqli_real_escape_string($conn, $_POST['month']);
        $year = mysqli_real_escape_string($conn, $_POST['year']);

        // Update query
        $sql = "UPDATE monthly_incentive_claim SET asha_name='$asha_name', bank_account_number='$bank_account_number', bank_name='$bank_name', block_name='$block_name', phc_name='$phc_name', subcenter_name='$subcenter_name', district='$district', month='$month', year='$year' WHERE id='$id'";

        // Execute query
        if (mysqli_query($conn, $sql)) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
    } else {
        echo "All fields are required";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Update Monthly Incentive Claim</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>

<nav>
        <div class="logo-container">
        <img src="../Images/logo.png" alt="">
        <h3>ASHA Foundation</h3>
        </div>

        <div class="link-container">
            <a href="../admin.php">Go to Home</a>
        </div>
    </nav>

<h2>Update Monthly Incentive Claim</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
  <label for="id">ID:</label><br>
  <input type="text" id="id" name="id"><br>
  <label for="asha_name">ASHA Name:</label><br>
  <input type="text" id="asha_name" name="asha_name"><br>
  <label for="bank_account_number">Bank Account Number:</label><br>
  <input type="text" id="bank_account_number" name="bank_account_number"><br>
  <label for="bank_name">Bank Name:</label><br>
  <input type="text" id="bank_name" name="bank_name"><br>
  <label for="block_name">Block Name:</label><br>
  <input type="text" id="block_name" name="block_name"><br>
  <label for="phc_name">PHC Name:</label><br>
  <input type="text" id="phc_name" name="phc_name"><br>
  <label for="subcenter_name">Subcenter Name:</label><br>
  <input type="text" id="subcenter_name" name="subcenter_name"><br>
  <label for="district">District:</label><br>
  <input type="text" id="district" name="district"><br>
  <label for="month">Month:</label><br>
  <input type="text" id="month" name="month"><br>
  <label for="year">Year:</label><br>
  <input type="number" id="year" name="year"><br><br>
  <input type="submit" value="Update">
</form>

</body>
</html>
