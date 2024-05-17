<?php
// Include the database configuration file
require_once '../config.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Extract form data
    $name = $_POST['name'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $sender = $_POST['sender'];

    // Prepare and execute the SQL statement to insert data into the table
    $sql = "INSERT INTO record_of_death (name, date, time, sender) VALUES ('$name', '$date', '$time', '$sender')";

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
    <title>Record of Death Form</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<h2>Record of Death Form</h2>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <label for="name">Name:</label><br>
    <input type="text" id="name" name="name" required><br>

    <label for="date">Date:</label><br>
    <input type="date" id="date" name="date" required><br>

    <label for="time">Time:</label><br>
    <input type="time" id="time" name="time" required><br>

    <label for="sender">Gender:</label><br>
    <input type="text" id="sender" name="sender" required><br><br>

    <input type="submit" value="Submit">
    <button class="go-back-button">
        <a href="../tables/record_death.php">
            Go Back
        </a>
    </button>
</form>

</body>
</html>
