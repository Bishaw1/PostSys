<?php
session_start();
include './env.php';
$id=$_REQUEST['id'];
$query="SELECT * FROM posts WHERE id='$id'";
$response=mysqli_query($conn,$query);
$post=mysqli_fetch_assoc($response);
// print_r($post);
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
          <a class="nav-link active" aria-current="page" href="./controller/addPost.php">Add Post</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./allPost.php">All Post</a>
        </li>
      </ul>
      
    </div>
  </div>
</nav>
    <!-- navbar end -->

    <!-- Form Start -->
    <div class="card col-lg-5 mx-auto mt-5">
    <div class="card-header bg-dark text-light">Edit Post</div>


        <div class="card-body">
        <form action="./controller/updatePost.php" method="POST">
        
        <input value="<?=$post['title']?>"
        name="title" class="form-control mt-3"  type="text" 
        placeholder="Your post title">

        <?php
        if (isset($_SESSION['form_errors']['title_error'])) {
          ?>
          <span><?= $_SESSION['form_errors']['title_error']?></span>
          <?php
        }
        ?>
        
        <textarea name="detail" class="form-control mt-3"  
        placeholder="Your Post Detail"><?=$post['detail']?></textarea>
        <?php
        if (isset($_SESSION['form_errors']['detail_error'])) {
          ?>
          <span><?= $_SESSION['form_errors']['detail_error']?></span>
          <?php
        }
        ?>
        <input type="hidden" name="id" value="<?=$post['id']?>">
        <input value='<?=$post['author']?>' name="author" class="form-control mt-3"  type="text" 
        placeholder="Author name">
        <button class="btn btn-dark mt-3 rounded-0 w-100">Update Post</button>
        </form>
        </div>

    </div>
    <!-- Form End -->
    <div class="toast <?= isset($_SESSION['msg']) ? 'show' : ""?>" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="toast-header">
    
    <strong class="me-auto">PostSys</strong>
    <small>1 sec ago</small>
    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
  </div>
  <div class="toast-body">
    <?=isset($_SESSION['msg']) ? $_SESSION['msg'] : '' ?>
  </div>
</div>
</body>
</html>

<?php
  session_unset();
?>