<header>
      <div class="blog-masthead">
        <div class="container">
          <nav class="nav">
            <a class="<?php if($page == 'Home'){echo "nav-link active";}else{echo "nav-link";}?>" href="posts.php">Home</a>
            <a class=" <?php if($page == 'Dodaj autora'){echo "nav-link active";}else{echo "nav-link";}?>" href="create-author.php">Dodaj autora</a>
            <a class="nav-link <?php if($page == 'Dodaj Post'){echo "nav-link active";}else{echo "nav-link";}?>" href="create-post.php">Dodaj Post</a>
          </nav>
        </div>
      </div>

      <div class="blog-header">
        <div class="container">
          <h1 class="blog-title">The Bootstrap Blog</h1>
          <p class="lead blog-description">
            An example blog template built with Bootstrap.
          </p>
        </div>
      </div>
    </header>