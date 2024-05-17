<?php
// Include the database configuration file
require_once '../config.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Extract form data
    $dob = $_POST['dob'];
    $sender = $_POST['sender'];
    $visit_date = $_POST['visit_date'];
    $immunization_date = $_POST['immunization_date'];

    // Prepare and execute the SQL statement to insert data into the table
    $sql = "INSERT INTO immunization_info (dob, sender, visit_date, immunization_date) VALUES ('$dob', '$sender', '$visit_date', '$immunization_date')";

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
    <title>Add Immunization</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<h2>Add Immunization</h2>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <label for="dob">Date of Birth:</label><br>
    <input type="date" id="dob" name="dob" required><br>

    <label for="sender">Gender:</label><br>
    <input type="text" id="sender" name="sender" required><br>

    <label for="visit_date">Date of Visit for HBNC:</label><br>
    <input type="date" id="visit_date" name="visit_date" required><br>

    <label for="immunization_date">Date for Immunization:</label><br>
    <input type="date" id="immunization_date" name="immunization_date" required><br><br>

    <input type="submit" value="Submit">
    <button class="go-back-button">
        <a href="../tables/immunization.php">
            Go Back
        </a>
    </button>
</form>

</body>
</html>
