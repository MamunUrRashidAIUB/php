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
</head>
<body>
<div class="container" style="margin-top: 50px;">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Enter Verification Code</h3>
                    <form method="post" action="">
                        <div class="mb-3">
                            <label for="verification_code" class="form-label">Verification Code:</label>
                            <input type="text" class="form-control" id="verification_code" name="verification_code" required>
                            <input type="hidden" name="email" value="<?php echo $email; ?>">
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Verify</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
