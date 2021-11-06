<?php
$page = 'Dodaj autora';
include "connection.php";
include "header.php";
date_default_timezone_set('Europe/Paris');
?>

<?php
$err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["ime"])) {
      
      $err = "*All fields required!";
    } else if (empty($_POST["prezime"])){
    
      $err = "*All fields required!";
    }else if (empty($_POST["pol"])) {
       
      $err = "*All fields required!";
    } else {
      $ime = $_POST["ime"];
      $prezime = $_POST["prezime"];
      $pol = $_POST["pol"];
      
    
    $sql = "INSERT INTO author (ime,prezime,pol) VALUES ('$ime','$prezime','$pol')";
    $statement = $conn->prepare($sql);
    $statement->execute();
    $statement->setFetchMode(PDO::FETCH_ASSOC);

    
    header("location:create-post.php");
        

}}






?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="icon" href="../../../../favicon.ico" />

    <title>Vivify Blog</title>

    <!-- Bootstrap core CSS -->
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"
      integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb"
      crossorigin="anonymous"
    />
    <link href="styles/blog.css" rel="stylesheet" />
    <link href="styles/style.css" rel="stylesheet" />
    <title>Document</title>
</head>
<body>
<main role="main" class="container">
      <div class="row">
        <div class="col-sm-8 blog-main">
          <div class="blog-post">
<form method = "POST" action = "create-author.php">
    <input type = "text" name = "ime" placeholder = "Ime">
</br>
</br>
    <input type = text name = "prezime" placeholder = "Prezime">
</br>
</br>
   <input type = "radio" name = "pol" value = "M">M
   <input type = "radio" name = "pol" value = "Z">Z <?php echo $err?>
</br>
</br>
<input type = "hidden" name = "id">
<input type = "hidden" name = "Created_at" value ='".date('Y-m-d')."'>
    <input name ="submitBtn" type = "submit" value = "submit">
    
</div>




          </nav>
        </div>
        <?php include "side-bar.php"; ?>
        <?php include "footer.php"?>
</body>
</html