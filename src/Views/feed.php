<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/Views/style/style2.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.7.0/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/dca488f820.js" crossorigin="anonymous"></script>
    <title>Feed</title>
</head>
<body class='gradient-custom'>
  <!-- Header principal -->
  <div class="container">
    <header class=" d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-8">
        <a href="feed" class="d-flex align-items-center col-md-3 mb-2 mb-md-0  text-decoration-none ">
            <img class="bi me-2" width="160" height="120" role="img" aria-label="Bootstrap" src="src/Views/img/logo.png">
        </a>
    
      <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0 text-dark merde">
        <li class="nav-item"><a href="feed" class="nav-link active text-dark" aria-current="page">Home</a></li>
        <li class="nav-item"><a href="post" class="nav-link text-black">Post</a></li>
        <li class="nav-item"><a href="createpost" class="nav-link text-black">Creer un post</a></li>
        <li class="nav-item"><a href="friends" class="nav-link text-dark">Friends</a></li>
        <li class="nav-item"><a href="settings" class="nav-link text-dark">Settings</a></li>
      </ul>

      <div class="col-md-3 text-end">
        <img src="<?php echo "src/upload/".$_SESSION['id_user'];?>" alt="img profil" class="img-bar">
        <p><?php echo $info['pseudo']?></p>
      </div>
    </header>
  </div>
<!-- Header principal -->
    <!--Section: Newsfeed-->
    
    <?php

        if (sizeof($rows) == 0) {
            echo "Vous n'avez pas encore ajouté d'amis à votre liste d'amis";
        }
        foreach ($rows as $row) {
            if ($row['id_user'] == $_SESSION['id_user']){       
    ?>
    <a href="../Controllers/deletePost.php?id=<?php echo $row['id_publication'];?>">Delete</a>
    
    <?php } ?>

<div class="container">
  <div class="card my-5">
    <div class="card-body">
      <div class="row align-items-center">
        <div class="col-2 d-flex align-items-center justify-content-end w-auto">
        <img src="src/upload/<?php echo $row['id_user']; ?>" alt="Author photo" class="img-bar border-dark">
        </div>
        <div class="col-10">
          <div class="d-flex align-items-center justify-content-between">
            <h5 class="card-title mb-0"><?php echo $row['pseudo']?></h5>
            <small class="text-muted"><?php echo $row['date']?></small>
          </div>
          <p class="card-text"><?php echo $row['message']?></p>
        </div>
      </div>
      <div class='d-flex align-items-center justify-content-between mx-5'>
        <div class="d-flex align-items-center justify-content-start mt-3 w-50">
        
          <form action="feed?page=<?php echo $_GET['page'];?>&id=<?php echo $row['id_publication'];?>" method="post">
            <input type="submit" name="ok" value="👍" class="btn btn-secondary btn-sm mx-1">
          </form>

          <form action="feed?page=<?php echo $_GET['page'];?>&id=<?php echo $row['id_publication'];?>" method="post">
            <input type="submit" name="no" value="👎" class="btn btn-secondary btn-sm mx-1">
          </form>

          <form action="feed?page=<?php echo $_GET['page'];?>&id=<?php echo $row['id_publication'];?>" method="post">
            <input type="submit" name="laught" value="😂" class="btn btn-secondary btn-sm mx-1">
          </form>

          <form action="feed?page=<?php echo $_GET['page'];?>&id=<?php echo $row['id_publication'];?>" method="post">
            <input type="submit" name="hearth" value="❤️" class="btn btn-secondary btn-sm mx-1">
          </form>

          <form action="feed?page=<?php echo $_GET['page'];?>&id=<?php echo $row['id_publication'];?>" method="post">
            <input type="submit" name="sorry" value="😥" class="btn btn-secondary btn-sm mx-1">
          </form>
          
        </div>
        <div class="ml-auto d-flex align-self-end justify-content-end w-50">
          <a href="reaction?id=<?php echo $row['id_publication'];?>"><button class="btn btn-secondary btn-sm mx-3"><i class="fas fa-smile"></i> View reactions</button></a>
          <a href="commentaire?id=<?php echo $row['id_publication'];?>"><button class="btn btn-secondary btn-sm"><i class="fas fa-envelope"></i> View comments</button></a>
        </div>
      </div>
    </div>
  </div>
</div>
<?php } ?>


<div class="d-flex align-items-center justify-content-center mb-5">
<?php
        for ($i = 1; $i <= $nbpage; $i++) {
    ?>
        <a href="feed?page=<?php echo $i; ?>" class="next"><button class="btn btn-secondary btn-sm mx-1 justify-self-center"><?php echo $i; ?> </button></a>

<?php } ?>
</div>



</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.7.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Inclusion des fichiers JavaScript de Bootstrap via un CDN -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.16.1/dist/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</html>