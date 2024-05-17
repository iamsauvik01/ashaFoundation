<?php
// Include the database configuration file
include '../config.php';

// Initialize variables
$area_name = $population = $num_male = $num_female = $num_houses = '';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $area_name = $_POST['area_name'];
    $population = $_POST['population'];
    $num_male = $_POST['num_male'];
    $num_female = $_POST['num_female'];
    $num_houses = $_POST['num_houses'];

    // Prepare SQL statement to insert data into the table
    $sql = "INSERT INTO village_profile (Area_Name, Population, Number_of_Male, Number_of_Female, Number_of_Houses)
            VALUES ('$area_name', '$population', '$num_male', '$num_female', '$num_houses')";

    // Execute SQL statement
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
    <title>Village Profile Form</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            background-image: linear-gradient(to right bottom, #11998e, #38ef7d);
            margin: 0;
            padding: 0;
            height: 100vh;
        }

        a{
            text-decoration: none;
            color: white;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            width: 100%;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"] {
            width: calc(50% - 10px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
        }

        input[type="submit"], button
         {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Village Profile Form</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="area_name">Area Name:</label><br>
        <input type="text" id="area_name" name="area_name" value="<?php echo $area_name; ?>" required><br>

        <label for="population">Population:</label><br>
        <input type="number" id="population" name="population" value="<?php echo $population; ?>" required><br>

        <label for="num_male">Number of Male:</label><br>
        <input type="number" id="num_male" name="num_male" value="<?php echo $num_male; ?>" required><br>

        <label for="num_female">Number of Female:</label><br>
        <input type="number" id="num_female" name="num_female" value="<?php echo $num_female; ?>" required><br>

        <label for="num_houses">Number of Houses:</label><br>
        <input type="number" id="num_houses" name="num_houses" value="<?php echo $num_houses; ?>" required><br>

        <input type="submit" value="Submit">

        <button>
            <a href="view_village_profile.php">
                View Profiles
            </a>
        </button>
    </form>
</div>

</body>
</html>
