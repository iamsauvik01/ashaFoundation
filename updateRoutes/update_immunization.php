<?php
include '../config.php'; // Assuming config.php contains your database connection details

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all fields are filled
    if (!empty($_POST['id']) && !empty($_POST['dob']) && !empty($_POST['sender']) && !empty($_POST['visit_date']) && !empty($_POST['immunization_date'])) {
        
        // Sanitize input data
        $id = mysqli_real_escape_string($conn, $_POST['id']);
        $dob = mysqli_real_escape_string($conn, $_POST['dob']);
        $sender = mysqli_real_escape_string($conn, $_POST['sender']);
        $visit_date = mysqli_real_escape_string($conn, $_POST['visit_date']);
        $immunization_date = mysqli_real_escape_string($conn, $_POST['immunization_date']);

        // Update query
        $sql = "UPDATE immunization_info SET dob='$dob', sender='$sender', visit_date='$visit_date', immunization_date='$immunization_date' WHERE id='$id'";

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
<title>Update Immunization Info</title>
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

<h2>Update Immunization Info</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
  <label for="id">ID:</label><br>
  <input type="text" id="id" name="id"><br>
  <label for="dob">Date of Birth:</label><br>
  <input type="date" id="dob" name="dob"><br>
  <label for="sender">Gender:</label><br>
  <input type="text" id="sender" name="sender"><br>
  <label for="visit_date">Visit Date:</label><br>
  <input type="date" id="visit_date" name="visit_date"><br>
  <label for="immunization_date">Immunization Date:</label><br>
  <input type="date" id="immunization_date" name="immunization_date"><br><br>
  <input type="submit" value="Update">
</form>

</body>
</html>
