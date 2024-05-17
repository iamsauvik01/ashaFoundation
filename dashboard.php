<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">


    <style>

        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body{
            font-family: 'Poppins', sans-serif;
            overflow: hidden;
        }
        
        .navbar {
        width: 100%; 
        height: 18vh;
        background-color: #111;
        padding-top: 20px;
        z-index: 1000; 
        display: grid;
        grid-template-columns: 1fr 1fr 2fr ;
        place-items: center;
        }

        .options{
            display: none;
            flex-direction: column;
            position: absolute;
            left: 35%;
            background-color: #111;
            box-shadow: 0 8px 16px rgba(0,0,0,0.2);
            padding: 10px;
            z-index: 100;
        }

        .dropdown{
            width: 80%;
            display: flex;
            justify-content: flex-end;
        }

        .dropdown>a{
            font-size: 1rem;
        }

        .dropdown:hover .options {
            display: flex;
            flex-direction: column;
        }

        .logo-container{
            width: 100%;
            color: white;
            display: flex; 
            align-items: center;    
            gap: 30px;
            margin-bottom: 20px;
        }

        .logo-container>h1{
            font-size: 1.7rem;
        }

        .logo-container>img{
            height: 100px;
            width: 100px;
            border-radius: 50%;
        }

        .navbar a {
            padding: 10px;
            text-decoration: none;
            font-size: 0.9rem;
            color: #818181;
            text-align: center;
        }

        .navbar a:hover {
            color: #f1f1f1;
        }

        .sign-out{
            background: transparent;
            border: none;
            color: #818181;
            font-size: 0.9rem;
            cursor: pointer;
        }

        .banner-container {
            height: 100vh;
            width: 100vw;
            position: relative;
            overflow: hidden;
        }

        .banner-slide {
            height: 100%;
            width: 100%;
            position: absolute;
            top: 0;
            left: 0;
            opacity: 0;
            transition: opacity 0.5s ease-in-out;
        }

        .banner-slide.active {
            opacity: 1;
        }

        .content {
            color: white;
            position: fixed;
            top: 200px;
            padding: 20px 20px 40px 20px;
            width: 100vw;
            background-color: rgba(0, 0, 0, 0.6);
            display: grid;
            place-items: center;
            gap: 50px;
        }
        
        .content>p{
            width: 40vw;
            line-height: 27px;
            text-align: justify;
            font-size: 0.9rem;
        }

        .copyright{
            position: fixed;
            bottom: 10px;
            right: 10px;
        }

        .profile>a{
            text-decoration: none;
            color: white;
            padding: 20px;
            gap: 50px;
        }
    </style>
</head>
<body>

<div class="navbar">
    <div class="logo-container">
        <img src="./Images/logo.png" alt="">
        <h1>ASHA Foundation</h1>
    </div>
    <div class="dropdown">
        <a class="record" href="#">Records</a>
        <div class="options">
            <a href="tables/immunization.php">Immunization for Children</a>
            <a href="tables/due_list.php">Due List of Children for Immunization</a>
            <a href="tables/awareness_program.php">Awareness Program</a>
            <a href="tables/record_birth.php">Record of Birth</a>
            <a href="tables/record_death.php">Record of Death</a>
            <a href="tables/monthly_meeting.php">Monthly Meeting Asha</a>
            <a href="tables/monthly_incentive.php">Monthly Incentive Claim</a>
        </div>
    </div>

    <div class="profile">
            <!-- <a href="./profiles/ashaprofile.php">ASHA Profile</a> -->
            <a href="./profiles/villageprofile.php">Village Profile</a>
            <a href="./profiles/anm.php">ANM Profile</a>
            <a href="./updateRoutes/updateRoute.php">Update</a>
            <button class="sign-out" onclick="signOut()">Sign-out</button>
    </div>

</div>


<div class="banner-container">
    <img class="banner-slide active" src="./Images/Image1.jpg" alt="">
    <img class="banner-slide" src="./Images/Image2.jpg" alt="">
    <img class="banner-slide" src="./Images/Image3.jpg" alt="">
    <img class="banner-slide" src="./Images/Image4.jpg" alt="">
    <img class="banner-slide" src="./Images/Image5.jpg" alt="">
    <img class="banner-slide" src="./Images/Image6.jpeg" alt="">
    <img class="banner-slide" src="./Images/Image7.jpeg" alt="">
    <img class="banner-slide" src="./Images/Image8.jpeg" alt="">
    <img class="banner-slide" src="./Images/Image9.jpeg" alt="">
    <img class="banner-slide" src="./Images/Image10.jpeg" alt="">
    <img class="banner-slide" src="./Images/Image11.jpeg" alt="">
    <img class="banner-slide" src="./Images/Image12.jpeg" alt="">
    <img class="banner-slide" src="./Images/Image13.jpeg" alt="">
    <img class="banner-slide" src="./Images/Image14.jpeg" alt="">
    <img class="banner-slide" src="./Images/Image15.jpeg" alt="">
    <img class="banner-slide" src="./Images/Image16.jpeg" alt="">
    <img class="banner-slide" src="./Images/Image17.jpeg" alt="">
    <img class="banner-slide" src="./Images/Image18.jpeg" alt="">
</div>

<div class="content">
    <h1>About Us</h1>
    <p>Welcome to the ASHA Foundation, where every effort is dedicated to fostering healthier communities and brighter futures. Founded on principles of compassion and dedication, ASHA stands as a beacon of hope for countless individuals across our region. With a steadfast commitment to healthcare, education, and community development, we tirelessly strive to uplift those in need, ensuring access to essential services and empowering individuals to lead fulfilling lives. Through our diverse initiatives, including immunization programs, awareness campaigns, and support for maternal and child health, we aim to create lasting positive change, one life at a time. At ASHA, our mission is not just a statement but a way of life, driven by the belief that together, we can build a world where everyone has the opportunity to thrive. Join us in our journey as we continue to make a difference, spreading health, hope, and happiness throughout our communities.</p>
</div>

<p class="copyright">&#169 All rights belongs to ASHA</p>

<script>
    const slides = document.querySelectorAll('.banner-slide');
    let currentSlide = 0;

    setInterval(() => {
        slides[currentSlide].classList.remove('active');
        currentSlide = (currentSlide + 1) % slides.length;
        slides[currentSlide].classList.add('active');
    }, 2000); // Change slide every 5 seconds

    function signOut(){
        location.replace("index.php");
    }
</script>

</body>
</html>
