<?php
include '../config.php'; // Assuming config.php contains your database connection details

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all fields are filled
    if (!empty($_POST['id']) && !empty($_POST['mother_name']) && !empty($_POST['date']) && !empty($_POST['time']) && !empty($_POST['place_of_birth']) && !empty($_POST['sender'])) {
        
        // Sanitize input data
        $id = mysqli_real_escape_string($conn, $_POST['id']);
        $mother_name = mysqli_real_escape_string($conn, $_POST['mother_name']);
        $date = mysqli_real_escape_string($conn, $_POST['date']);
        $time = mysqli_real_escape_string($conn, $_POST['time']);
        $place_of_birth = mysqli_real_escape_string($conn, $_POST['place_of_birth']);
        $sender = mysqli_real_escape_string($conn, $_POST['sender']);

        // Update query
        $sql = "UPDATE record_of_birth SET mother_name='$mother_name', date='$date', time='$time', place_of_birth='$place_of_birth', sender='$sender' WHERE id='$id'";

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
<title>Update Record of Birth</title>
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

<h2>Update Record of Birth</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
  <label for="id">ID:</label><br>
  <input type="text" id="id" name="id"><br>
  <label for="mother_name">Mother's Name:</label><br>
  <input type="text" id="mother_name" name="mother_name"><br>
  <label for="date">Date:</label><br>
  <input type="date" id="date" name="date"><br>
  <label for="time">Time:</label><br>
  <input type="time" id="time" name="time"><br>
  <label for="place_of_birth">Place of Birth:</label><br>
  <input type="text" id="place_of_birth" name="place_of_birth"><br>
  <label for="sender">Sender:</label><br>
  <input type="text" id="sender" name="sender"><br><br>
  <input type="submit" value="Update">
</form>

</body>
</html>
