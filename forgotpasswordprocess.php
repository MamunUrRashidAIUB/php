<?php
include("connection.php");

if (isset($_POST["submit"])) {
    $email = $_POST["email"];
    
    // Check if the email exists in the database
    $sql = "SELECT * FROM signup WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    
    if ($result && mysqli_num_rows($result) > 0) {
        // Generate a random verification code
        $verification_code = rand(100000, 999999);
        
        // Store the verification code in the database temporarily
        $sql_update = "UPDATE signup SET verification_code='$verification_code' WHERE email='$email'";
        mysqli_query($conn, $sql_update);
        
        // Send the verification code to the user's email
        // In real scenario, you will send it via email using PHP mailer, but for simplicity, we'll use echo
        echo '<script>
                alert("A verification code has been sent to your email: ' . $email . '");
                window.location.href = "verifycode.php?email=' . $email . '";
              </script>';
    } else {
        echo '<script>
                alert("Email not found!");
                window.location.href = "forgotpassword.php";
              </script>';
    }
}
?>
