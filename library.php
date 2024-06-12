
<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>

<style>
.flex-container {
  display: flex;
  gap: 50px;
 
}
.flex-container2 {
  display: flex;
 gap: 50px;
}
.text{
  display:flex;
  gap:100px;
}
.error{color:#FF0000;}
</style>
<body >

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
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;}


?>
<h1>Need any book??</h1>
<div class="flex-container">
<img src="images/R.jpg" alt="Italian Trulli"height="200" width="200">
<img src="images/R2.jpg" alt="Italian Trulli"height="200" width="200">
<img src="images/r.jpg" alt="Italian Trulli"height="200" width="200">
</div>
<div class="text"><p>tisha and  moshtak love story</p>
<p>me and my sad story</p>
<p>others happy story</p></div>
<div class="flex-container2">
<img src="images/R.jpg" alt="Italian Trulli"height="200" width="200">
<img src="images/R2.jpg" alt="Italian Trulli"height="200" width="200">
<img src="images/r.jpg" alt="Italian Trulli"height="200" width="200">
</div>
<div class="text"><p>tisha and  moshtak love story</p>
<p>me and my sad story</p>
<p>others happy story</p></div>
<div>
<h1>search a book</h1>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

  <label>Enter Book name:</label><br>
  <input type="text" name="bname" >
  <span class="error">* <?php echo $bnameErr;?></span>
  <br>
  <label>Enter your name</label>
  <br>
  <input type="text"  name="name">
  <span class="error">* <?php echo $nameErr;?></span>
  <br>
  <label >Enter Your Student Id:</label>
  <br>
  <input type="text" name="id">
  <span class="error">* <?php echo $idErr;?></span>
  <br>
  <label for="cars">choose your book:</label>
  <select name="books">
    <option >tisha and moshtak</option>
    <option >me and sad</option>
    <option >others and happy</option>
    
  </select>
  <br>
  <input type="submit" value="Submit">
</form> 

</div>
<?php
 echo "<h2>My  Input:</h2>";
 echo $bname;
 echo "<br>";
 echo $name;
 echo "<br>";
 echo $id;
 echo "<br>";
 ?>
</body>
</html>
