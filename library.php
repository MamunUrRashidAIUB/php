<!DOCTYPE html>
<html>
<head>
  <title>Library</title>
  <style>
    .container {
      display: flex;
      flex-direction: column;
      align-items: center;
      background-color:#E1DCC5;
    }

    .flex-container {
      display: flex;
      gap: 50px;
    }

    .text {
      display: flex;
      gap: 210px;
      justify-content: center;
      text-align: center;
    }

    .error {
      color: #FF0000;
    }

    ul {
      list-style-type: none;
      padding: 0;
      text-align: center;
      list-style-type: none;
      padding: 0;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 20px; 
    }

    ul li {
      display: inline;
      text-decoration: no;
      
    }

    h1 {
      text-align: center;
    }

    .book-item {
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .book-title {
      margin-top: 10px;
      font-size: 16px;
      color: #333;
    }
    ul li img {
      height: 100px; 
      width: 100px;
  
 
    }
  </style>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>

<?php
session_start();

$name = $bname = $id = "";
$nameErr = $bnameErr = $idErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["bname"])) {
        $bnameErr = "Book name is required";
    } else {
        $bname = test_input($_POST["bname"]);
    }

    if (empty($_POST["name"])) {
        $nameErr = "User name is required";
    } else {
        $name = test_input($_POST["name"]);
    }

    if (empty($_POST["id"])) {
        $idErr = "Student ID is required";
    } else {
        $id = test_input($_POST["id"]);
    }

    if (isset($_SESSION['borrowed']) && $_SESSION['borrowed'] == true) {
        $bnameErr = "You have already borrowed a book";
    } else {
        $_SESSION['borrowed'] = true;

        $cookie_name = "library_data";
        $cookie_value = json_encode([
            'bname' => $bname,
            'name' => $name,
            'id' => $id
        ]);
        setcookie($cookie_name, $cookie_value, time() + 3600);
    }
}

function test_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}
?>

<div class="container ">
  <ul>
   <li> <img src="images/logo.svg" alt=""></li>
    
    <li><a href="#">Token validation</a></li>
    <li><a href="#">Book search</a></li>
    <li><a href="#">Book loan</a></li>
    <li><a href="#">Send reminder</a></li>
    <li><button type="button" class="btn btn-light">login</button></li>
    <li><button type="button" class="btn btn-primary" onclick="window.location.href='signup.php';">Signup</button></li>
  </ul>

  <h1>Need any book?</h1>

  <div class="flex-container">
    <div class="book-item">
      <img src="images/1.jpg" alt="Book 1" height="200" width="200">
      <div class="book-title">Design</div>
    </div>
    <div class="book-item">
      <img src="images/2.jpg" alt="Book 2" height="200" width="200">
      <div class="book-title">Annual Report</div>
    </div>
    <div class="book-item">
      <img src="images/3.jpg" alt="Book 3" height="200" width="200">
      <div class="book-title">Amphibious Soul</div>
    </div>
  </div>

  <div class="flex-container">
    <div class="book-item">
      <img src="images/4.jpg" alt="Book 4" height="200" width="200">
      <div class="book-title">I Hope This Finds You Well</div>
    </div>
    <div class="book-item">
      <img src="images/5.jpg" alt="Book 5" height="200" width="200">
      <div class="book-title">Happy</div>
    </div>
    <div class="book-item">
      <img src="images/6.jpg" alt="Book 6" height="200" width="200">
      <div class="book-title">Soul River</div>
    </div>
  </div>

  <div>
    <h1> Search a book</h1>
    <p><span class="error">* required field</span></p>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <label>Enter Book Name:</label><br>
      <input type="text" name="bname">
      <span class="error">* <?php echo $bnameErr;?></span>
      <br>
      <label>Enter Your Name:</label><br>
      <input type="text" name="name">
      <span class="error">* <?php echo $nameErr;?></span>
      <br>
      <label>Enter Your Student ID:</label><br>
      <input type="text" name="id">
      <span class="error">* <?php echo $idErr;?></span>
      <br><br>
      <input type="submit" value="Submit">
    </form>
  </div>

  <?php
  echo "<h2>Show Data:</h2>";
  echo $bname . "<br>";
  echo $name . "<br>";
  echo $id . "<br>";
  $cookie_name = "library_data";
  if (isset($_COOKIE[$cookie_name])) {
    $stored_data = json_decode($_COOKIE[$cookie_name], true);
    echo "<h2>Stored Data:</h2>";
    echo "Book Name: " . $stored_data['bname'] . "<br>";
    echo "User Name: " . $stored_data['name'] . "<br>";
    echo "Student ID: " . $stored_data['id'] . "<br>";
  }
  ?>
</div>

</body>
</html>
