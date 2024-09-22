<?php
include("connection.php");

if (isset($_GET['email'])) {
    $email = $_GET['email'];
}

if (isset($_POST["submit"])) {
    $email = $_POST["email"];
    $entered_code = $_POST["verification_code"];
    
    $sql = "SELECT * FROM signup WHERE email='$email' AND verification_code='$entered_code'";
    $result = mysqli_query($conn, $sql);
    
    if ($result && mysqli_num_rows($result) > 0) {
        echo '<script>
                window.location.href = "resetpassword.php?email=' . $email . '";
              </script>';
    } else {
        echo '<script>
                alert("Invalid verification code!");
                window.location.href = "verifycode.php?email=' . $email . '";
              </script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Code</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #E1DCC5;
        }
        .card {
            margin-top: 50px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>

<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title text-center">Enter Verification Code</h3>
                <form method="post" action="">
                    <div class="mb-3">
                        <label for="verification_code" class="form-label">Verification Code:</label>
                        <input type="text" class="form-control" id="verification_code" name="verification_code" required>
                        <input type="hidden" name="email" value="<?php echo htmlspecialchars($email); ?>">
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Verify</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
