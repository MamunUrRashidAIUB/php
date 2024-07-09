<?php
include("connection.php");
if(isset($_POST["submit"])) { 

    $username = ($_POST["name"]);
    $id = ($_POST["studentid"]);
    $password = ($_POST["password"]);
  
    $sql = "SELECT * FROM signup WHERE studentid='$id'";
    $result = mysqli_query($conn, $sql);
    $count_user = mysqli_num_rows($result);

    if($count_user == 0) {
        $hash = password_hash($password, PASSWORD_DEFAULT); 
        $sql = "INSERT INTO signup(name, studentid, password) VALUES('$username', '$id', '$hash')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            header("Location: welcome.php");
        }
    } else {
        echo '<script>
                window.location.href = "signup.php";
                alert("Username already exists!!");
              </script>';
    }
}
?>
