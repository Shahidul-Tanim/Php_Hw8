<?php
session_start();
include "../db/env.php";
// *DATA COLLECTION

$title = $_REQUEST['title'];
$details = $_REQUEST['details'];
$author = $_REQUEST['author'];
$id = $_REQUEST['id'];

// *INITIATE AN EMPTY ARRAY

$errors = [];

// *DATA VALIDATION

if( empty($title) ){
    $errors['title_error'] = 'Title is epmty';
}
if( empty($details) ){
    $errors['details_error'] = 'Details is epmty';
}
if( strlen($author) > 30 ){
    $errors['author_error'] = 'Your name is too long!';
}

// print_r($errors);

// *CHECK ERRORS

if( count($errors) > 0 ){
    // *REDIRECTION
    $_SESSION['errors'] = $errors;
    header("Location: ../editPost.php?post_id=$id");
}else{
    // *PROCEED
    $query = "UPDATE posts SET title='$title',detail='$details',author='$author' WHERE id = $id";
    $res = mysqli_query($conn, $query);

    if($res){
        header("Location: ../allPosts.php");
    }
}