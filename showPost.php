<?php

session_start();

include './db/env.php';

$id = $_REQUEST['id'];
$query = "SELECT * FROM `posts` WHERE id = $id";
$result = mysqli_query($conn,$query);

$post = mysqli_fetch_assoc($result);

// echo "<pre>";
// print_r($post);
// echo "</pre>";
// exit();
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
<div class="card col-lg-6 mx-auto mt-5">
  <div class="card-header"><?= $post['title']?></div>
  <div class="card-body"><?= $post['detail']?></div>
  <div class="card-footer">
    <img  style="width: 40px; height; 40px; border-radius: 50%; object-fit:cover;" src="https://api.dicebear.com/7.x/adventurer/svg?seed=<?= $post['author']?>" alt="">
    <?= $post['author']?>
  </div>
</div>
<!-- Form Ends -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>

<?php

    session_unset()

?>