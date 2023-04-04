<?php
include "../env.php";
$id=$_REQUEST['id'];
$query="DELETE FROM posts WHERE id=$id";
$response=mysqli_query($conn,$query);

if($response){
    header("Location:../allPost.php");
}

?>