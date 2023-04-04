<?php
session_start();
include "../env.php";
$title=$_REQUEST['title'];
$detail=$_REQUEST['detail'];
$author=$_REQUEST['author'];
$id=$_REQUEST['id'];

$errors=[];


if(empty($title)){
    $errors['title_error']="Apnr title koi?";
}
if(empty($detail)){
    $errors['detail_error']="Apnr detail koi?";
}
print_r($errors);

if(count($errors) > 0){
    $_SESSION['form_errors']=$errors;
    header("Location:../editPost.php?id=$id");
}else{
    $query="UPDATE posts SET title='$title',detail='$detail',author='$author' WHERE id='$id'";
    $response=mysqli_query($conn,$query);
    if ($response) {
        header("Location:../allPost.php");
        
    }
    

}
?>