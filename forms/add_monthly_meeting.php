<?php
// Include the database configuration file
require_once '../config.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Extract form data
    $phc_date = $_POST['phc_date'];
    $subcenter_date = $_POST['subcenter_date'];
    $about = $_POST['about'];

    // Prepare and execute the SQL statement to insert data into the table
    $sql = "INSERT INTO monthly_meeting (phc_meeting_date, subcenter_meeting_date, about) VALUES ('$phc_date', '$subcenter_date', '$about')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close database connection
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monthly Meeting Form</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<h2>Monthly Meeting Form</h2>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <label for="phc_date">PHC Date:</label><br>
    <input type="date" id="phc_date" name="phc_date" required><br>

    <label for="subcenter_date">Subcenter Date:</label><br>
    <input type="date" id="subcenter_date" name="subcenter_date" required><br>

    <label for="about">About:</label><br>
    <textarea id="about" name="about" rows="4" required></textarea><br><br>

    <input type="submit" value="Submit">

    <button class="go-back-button">
        <a href="../tables/monthly_meeting.php">
            Go Back
        </a>
    </button>
    
</form>

</body>
</html>
