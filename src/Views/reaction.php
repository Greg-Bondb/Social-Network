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
    <title>Post</title>
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
            echo "Il n'y a pas de réaction pour l'instant, revenait plus tard ...";
        }
        foreach ($rows as $row) {      
    ?>
    

<div class="container">
  <div class="card my-5">
    <div class="card-body">
      <div class="row align-items-center">
      <?php if ($row['id_user'] == $_SESSION['id_user']){?>
            <form action="" class="form-sub" method="post">
              <button type="submit" value="<?php echo $row['id_reaction']?>" name="delete" class="button button-red">Supprimer</button>
            </form>
            <?php } ?>
        <div class="col-2 d-flex align-items-center justify-content-end w-auto">
        <img src="src/upload/<?php echo $row['id_user']; ?>" alt="Author photo" class="img-bar border-dark">
        </div>
        <div class="col-10">
          <div class="d-flex align-items-center justify-content-between">
            <h5 class="card-title mb-0"><?php echo $row['pseudo']?></h5>
          </div>
          <p class="card-text"><strong>a réagi avec</strong></p>
          <h3><?php echo $row['reaction'];?></h3></div>
        </div>
      </div>
      <div class='d-flex align-items-center justify-content-between mx-5'>
        <div class="d-flex align-items-center justify-content-start mt-3 w-50">
          
        </div>
      </div>
    </div>
  </div>
</div>
<?php } ?>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.7.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Inclusion des fichiers JavaScript de Bootstrap via un CDN -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.16.1/dist/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</html>