<?php

session_start();

include "./db/env.php";

$query = "SELECT * FROM posts";
$res= mysqli_query($conn,$query);
$posts = mysqli_fetch_all($res,1);

// echo "<pre>";
// print_r($posts);
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
  <div class="card-header">All Posts</div>
  <div class="cardBody">

    <table class="table">
        
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Author</th>
            <th>Detail</th>
            <th></th>
        </tr>

        <?php 
            if(count($posts) > 0){
            foreach($posts as $key=> $post){
        ?>
                    
            <tr>
                <td><?= ++$key ?></td>
                <td><?= $post['title'] ?></td>
                <td>
                    <img style="width: 40px; height; 40px; border-radius: 50%; object-fit:cover;" src="https://api.dicebear.com/7.x/thumbs/svg?seed=<?= $post['author'] ?>" alt="">
                    <?= $post['author'] ?>
                </td>
                <td><?= strlen($post['detail']) > 15? substr($post['detail'],0,15 ) . "..." : $post['detail']  ?></td>
                <td>
                  <div class="btn-group">
                    <a  class="btn btn-sm btn-info" href="./showPost.php?id=<?= $post['id']?>">Show</a>
                    <a  class="btn text-white btn-sm btn-warning" href="./editPost.php?post_id=<?= $post['id']?>">Edit</a>
                    <a  class="btn text-white btn-sm btn-danger" href="./controller/deletePost.php?id=<?= $post['id']?>">Delete</a>
                  </div>
                </td>
            </tr>

            <?php
            }
        }else{
        ?>
        
            <tr>
                <td colspan="4" class="text-center"><h5>No Post found</h5> </td>
            </tr>

        <?php
        }
        ?>

    </table>

  </div>
</div>
<!-- Form Ends -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>

<?php

    session_unset()

?>