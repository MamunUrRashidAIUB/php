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

</style>
<body >
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
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

  <label>Enter Book name:</label><br>
  Name:<input type="text" name="bname" value="<?php echo $bname;?>">
  <br>
  <label for="">Enter your name</label>
  <br>
  <input type="text" id="fname" name="fname">
  <br>
  <label for="fname">Enter Your Student Id:</label>
  <br>
  <input type="text" id="fname" name="fname" >
  <br>
  <label for="cars">choose your book:</label>
  <select name="cars" id="cars">
    <option value="volvo">tisha and moshtak</option>
    <option value="saab">me and sad</option>
    <option value="opel">others and happy</option>
    
  </select>
  <br>
  <input type="submit" value="Submit">
</form> 

</div>
<?php
$bname="";
 echo "<h2>Your Input:</h2>";
 echo $bname;
 ?>
</body>
</html>