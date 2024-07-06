<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<style>
    .fornavbar {
      display: flex;
      flex-direction: column;
      align-items: center;
      background-color:#E1DCC5;
     
    }
    ul {
      list-style-type: none;
      text-align: center;
      list-style-type: none;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 20px; 
    }

    ul li {
      display: inline;
      text-decoration: none;
      
    }
    ul li img {
      height: 100px; 
      width: 100px;
  
 
    }
</style>
</head>
<body>
    <div class="fornavbar">
    <ul>
   <li> <img src="images/logo.svg" alt=""></li>
    <li><a href="#">Token validation</a></li>
    <li><a href="#">Book search</a></li>
    <li><a href="#">Book loan</a></li>
    <li><a href="#">Send reminder</a></li>
    <li><button type="button" class="btn btn-light" onclick="window.location.href='signin.php';">login</button></li>
    <li><button type="button" class="btn btn-primary" onclick="window.location.href='signup.php';">Signup</button></li>
  </ul>
    </div>

</body>
</html>