<?php
// Include the database configuration file
require_once '../config.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Extract form data
    $child_name = $_POST['child_name'];
    $age = $_POST['age'];
    $sender = $_POST['sender'];
    $vaccine_for = $_POST['vaccine_for'];
    $parent_name = $_POST['parent_name'];

    // Prepare and execute the SQL statement to insert data into the table
    $sql = "INSERT INTO due_list_immunization (child_name, age, sender, vaccine_for, parent_name) VALUES ('$child_name', '$age', '$sender', '$vaccine_for', '$parent_name')";

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
    <title>Due List of Children for Immunization</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<h2>Due List of Children for Immunization</h2>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <label for="child_name">Name of Child:</label><br>
    <input type="text" id="child_name" name="child_name" required><br>

    <label for="age">Age:</label><br>
    <input type="text" id="age" name="age" required><br>

    <label for="sender">Gender:</label><br>
    <input type="text" id="sender" name="sender" required><br>

    <label for="vaccine_for">Vaccine For:</label><br>
    <input type="text" id="vaccine_for" name="vaccine_for" required><br>

    <label for="parent_name">Name of Father/Mother:</label><br>
    <input type="text" id="parent_name" name="parent_name" required><br><br>

    <input type="submit" value="Submit">
    <button class="go-back-button">
        <a href="../tables/due_list.php">
            Go Back
        </a>
    </button>
</form>

</body>
</html>
