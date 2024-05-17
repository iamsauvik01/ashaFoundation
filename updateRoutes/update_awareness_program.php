<?php
include '../config.php'; // Assuming config.php contains your database connection details

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all fields are filled
    if (!empty($_POST['id']) && !empty($_POST['date']) && !empty($_POST['place']) && !empty($_POST['attendants']) && !empty($_POST['topic'])) {
        
        // Sanitize input data
        $id = mysqli_real_escape_string($conn, $_POST['id']);
        $date = mysqli_real_escape_string($conn, $_POST['date']);
        $place = mysqli_real_escape_string($conn, $_POST['place']);
        $attendants = mysqli_real_escape_string($conn, $_POST['attendants']);
        $topic = mysqli_real_escape_string($conn, $_POST['topic']);

        // Update query
        $sql = "UPDATE awareness_program SET date='$date', place='$place', attendants='$attendants', topic='$topic' WHERE id='$id'";

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
<title>Update Awareness Program</title>
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

<h2>Update Awareness Program</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
  <label for="id">ID:</label><br>
  <input type="text" id="id" name="id"><br>
  <label for="date">Date:</label><br>
  <input type="date" id="date" name="date"><br>
  <label for="place">Place:</label><br>
  <input type="text" id="place" name="place"><br>
  <label for="attendants">Attendants:</label><br>
  <input type="number" id="attendants" name="attendants"><br>
  <label for="topic">Topic:</label><br>
  <input type="text" id="topic" name="topic"><br><br>
  <input type="submit" value="Update">
</form>

</body>
</html>
