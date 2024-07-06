<?php include 'navbar.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Library</title>

  <link rel="stylesheet" href="styles.css">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body class="fullbody">

<?php
include 'books.php'; // Include the book data
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

// Book data
$books = [
    ["title" => "Design", "image" => "images/1.jpg"],
    ["title" => "Annual Report", "image" => "images/2.jpg"],
    ["title" => "Amphibious Soul", "image" => "images/3.jpg"],
    ["title" => "I Hope This Finds You Well", "image" => "images/4.jpg"],
    ["title" => "Happy", "image" => "images/5.jpg"],
    ["title" => "Soul River", "image" => "images/6.jpg"],
    // Add more books here
];

$booksPerPage = 3; // Number of books to show per page
$totalBooks = count($books);
$totalPages = ceil($totalBooks / $booksPerPage);

if (isset($_GET['page']) && is_numeric($_GET['page'])) {
    $currentPage = (int)$_GET['page'];
} else {
    $currentPage = 1;
}

$startIndex = ($currentPage - 1) * $booksPerPage;
$endIndex = min($startIndex + $booksPerPage, $totalBooks);
$currentBooks = array_slice($books, $startIndex, $booksPerPage);
?>

<div class="container">
  <div class="bg">
  <h1>Need any book?</h1>

<div class="flex-container">
  <?php foreach ($currentBooks as $book): ?>
  <div class="book-item">
    <img src="<?php echo $book['image']; ?>" alt="<?php echo $book['title']; ?>" height="200" width="200">
    <div class="book-title"><?php echo $book['title']; ?></div>
  </div>
  <?php endforeach; ?>
  
<div class="pagination">
    <?php if ($currentPage > 1): ?>
      <a href="?page=<?php echo $currentPage - 1; ?>">&laquo;</a>
    <?php endif; ?>

    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
      <?php if ($i == $currentPage): ?>
        <strong><?php echo $i; ?></strong>
      <?php else: ?>
        <a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
      <?php endif; ?>
    <?php endfor; ?>

    <?php if ($currentPage < $totalPages): ?>
      <a href="?page=<?php echo $currentPage + 1; ?>"> &raquo;</a>
    <?php endif; ?>
  </div>
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
