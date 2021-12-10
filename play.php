<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" href="play3.css?v=1.1">

</head>
<body>
    <header>
        <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-light ">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"> <img src="img/logo2.png"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <div class="mr-auto"></div>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Play games</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="leaderboard.php">Leaderboards</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login.php">New Player</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contact</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
        </div>
    </header>
    <?php
     if(isset($_GET['name'])){
        setcookie('my_login',$_GET['name']);
        setcookie('my_rand',rand(1,100));
        $_COOKIE['my_login'] = $_GET['name'];
        $GLOBALS['b_match'] = false;  
    }
    ?>
    <div class="pagecontainer">
   <div class="container col-lg-7 col-sm-6"> 
       <h2><? echo "Hey " . $_COOKIE['my_login'] . " Welcome To Playtime!"; ?> </h2>
    </div>

    <div class="container col-lg-7 col-sm-8">
      <h5>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
         when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,
          but also the leap into electronic typesetting, </h5>
    </div>

<div class="container col-lg-7 col-sm-10">
    <div class="row justify-content-center">

    <div class="card shadow " style="width: 23rem;">
  <img class="card-img-top" src="img/pixela.png" alt="Card image cap">
     <div class="card-body">
        <h5 class="card-title">Pixel dungeon</h5>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        <a href="pixel.php" class="btn btn-primary btn-lg" role="button">Play now</a>
     </div>
    </div>
  
<div class="card shadow" style="width: 23rem;">
  <img class="card-img-top" src="img/collect.png" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">Coin collector</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="jetman.php" class="btn btn-primary btn-lg" role="button">Play now</a>
  </div>
</div>
</div>
</div>


<div class="container col-lg-7 col-sm-10">
<h3>Learn how i build these games with pure JS code</h3>
      <h5>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
         when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,
          but also the leap into electronic typesetting, </h5>
    <a href="" class="btn btn-primary btn-lg" role="button">See more</a>
  </div>
<br></br>
</div>

<footer class="footer-07 col-sm-12">
      <p class="copyright">
      Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This site is made <i class="ion-ios-heart" aria-hidden="true"></i> by <a href="https://mvsuals.dk" target="_blank">Mvsuals.dk</a>
      </p>
</div>

</footer>
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="main.js"></script>
</body>
</html>