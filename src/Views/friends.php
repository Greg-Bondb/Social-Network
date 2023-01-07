<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/Views/style/style2.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Friends</title>
</head>

<body class="gradient-custom">

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

<div class="container mt-xxl-5">
    <div class="create-feed">
        <form action="" method="post" class="searchform">
            <label for="friends">Enter your name friend : </label>
            <input type="text" name="friends" class="form-control form-control-lg w-50 bar" id="barsearch" required/>
            <input type="submit" value="Valider" name="submit" class="submit">
        </form>
        <div class="error text-danger text-center abso">
            <p>
                <?php
                    if(isset($_POST["submit"])) {
                        echo $error;
                    }
                ?>
            </p>
        </div>
    </div>

    <div class="row">

        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
            <div class="card h-100">
                <div class="card-body shadow-sm extend">
                    <h5 class="mb-2 text-primary">Demandes d'amis envoyées :</h5>
                    <div class="form-friends">
                        <?php
                            foreach ($friendsRequest as $key) {
                            echo $key['pseudo']."<br>";?>
                            <img src="<?php echo "src/upload/".$key['id_user'];?>" alt="img profil" class="img-bar2">
                            <form action="friends?id=<?php echo $key['id_request']; ?>" method="post" class="friend-column">
                                <button type="submit" value="Supprimer" name="Supprimer" class="button button-red">Supprimer</button>
                            </form>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="card h-100">
                <div class="card-body shadow-sm extend">
                    <h5 class="mb-2 text-primary">Demandes d'amis reçus :</h5>
                    <div class="friend-case">
                        <?php 
                            foreach ($friendsReceive as $key) {
                        ?>
                        <div class="form-friends">
                            <?php echo $key['pseudo']."<br>";?>
                            <img src="<?php echo "src/upload/".$key['id_user'];?>" alt="img profil" class="img-bar2">
                        </div>

                            <form action="friends?id=<?php echo $key['id_request'];?>" method="post" class="friend-column">
                                    <button type="submit" value="Accepter" name="Accepter" class="button">Accepter</button>
                                    <button type="submit" value="Refuser" name="Refuser" class="button button-red">Refuser</button>
                                </form>
                            <?php } ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12" id="sup">
            <div class="card h-100">
                <div class="card-body shadow-sm extend">
                    <h5 class="mb-2 text-primary">Liste d'amis :</h5>
                    <div class="form-friends mid">
                        <?php foreach ($list as $key) {
                            echo $key['pseudo']."<br>";?> 
                            <img src="<?php echo "src/upload/".$key['id_user'];?>" alt="img profil" class="img-bar2">
                            <form action="friends?id=<?php echo $key['id_request']; ?>" method="post" class="friend-column">
                                <button type="submit" value="Supprimer" name="Supprimer" class="button button-red">Supprimer</button>
                            </form>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
            <div class="card h-100">
                <div class="card-body shadow-sm extend">
                    <h5 class="mb-2 text-primary">Suggestions :</h5>
                    <div class="form-friends mid">
                       
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>