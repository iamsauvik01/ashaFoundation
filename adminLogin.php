<?php
session_start();

// Hardcoded user credentials
$users = array(
    'admin1' => 'password1',
    'admin2' => 'password2'
);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if username and password are provided
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Validate credentials
        if (array_key_exists($username, $users) && $users[$username] == $password) {
            // Authentication successful, redirect to dashboard or homepage
            $_SESSION['username'] = $username;
            header("Location: admin.php");
            exit();
        } else {
            // Authentication failed, display error message
            $error_message = "Invalid username or password";
        }
    } else {
        // Username or password not provided, display error message
        $error_message = "Please enter username and password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body{
            height: 100vh;
            width: 100vw;
            display: grid;
            place-items: center;
            background-color: #12A480;
            font-family: "Poppins", sans-serif;
        }

        .background{
            height: 100vh;
            width: 100vw;
            position: fixed;
            top: 0;
            left: 0;
            z-index: -3;
        }

        section{
            padding: 20px;
            height: 500px;
            width: 500px;
            background-color: #F6FCFA;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: center;
            border-radius: 20px;
        }

        h1{
            color: white;
        }

        form{
            height: 80%;
            width: 100%;
            display: flex;
            flex-direction: column;
        }

        form>label{
            font-size: 1.1rem;

        }

        form>input{
            height: 40px;
            border-radius: 10px;
            padding: 10px;
            font-size: 1rem;
        }

        .submit{
            background-color: #10A37F;
            outline: none;
            border: none;
            color: white;
            font-size: 1rem;
            border-radius: 10px;
        }

        .admin-link{
            position: fixed;
            right: 20px;
            bottom: 20px;
        }

        .admin-link>a{
            text-decoration: none;
            color: white;
        }
    </style>


</head>
<body>
<img class="background" src="Images/Image17.jpeg" alt="">
    <h1>ASHA Foundation</h1>
    <section>
    <h2>
    <i class="fa-regular fa-lightbulb"></i>
        Login as Admin</h2>
    <?php if (isset($error_message)) { ?>
        <p style="color: red;"><?php echo $error_message; ?></p>
        <?php } ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username"><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password"><br><br>
        <input class="submit" type="submit" value="Login">
    </form>
    </section>
    <p class="admin-link">
        <a href="index.php">
            Login as user
        </a>
    </p>
</body>
</html>
