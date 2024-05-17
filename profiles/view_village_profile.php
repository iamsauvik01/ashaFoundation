<?php
include '../config.php'; // Assuming config.php contains your database connection details

// Fetch data from the database
$sql = "SELECT * FROM village_profile";
$result = mysqli_query($conn, $sql);

// Check if there are any records
if (mysqli_num_rows($result) > 0) {
    // Output data of each row
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    echo "No records found";
}

// Close connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Village Profiles</title>
<style>
  body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
    margin: 0;
    padding: 20px;
  }
  h1 {
    text-align: center;
    margin-bottom: 20px;
    color: #333;
  }
  table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    background-color: #fff;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
  }
  th, td {
    border: 1px solid #ddd;
    padding: 12px;
    text-align: left;
  }
  th {
    background-color: #f2f2f2;
  }
</style>
</head>
<body>

<h1>Village Profiles</h1>

<table>
  <thead>
    <tr>
      <th>ID</th>
      <th>Area Name</th>
      <th>Population</th>
      <th>Number of Male</th>
      <th>Number of Female</th>
      <th>Number of Houses</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($rows as $row): ?>
      <tr>
        <td><?php echo $row['ID']; ?></td>
        <td><?php echo $row['Area_Name']; ?></td>
        <td><?php echo $row['Population']; ?></td>
        <td><?php echo $row['Number_of_Male']; ?></td>
        <td><?php echo $row['Number_of_Female']; ?></td>
        <td><?php echo $row['Number_of_Houses']; ?></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

</body>
</html>
