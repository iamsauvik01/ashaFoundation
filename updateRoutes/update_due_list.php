<?php
include '../config.php'; // Assuming config.php contains your database connection details

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all fields are filled
    if (!empty($_POST['id']) && !empty($_POST['child_name']) && !empty($_POST['age']) && !empty($_POST['sender']) && !empty($_POST['vaccine_for']) && !empty($_POST['parent_name'])) {
        
        // Sanitize input data
        $id = mysqli_real_escape_string($conn, $_POST['id']);
        $child_name = mysqli_real_escape_string($conn, $_POST['child_name']);
        $age = mysqli_real_escape_string($conn, $_POST['age']);
        $sender = mysqli_real_escape_string($conn, $_POST['sender']);
        $vaccine_for = mysqli_real_escape_string($conn, $_POST['vaccine_for']);
        $parent_name = mysqli_real_escape_string($conn, $_POST['parent_name']);

        // Update query
        $sql = "UPDATE due_list_immunization SET child_name='$child_name', age='$age', sender='$sender', vaccine_for='$vaccine_for', parent_name='$parent_name' WHERE id='$id'";

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
<title>Update Due List Immunization</title>
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

<h2>Update Due List Immunization</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
  <label for="id">ID:</label><br>
  <input type="text" id="id" name="id"><br>
  <label for="child_name">Child Name:</label><br>
  <input type="text" id="child_name" name="child_name"><br>
  <label for="age">Age:</label><br>
  <input type="number" id="age" name="age"><br>
  <label for="sender">Gender:</label><br>
  <input type="text" id="sender" name="sender"><br>
  <label for="vaccine_for">Vaccine For:</label><br>
  <input type="text" id="vaccine_for" name="vaccine_for"><br>
  <label for="parent_name">Parent Name:</label><br>
  <input type="text" id="parent_name" name="parent_name"><br><br>
  <input type="submit" value="Update">
</form>

</body>
</html>
