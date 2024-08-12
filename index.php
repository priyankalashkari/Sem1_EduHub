<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $course = htmlspecialchars($_POST["course"]);
    $year = htmlspecialchars($_POST["year"]);
    $studentStatus = htmlspecialchars($_POST["studentStatus"]);
    $email = htmlspecialchars($_POST["email"]);

    $db_host = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "your_database_name";

    $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO your_table_name (name, course, year, studentStatus, email) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssiss", $name, $course, $year, $studentStatus, $email);

    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>EduHub</title>
    <link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css">
    <!-- Your CSS styles here -->
</head>
<body>
  <div class="container">
    <h1>Welcome to EduHub</h1>
    <p>Are you here to Share Notes or to Access them?</p>
  </div>
  <div class="container-fluid h-100">
    <div class="row h-100">
      <div class="col-lg-6 d-flex align-items-center justify-content-center">
        <div class="card transparent-card">
          <div class="card-body">
            <form id="registerForm" action="" method="post">
              <!-- Your form fields here -->
              <button type="submit" class="btn btn-primary">Register</button>
            </form>
          </div>
        </div>
      </div>
      <div class="col-lg-6 bg-image"></div>
    </div>
  </div>
  <script src="script.js"></script>
</body>
</html>