<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/Views/style/style2.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Setting</title>
</head>
<body class="gradient-custom">
<div >

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
    <div class="row gutters">
        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
            <div class="card h-100">
                <div class="card-body shadow-sm">
                    <div class="account-settings">
                        <div class="user-profile">
                            <div class="user-avatar">
                                <img src="<?php echo "src/upload/".$_SESSION['id_user'];?>" alt="img profil" class="img-profil">
                               
                                <form action="" method="post" class="form-example" enctype="multipart/form-data">

                                    <div class="form">
                                        <input type="file" name="file" id="file2" required>
                                    </div>

                                    <div class="form">
                                        <input type="submit" value="Changer de photo de profil" name="changeimg">
                                    </div>

                                </form>

                            </div>
                            <h5 class="user-name"><?php echo $info['first_name']." ".$info['last_name'] ?></h5>
                            <h6 class="user-email"><?php echo $info['email']?></h6>
                        </div>
                        <div class="about">
                            <!-- <h5 class="mb-2 text-primary">A propos</h5>
                            <p>Salut, je suis Alexis.</p> -->
                            <h5 class="mb-2 text-primary">Nombre d'amis</h5>
                            <p><?php echo $comptFriend[0]?></p>
                            <h5 class="mb-2 text-primary">Post publié</h5>
                            <p><?php echo $comptPost[0]?></p>
                            <h5 class="mb-2 text-primary">Commentaire écrit</h5>
                            <p><?php echo $comptComment[0]?></p>
                            <h5 class="mb-2 text-primary">nombre de réaction</h5>
                            <p><?php echo $comptReaction[0]?></p>

                            <div class="button-delete">
                                <form action="" method="post">
                                    <!-- <input type="submit" name='delete' value="Effacer compte"> -->
                                    <button type="submit" name="delete" class="button button-red">Effacer compte</button>
                                </form>
                            </div>

                            <div class="button-disconect">
                                <form action="" method="post">
                                    <!-- <input type="submit" name='disconnect' value="Deconnecter compte"> -->
                                    <button type="submit" name="disconnect" class="btn btn-secondary">Deconnecter compte</button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row gutters">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <h6 class="mb-3 text-primary">Détails du Profil :</h6>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="fullName">Nom</label>
                                <p><?php echo $info['last_name']?></p>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="eMail">Prénom</label>
                                <p><?php echo $info['first_name']?></p>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="phone">Genre</label>
                                <p><?php echo $info['gender']?></p>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="website">Email</label>
                                <p><?php echo $info['email']?></p>
                            </div>
                        </div>
                    </div>
                    <div class="row gutters">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label class="ciTy">Pseudo</label>
                                <p><?php echo $info['pseudo']?></p>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="ciTy">Date de Naissance</label>
                                <p><?php echo $info['birth_date']?></p>
                            </div>
                        </div>
                    </div>
                    <hr class="my-4" />
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <form action="" method="post" class="col-md-6-modif">

                                <div class="form-group">
                                    <label for="password">Ancien Mot de passse</label>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Entrez votre ancien mot de passe ..." required>
                                </div>

                                <div class="form-group">
                                    <label for="password1">Nouveau Mot de passe</label>
                                    <input type="password" class="form-control" name="password1" id="password1" placeholder="Entrez votre nouveau mot de passe ..."required>
                                </div>

                                <div class="form-group">
                                    <label for="password2">Confirmer Nouveau Mot de passe</label>
                                    <input type="password" class="form-control" name="password2" id="password2" placeholder="Entrez à nouveau votre nouveau mot de passe ..." required>
                                </div>

                                <div class="form-group-under">
                                    <button type="reset" name="submit" class="btn btn-secondary">Annuler</button>
                                    <button type="submit" name="button_mdp" class="btn btn-primary">Mettre à jour</button>
                                </div>

                            </form>

                            <div class="error text-danger">
                                <?php if (isset($_POST['button_mdp'])){
                                    echo $error;
                                } ?>
                            </div>

                        </div>

                        <div class="col-md-6">
                            <p class="mb-2">Mot de passe requis</p>
                            <p class="small text-muted mb-2">Pour créer un nouveau mot de passe, il doit contenir:</p>
                            <ul class="small text-muted pl-4 mb-0">
                                <li>Minimum 8 caractère</li>
                                <li>Un caractère spécial</li>
                                <li>Au moins un nombre</li>
                                <li>Ne soit pas le même mot de passe que l'ancien</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>