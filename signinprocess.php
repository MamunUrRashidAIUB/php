<?php
session_start();
include("connection.php");

if(isset($_POST["submit"])) { 
    $studentId = $_POST["studentId"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM signup WHERE studentid='$studentId'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $hashed_password = $row["password"];

        if (password_verify($password, $hashed_password)) {
            $_SESSION["studentid"] = $row["studentid"];
            $_SESSION["name"] = $row["name"];
            header("Location: library.php");
        } else {
            echo '<script>
                    window.location.href = "signin.php";
                    alert("Invalid password!");
                  </script>';
        }
    } else {
        echo '<script>
                window.location.href = "signin.php";
                alert("User not found!");
              </script>';
    }
}
?>
