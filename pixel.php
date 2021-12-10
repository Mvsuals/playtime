<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="pix.css">
   
</head>

<body>
<header>
        <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-light ">
  <div class="container-fluid">
    <a class="navbar-brand" href="play.php"> <img src="img/logo2.png"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <div class="mr-auto"></div>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="play.php">Play games</a>
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
    
<center>
<div class="row justify-content-center">
   <div class="text rounded shadow">
     
   </div>

<div class="text1 rounded text-center shadow">
        <h1><img src="img/heart.gif" alt="" width="35" height="35"><span id="liv"> 3</span></h1>
        <h1> <img src="img/diamond1.gif" alt="" width="45" height="50"><span id="point">0</span></h1>
    </div>
    </div>
</center>

<center>
    <div class="col-xs-12">
    <canvas class="shadow" width="600" height="600"> </canvas>
    </div>
</center>
 


<center>

<div style="row justify-content-center">
<div style="container">
    <button class="btn-light rounded" onclick="moveup()"><i class="fas fa-chevron-up"></i></button>
<div style="row justify-content-center">
    <button class="btn-light rounded" onclick="moveleft()"><i class="fas fa-chevron-left"></i></button>
    <button class="btn-light rounded" onclick="moveright()"><i class="fas fa-chevron-right"></i></button>
</div>
    <button class="btn-light rounded" onclick="movedown()"><i class="fas fa-chevron-down"></i></i></button>
   
</div>
</div>
</center>
<footer class="footer-07 col-sm-12">
      <p class="copyright">
      Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This site is made <i class="ion-ios-heart" aria-hidden="true"></i> by <a href="https://mvsuals.dk" target="_blank">Mvsuals.dk</a>
      </p>
</div>

</footer>

<script>
    function updateGameArea() {
        playerPosition.clear();
        playerPosition.newPos();    
        playerPosition.update();
    }
    
    function moveup() {
        if(arr[playerPosition.x][playerPosition.y -1]==free){
            arr[playerPosition.x][playerPosition.y -1]=player;
            arr[playerPosition.x][playerPosition.y]=free;
            walk();
        }
        else if(arr[playerPosition.x][playerPosition.y -1]==monster){
            arr[playerPosition.x,1][playerPosition.y,1]=player;
            arr[playerPosition.x][playerPosition.y]=free;
            document.getElementById("liv").innerHTML = liv-=1;
            dead();
        }
        else if(arr[playerPosition.x][playerPosition.y-1]==diamond){
            arr[playerPosition.x][playerPosition.y-1]=player;
            arr[playerPosition.x][playerPosition.y]=free;
            take();
            document.getElementById("point").innerText = point+=10;
        }
        drawMaze();
    }
    
    function movedown() {
        if(arr[playerPosition.x][playerPosition.y +1] == free){
            arr[playerPosition.x][playerPosition.y +1] = player;
            arr[playerPosition.x][playerPosition.y] = free;
            walk();
        }
        else if(arr[playerPosition.x][playerPosition.y +1] == monster){
            arr[playerPosition.x,1][playerPosition.y,1] = player;
            arr[playerPosition.x][playerPosition.y] = free;
            document.getElementById("liv").innerHTML = liv-=1;
            dead();
        }
        else if(arr[playerPosition.x][playerPosition.y+1] == diamond){
            arr[playerPosition.x][playerPosition.y+1] = player;
            arr[playerPosition.x][playerPosition.y] = free;
            take();
            document.getElementById("point").innerText = point+=10;
           
        }
        drawMaze(); 
    }
    
    function moveleft() {
        if(arr[playerPosition.x -1][playerPosition.y]==free){
            arr[playerPosition.x -1][playerPosition.y]=player;
            arr[playerPosition.x][playerPosition.y]=free;
            walk();
        }
        else if(arr[playerPosition.x -1][playerPosition.y]==monster){
            arr[playerPosition.x,1][playerPosition.y,1]=player;
            arr[playerPosition.x][playerPosition.y]=free;
            document.getElementById("liv").innerHTML = liv-=1;
            dead();
        }
        else if(arr[playerPosition.x -1][playerPosition.y]==diamond){
            arr[playerPosition.x -1][playerPosition.y]=player;
            arr[playerPosition.x][playerPosition.y]=free;
            take();
            document.getElementById("point").innerText = point+=10;
        }
        drawMaze();
    }
    
    function moveright() {
        if(arr[playerPosition.x +1][playerPosition.y]==free){
            arr[playerPosition.x +1][playerPosition.y]=player;
            arr[playerPosition.x][playerPosition.y]=free;
            walk();
        }
        else if(arr[playerPosition.x +1][playerPosition.y]==monster){
            arr[playerPosition.x,1][playerPosition.y,1]=player;
            arr[playerPosition.x][playerPosition.y]=free;
            document.getElementById("liv").innerHTML = liv-=1;
            dead();
        }
        else if(arr[playerPosition.x +1][playerPosition.y]==finish){
            arr[playerPosition.x,1][playerPosition.y,1]=player;
            arr[playerPosition.x][playerPosition.y]=free;
            win();
        }
        else if(arr[playerPosition.x +1][playerPosition.y]==diamond){
            arr[playerPosition.x +1][playerPosition.y]=player;
            arr[playerPosition.x][playerPosition.y]=free;
            take();
            document.getElementById("point").innerText = point+=10;
        }
        drawMaze();
    }
    
    </script>

<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/db15534eaa.js" crossorigin="anonymous"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="sweetalert2.all.min.js"></script>

<script src="pixed.js" defer></script>

</body>

</html>