<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="Description" content="Enter your description here" />
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="./assets/css/style.css">
  <title>Soraya &hearts; Shop</title>
</head>
<style>
   body{
        background-image: url("./assets/images/oriental.jpg");
        background-size:cover;
    }
</style>
<body>
<div class="th1">
</div>
  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="#">Soraya &hearts; Shop</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="Bonjour.html">Accueil </a>

          </li>

          <?php if (isset($_SESSION['Auth'])) {
          ?>
            <li class="nav-item dropdown">
              <a class="nav-link" href="index.php?action=logout">Deconnexion</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Categories</a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="index.php?action=list_categorie">Liste Categories</a>
                <?php if (isset($_SESSION['Auth'])) {
                  if ($_SESSION['Auth']->role == 1) { ?>

                    <a class="dropdown-item" href="index.php?action=add_categorie">Ajout Categorie</a>
                <?php }
                } ?>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Articles</a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="index.php?action=list_article">Liste Articles</a>
                <?php if (isset($_SESSION['Auth'])) {
                  if ($_SESSION['Auth']->role == 1) { ?>
                    <a class="dropdown-item" href="index.php?action=ajout_article">Ajout Article</a>
                    <div class="dropdown-divider"></div>
              </div>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Utilistateurs</a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="index.php?action=list_user">Liste utilisateurs</a>
                <a class="dropdown-item" href="index.php?action=ajout_users">Inscription</a>
                <a class="dropdown-item" href="index.php?action=admin">Connexion</a>
                <div class="dropdown-divider"></div>
              </div>
            </li>
        </ul>
  <?php }}}  ?>
      </div>
    </nav>
  </div>


  <div class="container">
    <?= $content; ?>
  </div>



  <footer>
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="text-center text-white offset-3 col-6">CopyRight 2020 </div>
    </div>
    </nav>
    </div>
  </footer>







  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-alpha1/js/bootstrap.min.js"></script>
</body>

</html>