<?php
//*
session_start();
include'../env.php';
//*
//*input collection
$title=$_REQUEST['title'];
$detail=$_REQUEST['detail'];
$author=$_REQUEST['author'];


$errors=[];
//*Validation

if (empty($title)) {
    $errors['title_error']="Apnr title koi?";
} elseif(strlen($title)>=50){
    $errors['title_error']="R koto?";
}

if (empty($detail)) {
    $errors['detail_error']= "Apnr detail koi?";
}

if (count($errors)> 0) {
    //*Redirect back
    //* header() is redirect or transfer function
    //*make session
    $_SESSION['form_errors']=$errors;
    $_SESSION['old']=$_REQUEST;
    header("Location:../index.php");
} else {
    //*Move forward
    $query="INSERT INTO posts( title, detail, author) VALUES ('$title','$detail','$author')";
    $response=mysqli_query($conn,$query);
    // var_dump($response);
    if ($response) {
        $_SESSION['msg']='Your post has been Submitted';
        header("location:../index.php"); 
    } 
    
}


?>