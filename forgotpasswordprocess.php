<?php
include("connection.php");

if(isset($_POST["submit"])) { 
    $email = $_POST["email"];
    
    // Check if the email exists in the database
    $sql = "SELECT * FROM signup WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $token = bin2hex(random_bytes(50));
        $expires_at = date("Y-m-d H:i:s", strtotime('+1 hour'));
        $sql = "INSERT INTO password_resets (email, token, expires_at) VALUES ('$email', '$token', '$expires_at')";
        mysqli_query($conn, $sql);
        $reset_link = "http://yourwebsite.com/resetpassword.php?token=$token";
        $subject = "Password Reset Request";
        $message = "Click the following link to reset your password: $reset_link";
        $headers = "From: no-reply@yourwebsite.com";
        if (mail($email, $subject, $message, $headers)) {
            echo '<script>
                    alert("A password reset link has been sent to your email.");
                    window.location.href = "signin.php";
                  </script>';
        } else {
            echo '<script>
                    alert("Failed to send the email. Please try again later.");
                    window.location.href = "forgotpassword.php";
                  </script>';
        }
    } else {
        echo '<script>
                alert("No user found with this email.");
                window.location.href = "forgotpassword.php";
              </script>';
    }
}
?>
