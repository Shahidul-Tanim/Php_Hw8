<?php
session_start();

include "../db/env.php";
// *Data

$title = $_REQUEST["title"];
$details = $_REQUEST["details"];
$author = $_REQUEST["author"];

// *ARRAY

$errors = [];

// *ARRAY
// *DATA VALIDATION

// *TITE VAIDATION

if( empty($title) ){
    $errors["title_error"] =" title den bhai";
} elseif( strlen($title) > 100 ){
    $errors["title_error"] ="etoboro title bhai?";
}

// *DETAILS VALIDATION

if( empty($details) ){
    $errors["detail_error"] ="details na dile kivabe hobe?";
}

// * if we have errors

if( count($errors) > 0 ){
    $_SESSION["old_data"] = $_REQUEST;
    $_SESSION["errors"] = $errors;

    //* REDIRECTION
    header("Location: ../index.php");
}else{
    $query = "INSERT INTO posts(title, detail, author) VALUES ('$title','$details','$author')";
    $res = mysqli_query($conn,$query);

    if($res){
        $_SESSION["msg"] = "your data has been successfully submitted";
        header("location: ../index.php");
    }
}