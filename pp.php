<!DOCTYPE html>
<html>
<head>
  <title>library</title>
  <style>
   
    .container {
      display: flex;
      justify-content: center;
      align-items: center;
       
      flex-direction: column; 
    }


    .flex-container {
      display: flex;
      gap: 50px;
    }

    .flex-container2 {
      display: flex;
      gap: 50px;
    }

    .text {
      display: flex;
      gap: 210px;
    }

    .error {
      color: #FF0000;
    }

    ul {
      list-style-type: none;
      margin: 10px;
      padding: 0;
      text-align: center;
    }

    ul li {
      display: inline;
      padding: 10px;
    }

    h1.text-5xl {
      text-align: center; 
    }
  </style>
</head>
<body>

<div class="container">

  <?php
  $name=$bname=$id="";
  $nameErr=$bnameErr=$idErr="";
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
    $cookie_name = "library_data";
    $cookie_value = json_encode([
        'bname' => $bname,
        'name' => $name,
        'id' => $id
    ]);
    setcookie($cookie_name, $cookie_value, time() + 3600);
  }
  
  
  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  ?>

  <ul>
    <li><a href="#">Login</a></li>
    <li><a href="#">Token validation</a></li>
    <li><a href="#">book search</a></li>
    <li><a href="#">Book loan</a></li>
    <li><a href="#">send reminder</a></li>
  </ul>
  
  <h1 class="text-5xl">Need any book??</h1>

  <div class="flex-container place-content-center">
    <img src="images/R.jpg" alt="Book 1" height="200" width="200">
    <img src="images/R2.jpg" alt="Book 2" height="200" width="200">
    <img src="images/r.jpg" alt="Book 3" height="200" width="200">
  </div>

  <div class="text place-content-center">
    <p>book1</p>
    <p>book2</p>
    <p>book3</p>
  </div>

  <div class="flex-container2 place-content-center">
    <img src="images/R.jpg" alt="Book 4" height="200" width="200">
    <img src="images/R2.jpg" alt="Book 5" height="200" width="200">
    <img src="images/r.jpg" alt="Book 6" height="200" width="200">
  </div>

  <div class="text place-content-center">
    <p>book4</p>
    <p>book5</p>
    <p>book6</p>
  </div>

  <div>
    <h1 class="text-4xl">Search a book</h1>
    <p class="text place-content-center"><span class="error">* required field</span></p>
    <div>
      <form class="place-content-center" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

        <label>Enter Book name:</label><br>
        <input type="text" name="bname">
        <span class="error">* <?php echo $bnameErr;?></span>
        <br>
        <label>Enter your name</label>
        <br>
        <input type="text"  name="name">
        <span class="error">* <?php echo $nameErr;?></span>
        <br>
        <label>Enter Your Student Id:</label>
        <br>
        <input type="text" name="id">
        <span class="error">* <?php echo $idErr;?></span>
        <br>

        <br>
        <input type="submit" value="Submit">
      </form>
    </div>
  </div>

  <?php
   echo "<h2> show data:</h2>";
   echo $bname;
   echo "<br>";
   echo $name;
   echo "<br>";
   echo $id;
   echo "<br>";
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
