<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> 
</head>
<body>

<!-- Nav Bar Starts -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="#">Post System</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav m-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./index.php">Add Post</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./allPosts.php">All Posts</a>
        </li>
      </ul>
      
    </div>
  </div>
</nav>
<!-- Nav Bar Ends -->
<!-- Form starts -->
<div class="card col-lg-5 mx-auto mt-5">
  <div class="card-header">Add Post</div>
  <div class="cardBody">

    <form action="./controller/post.php" method="POST">

      <input value="<?= $_SESSION["old_data"]["title"] ?? "" ?>" name="title" type="text" placeholder="Post Title" class="form-control my-2">

      <?php 
        if( isset( $_SESSION["errors"]["title_error"] ) ){
          ?>
          <span class="text-danger">         
          <?= $_SESSION["errors"]["title_error"]; ?>
          </span>

          <?php
        }
      ?>

      <textarea name="details" class="form-control my-2" placeholder="Post Details"><?= $_SESSION["old_data"]["details"] ?? "" ?></textarea>

      <?php 
        if( isset( $_SESSION["errors"]["detail_error"] ) ){
          ?>
          <span class="text-danger">         
          <?= $_SESSION["errors"]["detail_error"]; ?>
          </span>

          <?php
        }
      ?>

      <input value="<?= $_SESSION["old_data"]["author"] ?? "" ?>" name="author" type="text" placeholder="Post Author" class="form-control my-2">
      <button type="submit" class="btn btn-info">Submit</button> <br>

      <span class="text-primary">
        <?= isset($_SESSION["msg"]) ? $_SESSION["msg"] : "" ?>
      </span>

    </form>

  </div>
</div>
<!-- Form Ends -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>

<?php

    session_unset()

?>