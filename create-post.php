<?php

include "connection.php";
include "header.php";
date_default_timezone_set('Europe/Paris');


?>

<?php
$err = "";

?>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
     if (empty($_POST["title"])){
    
      $err = "*All fields required!";
    }else if (empty($_POST["body"])) {
       
      $err = "*All fields required!";
    } else {
      $title = $_POST['title'];
			$body = $_POST['body'];
			$author_id = $_POST['author'];
     
     
     
    
    $sql = "INSERT INTO posts (Title,Body,author_id) VALUES ('$title','$body','$author_id')";
    $statement = $conn->prepare($sql);
    $statement->execute();
    $statement->setFetchMode(PDO::FETCH_ASSOC);
    header("location:posts.php");

  
        

}};

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


    
    
    <div class = "input-container">
<form method = "POST" action = "create-post.php">
<label for="Authors">Authors</label>
<select name="author" class="custom-select">
<?php  $query = $conn->query("SELECT * FROM author");?>
            <?php foreach($query as $author){ ?>
              <option value="<?php echo $author["id"];?>"><?php echo $author["Ime"] . ' ' . $author['Prezime'];  ?></option>
              <?php $authorId = $author["id"]?> 
             
    <?php } ?>
    <select name="author" class="custom-select">

            </br>
    <input type = "text" name = "title" placeholder = "Title">
   

</br>
</br>
   <textarea name ="body"></textarea><?php echo $err?>
</br>
</br>
<input type = "hidden" name = "id">
<input type = "hidden" name = "Created_at" value ='".date('Y-m-d')."'>
    <input name ="submitBtn" type = "submit" value = "post">
    
</div>

          </nav>
        </div>
        <?php include "side-bar.php"; ?>
        <?php include "footer.php"?>
</body>
</html>