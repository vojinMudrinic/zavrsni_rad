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

  <?php  include "connection.php";
         include "header.php";?>


              <?php
                if (isset($_GET['post_id'])) {
                    $sql = "SELECT p.id,p.Body,p.Created_at,p.Title,a.ime,a.prezime,a.Pol FROM posts as p INNER JOIN author AS a ON p.author_id = a.id
                    WHERE p.id = {$_GET['post_id']}";
                    $statement = $conn->prepare($sql);
                    $statement->execute();
                    $statement->setFetchMode(PDO::FETCH_ASSOC);
                    $singlePost = $statement->fetch();
                    
                    $sql2 = "SELECT c.Author, c.Post_id, c.Text FROM comments AS c INNER JOIN posts as p ON c.Post_id = p.id WHERE c.Post_id = {$_GET['post_id']}";
                    $statement = $conn->prepare($sql2);
                    $statement->execute();
                    $statement->setFetchMode(PDO::FETCH_ASSOC);
                    $comments =  $statement->fetchAll();

            
                
                }?>


            


                <main role="main" class="container">
      <div class="row">
        <div class="col-sm-8 blog-main">
          <div class="blog-post">
                <h2 class="blog-post-title"><?php echo $singlePost["Title"]?></a></h2>
                <p class="blog-post-meta"><?php echo $singlePost["Created_at"]?></p> <a style="color: <?php if($singlePost["Pol"] =="Z"){echo "pink";} else if($singlePost["Pol"] =="M"){echo "blue";}?>;" href="#"><?php echo $singlePost["ime"]." ".$singlePost["prezime"]?></a></p>
                <p style="color: <?php if($singlePost["Pol"] =="Z"){echo "pink";} else if($singlePost["Pol"] =="M"){echo "blue";}?>;"><?php echo $singlePost["Body"]?>
                <?php include "comments.php"?>

      </div>        

<nav class="blog-pagination">
            <a class="btn btn-outline-primary" href="#">Older</a>
            <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
          </nav>
        </div>
        <?php include "side-bar.php"; ?>
        <?php include "footer.php"?>
</body>
</html>