<?php
session_start();
// print_r($_SESSION['form_errors'])
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
    <div class="card-header bg-dark text-light">Add Post</div>


        <div class="card-body">
        <form action="./controller/addPost.php" method="GET">
        
        <input value="<?php echo isset($_SESSION['old']['title']) ? 
        $_SESSION['old']['title'] : '' ?>"
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
        placeholder="Your Post Detail"><?= isset($_SESSION['old']['detail']) ? $_SESSION['old']['detail'] : ''  ?></textarea>
        <?php
        if (isset($_SESSION['form_errors']['detail_error'])) {
          ?>
          <span><?= $_SESSION['form_errors']['detail_error']?></span>
          <?php
        }
        ?>
        <input value='<?php echo isset($_SESSION['old']['author']) ? $_SESSION['old']['author'] : '' ?>' name="author" class="form-control mt-3"  type="text" 
        placeholder="Author name">
        <button class="btn btn-dark mt-3 rounded-0 w-100">Submit</button>
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