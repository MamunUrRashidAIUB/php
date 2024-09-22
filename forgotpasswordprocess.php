<?php
include("connection.php");

if (isset($_POST["submit"])) {
    $email = $_POST["email"];
    
    
    $sql = "SELECT * FROM signup WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    
    if ($result && mysqli_num_rows($result) > 0) {
        
        $verification_code = rand(100000, 999999);
        
        
        $sql_update = "UPDATE signup SET verification_code='$verification_code' WHERE email='$email'";
        mysqli_query($conn, $sql_update);
        
    
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
