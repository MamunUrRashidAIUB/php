<?php include 'navbar.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <style>
.form{
    display: flex;
      flex-direction: column;
      align-items: center;
      background-color:;
      
}
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>

<div class="form">
   <div>
    <h1>
    Sign Up
    </h1>
    <p> Get your free Open Library card and borrow digital books from the nonprofit Internet Archive</p>
   </div>
   <div>
 <form method="post" action="">
      <label>Enter Book Name:</label><br>
      <input type="text" name="bname">
      <br>
      <label>Enter Your Name:</label><br>
      <input type="text" name="name">
      <br>
      <label>Enter Your Student ID:</label><br>
      <input type="text" name="id">
      <br><br>
      <input type="submit" value="Submit">
    </form>
   </div>
   
  </div>

</form>
</body>
</html>