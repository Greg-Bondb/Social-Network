<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="src/Views/style/style2.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans&display=swap" rel="stylesheet"> 
    <title>Register</title>
</head>
<body class="gradient-custom">
    <section>
        <div class="container py-5 h-100">
          <div class="row justify-content-center align-items-center h-100">
            <div class="col-12 col-lg-9 col-xl-7">
              <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                <div class="card-body p-4 p-md-5">
                  <!-- Header principal -->


  <div class="container d-flex justify-content-center mb-xl-5">
    <a href="login" class="d-flex align-items-center col-md-3 mb-2 mb-md-0  justify-content-center text-decoration-none">
        <img class="bi me-2" width="156" height="128" role="img" aria-label="Bootstrap" src="src/Views/img/logo.png">
    </a>
</div>
<!-- Header principal -->

                  <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 text-center">Inscription Social Network</h3>
                  <form action="" method="post" enctype="multipart/form-data">
      
                  <div class="error text-danger text-center">
                      <?php
                        if (isset($_POST['submit'])) {
                          echo $error;
                        }
                      ?>
                  </div>
                    <div class="row">
                      <div class="col-md-6 mb-4">
      
                        <div class="form-outline">
                          
                          <label class="form-label" for="file">Image de profil</label>
                          <input name='file' type="file" id="file" class="form-control form-control-lg" required />
                        </div>
      
                      </div>

                      <div class="col-md-6 mb-4">
      
                        <h6 class="mb-2 pb-1">Genre</h6>
      
                        <div class="form-check form-check-inline">
                          <input  class="form-check-input" name='genre' type="radio" id="femaleGender"
                            value="Femme" checked required/>
                          <label class="form-check-label" for="femaleGender">Femme</label>
                        </div>
      
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="genre" id="maleGender"
                            value="Homme" required/>
                          <label class="form-check-label" for="maleGender">Homme</label>
                        </div>
      
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="genre" id="otherGender"
                            value="Autre" required/>
                          <label class="form-check-label" for="otherGender" >Aucun</label>
                        </div>
      
                      </div>

                    </div>

                    <div class="row">
                      <div class="col-md-6 mb-4">
      
                        <div class="form-outline">
                          <label class="form-label" for="firstName">Prénom</label>
                          <input type="text" name='firstName' id="firstName" class="form-control form-control-lg" placeholder="Entrez votre prénom ..." required />
                        </div>
      
                      </div>
                      <div class="col-md-6 mb-4">
      
                        <div class="form-outline">
                          <label class="form-label" for="lastName">Nom</label>
                          <input type="text" name='lastName' id="lastName" class="form-control form-control-lg" placeholder="Entrez votre nom ..." required/>
                        </div>
      
                      </div>
                    </div>
      
                    <div class="row">
                      <div class="col-md-6 mb-4 d-flex align-items-center">
      
                        <div class="form-outline datepicker w-100">
                          <label for="birth" class="form-label">Date de Naissance</label>
                          <input type="date" name='birth' class="form-control form-control-lg" id="birth" required/>
                        </div>
      
                      </div>

                      <div class="col-md-6 mb-4 pb-2">
      
                        <div class="form-outline">
                            <label class="form-label" for="pseudo">Pseudo</label>
                            <input type="text" name='pseudo' id="pseudo" class="form-control form-control-lg" placeholder="Entrez votre pseudo ..." required/>
                        </div>

                      </div>
                      
                    </div>
      
                    <div class="row">
                      <div class="col-md-6 mb-4 pb-2">
      
                        <div class="form-outline">
                          <label class="form-label" for="email">Email</label>
                          <input type="email" name='email' id="emailAddress" class="form-control form-control-lg" placeholder="Entrez votre email ..." required/>
                        </div>
      
                      </div>

                      <div class="col-md-6 mb-4 pb-2">
      
                        <div class="form-outline">
                            <label class="form-label" for="password">Mot de passe</label>
                            <input type="password" name='password' id="emailAddress" class="form-control form-control-lg" placeholder="Entrez votre mot de passe ..." required/>
                        </div>

                      </div>

                    </div>
      
      
                    <div class="mt-4 pt-2">
                      <input class="btn btn-dark btn-lg" type="submit" name='button' value="S'enregistrer" />
                    </div>
      
                  </form>
                </div>
                <!-- Register buttons -->
                <div class="text-center justify-content-center align-items-center text-decoration-none">
                    <p>Voues êtes déjà membre ? <a href="login" class="text-blue text-decoration-none"><strong>Se connecter</strong></a></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
</body>
</html>



<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>

    <?php 
    if (isset($_POST["button"])) {
        echo $error; 
    }
    ?>
    <form action="" method="post" class="form-example" enctype="multipart/form-data">

        <div class="form-exemple">
            <label for="file">Fichier</label>
            <input type="file" name="file" required>
        </div>

        <div class="form-example">
            <label for="email">Enter your email: </label>
            <input type="email" name="email" id="email" required>
        </div>

        <div class="form-example">
            <label for="pseudo">Enter your pseudo: </label>
            <input type="text" name="pseudo" id="pseudo" required>
        </div>

        <div class="form-example">
            <label for="password">Enter your password: </label>
            <input type="password" name="password" id="password" required>
        </div>

        <div class="form-example">
            <input type="submit" name="button" value="Subscribe!">
        </div>

    </form>

</body>
</html> -->