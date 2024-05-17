<?php
include '../config.php'; // Assuming config.php contains your database connection details

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all fields are filled
    if (!empty($_POST['id']) && !empty($_POST['phc_meeting_date']) && !empty($_POST['about']) && !empty($_POST['subcenter_meeting_date'])) {
        
        // Sanitize input data
        $id = mysqli_real_escape_string($conn, $_POST['id']);
        $phc_meeting_date = mysqli_real_escape_string($conn, $_POST['phc_meeting_date']);
        $about = mysqli_real_escape_string($conn, $_POST['about']);
        $subcenter_meeting_date = mysqli_real_escape_string($conn, $_POST['subcenter_meeting_date']);

        // Update query
        $sql = "UPDATE monthly_meeting SET phc_meeting_date='$phc_meeting_date', about='$about', subcenter_meeting_date='$subcenter_meeting_date' WHERE id='$id'";

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
<title>Update Monthly Meeting</title>
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

<h2>Update Monthly Meeting</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
  <label for="id">ID:</label><br>
  <input type="text" id="id" name="id"><br>
  <label for="phc_meeting_date">PHC Meeting Date:</label><br>
  <input type="date" id="phc_meeting_date" name="phc_meeting_date"><br>
  <label for="about">About:</label><br>
  <textarea id="about" name="about" rows="4" cols="50"></textarea><br>
  <label for="subcenter_meeting_date">Subcenter Meeting Date:</label><br>
  <input type="date" id="subcenter_meeting_date" name="subcenter_meeting_date"><br><br>
  <input type="submit" value="Update">
</form>

</body>
</html>
