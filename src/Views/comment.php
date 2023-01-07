<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/Views/style/style2.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/dca488f820.js" crossorigin="anonymous"></script>
    <title>Post</title>
</head>
<body class='gradient-custom bc'>
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
    
<div class="container c2">
  <div class="card my-5">
    <div class="card-body">
      <div class="row align-items-center">
        <div class="d-flex mb-3">
          <div class="form-outline w-100 redef">
            <strong>Zone de commentaire</strong>
            <form action="" class="form-sub" method="post">
              <textarea name="comment" class="form-control red" id="textAreaExample" rows="2" placeholder="Description..."></textarea>
              <button type="submit" value="send" name="send" class="button">Envoyer</button>
            </form>

          </div>
        </div>
        <!-- Input -->
  
        <!-- Answers -->
  
        <!-- Single answer -->
        <?php 
            foreach ($commentList as $key) {
        ?>
        <div class="d-flex mb-3 mt-3">
          <div class="col-md-3 text-end">
            <img src="<?php echo "src/upload/".$key['id_user'];?>" alt="img profil" class="img-bar">
          </div>
          <div class="page">
            <div class="bg-light rounded-3 px-3 py-1">
              <div class="block-head">
                <strong><?php echo $key['pseudo'];?></strong>
                <p><?php echo $key['date'];?></p>
              </div>
              <div>
                <small><?php echo $key['message'];?></small>
              </div>
            </div>
          </div>
        </div>
          <?php if ($key['id_user'] == $_SESSION['id_user']) {?>
            <form action="" class="form-sub" method="post">
              <button type="submit" value="<?php echo $key['id_comment']?>" name="delete" class="button button-red">Supprimer</button>
            </form>
          <?php }?>
        <?php } ?>


      </div>
    </div>
  </div>
</div>

</body>

</html>