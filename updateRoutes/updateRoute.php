<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Professional Links</title>
<style>
  body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f2f2f2;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    width: 100vw;
  }

  .background{
            height: 100vh;
            width: 100vw;
            position: fixed;
            top: 0;
            left: 0;
            z-index: -3;
        }

  .container {
    width: 70vw;
    margin: 50px auto;
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    place-items: center;
    background-color: rgba(0, 0, 0, 0.6);
    padding: 100px 50px;
    border-radius: 20px;
  }
  .card {
    width: calc(50% - 20px);
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    padding: 20px;
    margin-bottom: 20px;
    transition: transform 0.3s;
    text-align: center;
  }
  .card:hover {
    transform: translateY(-5px);
  }
  .card a {
    text-decoration: none;
    color: #333;
    font-weight: bold;
    font-size: 18px;
  }
</style>
</head>
<body>
<img class="background" src="../Images/Image12.jpeg" alt="">
<div class="container">
  <div class="card">
    <a href="update_immunization.php">Update Immunization for Children</a>
  </div>
  <div class="card">
    <a href="update_due_list.php">Update Due List of Children for Immunization</a>
  </div>
  <div class="card">
    <a href="update_awareness_program.php">Update Awareness Program</a>
  </div>
  <div class="card">
    <a href="update_record_birth.php">Update Record of Birth</a>
  </div>
  <div class="card">
    <a href="update_record_death.php">Update Record of Death</a>
  </div>
  <div class="card">
    <a href="update_monthly_meeting.php">Update Monthly Meeting Asha</a>
  </div>
  <div class="card">
    <a href="update_monthly_incentive.php">Update Monthly Incentive Claim</a>
  </div>
  <div class="card">
    <a href="update_record_immunization.php">Update Record of Immunization for ANC and PNC Women</a>
  </div>
</div>

</body>
</html>
