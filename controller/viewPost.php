<?php

session_start();
include "../env.php";
$title=$_REQUEST['title'];
$detail=$_REQUEST['detail'];
$author=$_REQUEST['author'];
$id=$_REQUEST['id'];

// $query="SELECT * FROM posts";
$query="SELECT  '$title', '$detail', '$author' FROM posts WHERE id=$id";
$response=mysqli_query($conn,$query);
$posts=mysqli_fetch_assoc($response,1);
// print_r($posts);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- navBar start -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav m-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Add Post</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">All Post</a>
        </li>
      </ul>
      
    </div>
  </div>
</nav>
    <!-- navbar end -->

    <table class="table table-responsive">
        <tr>
            <th>#</th>
            <th>Post Title</th>
            <th>Post Details</th>
            <th>Post Author</th>
            <th>Post Actions</th>
        </tr>

        <?php 
        foreach($posts as $index=>$post){
          ?>
          <tr>
          <td><?=++$index?></td>
          <td><?=$post['title']?></td>
          <td><?=$post['detail']?></td>
          <td><?=!empty($post['author'])?$post['author']:'USER'?></td>
          <td>
            <a href=""class="btn btn-sm btn-warning">View</a>
            <a href="./editPost.php?id=<?=$post['id']?>"class="btn btn-sm btn-primary">Edit</a>
            <a href="./controller/deletePost.php?id=<?=$post['id']?>"class="btn btn-sm btn-danger">Delete</a>
          </td>
          <?php
        }
        ?>
        </tr>
    </table>
</body>
</html>

