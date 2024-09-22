<?php
include("connection.php");

if (isset($_GET['email'])) {
    $email = $_GET['email'];
}
if (isset($_POST["submit"])) {
    $email = $_POST["email"];
    $new_password = $_POST["password"];
    
    $sql = "UPDATE signup SET password='$new_password', verification_code=NULL WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    
    if ($result) {
        echo '<script>
                alert("Your password has been reset successfully!");
                window.location.href = "signin.php";
              </script>';
    } else {
        echo '<script>
                alert("Error resetting password.");
              </script>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
</head>
<body>
<div class="container" style="margin-top: 50px;">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Reset Password</h3>
                    <form method="post" action="">
                        <div class="mb-3">
                            <label for="password" class="form-label">New Password:</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                            <input type="hidden" name="email" value="<?php echo $email; ?>">
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Reset Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
