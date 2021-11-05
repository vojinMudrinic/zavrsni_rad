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

    <!-- Custom styles for this template -->
    <link href="styles/blog.css" rel="stylesheet" />
    <link href="styles/style.css" rel="stylesheet" />
  </head>
  <?php  include "connection.php";
         include "header.php";?>
 


   
  <main role="main" class="container">
      <div class="row">
        <div class="col-sm-8 blog-main">
          <div class="blog-post">
          <?php  $query = $conn->query("SELECT p.Title,p.Body,p.Created_at,p.id,a.ime,a.prezime,a.Pol FROM posts AS p INNER JOIN author AS a ON p.author_id = a.id");?>
            <?php foreach($query as $element){ ?>
                <h2 class="blog-post-title"><a href = "single-post.php?post_id=<?php echo($element['id']) ?>"><?php echo $element["Title"]?></a></h2>
                <p class="blog-post-meta"><?php echo $element["Created_at"]?></p> <a style="color: <?php if($element["Pol"] =="Z"){echo "pink";} else if($element["Pol"] =="M"){echo "blue";}?>;" href="#"><?php echo $element["ime"]." ".$element["prezime"]?></a></p>
                <p><?php echo $element["Body"]?>
   
    <?php } ?>
    
    
</div>

    
  

          <nav class="blog-pagination">
            <a class="btn btn-outline-primary" href="#">Older</a>
            <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
          </nav>
        </div>
        <?php include "side-bar.php"; ?>
        <?php include "footer.php"?>