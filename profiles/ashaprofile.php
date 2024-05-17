<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ASHA Profile Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: linear-gradient(to right bottom, #11998e, #38ef7d);
            margin: 0;
            padding: 0;
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
        input[type="tel"],
        input[type="date"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
        }

        textarea {
            height: 100px;
        }

        input[type="submit"], button {
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
    <h2>ASHA Profile Form</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" required><br>

        <label for="dob">Date of Birth:</label><br>
        <input type="date" id="dob" name="dob" required><br>

        <label for="phone">Phone Number:</label><br>
        <input type="tel" id="phone" name="phone" pattern="[0-9]{10}" required><br>

        <label for="joining_date">Date of Joining:</label><br>
        <input type="date" id="joining_date" name="joining_date" required><br>

        <label for="district">District:</label><br>
        <input type="text" id="district" name="district" required><br>

        <label for="category">Category:</label><br>
        <input type="text" id="category" name="category" required><br>

        <label for="address">Address:</label><br>
        <textarea id="address" name="address" rows="4" required></textarea><br>

        <input type="submit" value="Submit">

        <button>
            <a href="view_asha_profile.php">
                View Profiles
            </a>
        </button>
    </form>
</div>

<?php
// Include the database configuration file
include '../config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = $_POST['name'];
    $dob = $_POST['dob'];
    $phone = $_POST['phone'];
    $joining_date = $_POST['joining_date'];
    $district = $_POST['district'];
    $category = $_POST['category'];
    $address = $_POST['address'];

    // Prepare SQL statement to insert data into the table
    $sql = "INSERT INTO ashaprofile (Name, DOB, Phone_Number, Date_of_Joining, District, Category, Address)
            VALUES ('$name', '$dob', '$phone', '$joining_date', '$district', '$category', '$address')";

    // Execute SQL statement
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

</body>
</html>
