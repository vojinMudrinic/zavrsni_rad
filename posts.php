<?php
include "connection.php";
include "header.php";
include "side-bar.php";



$query = $conn->query("SELECT * FROM posts");

?>

<main role="main" class="container">
    <div class="row">
        <div class="col-sm-8 blog-main">
            </div><!-- /.blog-post -->
            <div class="blog-post">
            <?php foreach($query as $element){ ?>
                <h2 class="blog-post-title"><a href = "#"><?php echo $element["Title"]?></a></h2>
                <p class="blog-post-meta"><?php echo $element["Created_at"]?></p> <a href="#"><?php echo $element["Autor"]?></a></p>
                <p><?php echo $element["Body"]?>
   
    <?php } ?>
</div>

            <nav class="blog-pagination">
                <a class="btn btn-outline-primary" href="#">Older</a>
                <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
            </nav>

        </div>
    
        
