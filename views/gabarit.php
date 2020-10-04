<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="Description" content="Enter your description here" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <title>Title</title>
<style>
    body{
        /*background-image: url("./assets/images/oriental.jpg");*/
        background-size:cover; 
        background-color: rgb(145, 186, 189);
        color: white;
    
    }
    .jumbotron{
      background-image: url("./assets/images/oriental.jpg");
      height: 300px;

      background-color: rgb(145, 186, 189);
   
  
    }
    h3{
      margin-top: -30px;
     
    }

</style>
</head>

<body>
  <div class="theme1">
    
  </div>
  <div class="container">
    <header>
      <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="navbar-brand" href="#">
              Soraya &hearts; Shop
            </a>

          </li>
        
          <li class="nav-item">
            <a class="nav-link " href="bonjour.html"><span class="fa fa-hom"></span> Accueil</a>
          </li>

          <li class="nav-item">
            <a class="nav-link  " href="index.php?action=admin">Administration</a>
          </li>
        </ul>
      </nav>
      <div class="jumbotron">
      </div>
      
   
    </header>

    <?= $content; ?>

    <footer class="text-white">
      <nav class="navbar  navbar-dark bg-dark ">
      <div class="text-center text-white offset-3 col-6">CopyRigth 2020 </div>
      </nav>
    </footer>

  </div>
 

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>

</div>