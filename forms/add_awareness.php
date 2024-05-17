<?php
// Include the database configuration file
require_once '../config.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Extract form data
    $date = $_POST['date'];
    $place = $_POST['place'];
    $attendants = $_POST['attendants'];
    $topic = $_POST['topic'];

    // Prepare and execute the SQL statement to insert data into the table
    $sql = "INSERT INTO awareness_program (date, place, attendants, topic) VALUES ('$date', '$place', '$attendants', '$topic')";

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
    <title>Awareness Program Form</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<h2>Awareness Program Form</h2>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <label for="date">Date:</label><br>
    <input type="date" id="date" name="date" required><br>

    <label for="place">Place:</label><br>
    <input type="text" id="place" name="place" required><br>

    <label for="attendants">Number of Attendants:</label><br>
    <input type="number" id="attendants" name="attendants" required><br>

    <label for="topic">Topic:</label><br>
    <input type="text" id="topic" name="topic" required><br><br>

    <input type="submit" value="Submit">
    <button class="go-back-button">
        <a href="../tables/awareness_program.php">
            Go Back
        </a>
    </button>
</form>

</body>
</html>
