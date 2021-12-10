<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" href="leadb.css?v=1.1">
    <title>Leaderbpard Form In Php</title>
</head>
  <body>
  <?php require_once 'server.php'; ?>
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
   
<?php if (isset($_SESSION['message'])): ?>

<div class="alert alert-<?=$_SESSION['msg_type']?>">

<?php
 echo $_SESSION['message'];
 unset ($_SESSION['message']);
?>
</div>
<?php endif ?>

  <?php 
  $mysqli = new mysqli('localhost', 'root', 'root', 'crud') or die(mysqli_error($mysqli));
  $result = $mysqli->query("SELECT * from data") or die($mysqli->error);
?>


<div class="page-container">
    <div class="container">
            <div class="col-lg-6 m-auto">   
               <div class="card mt-5">
                  <div class="row">
                     <div class="card-title">
                            <h2>Leaderboard</h2>
                            <h5>Lorem Ipsum is simply dummy text of the printing and typesetting industry.  </h5>
                    </div>
    
          <table class="table table-sortable">
          <tbody>
               <thead>
                     <tr>
                         <th>Name</th>
                         <th>Point</th>
                         <th colspan="2">Action</th>
                     </tr>
              </thead>

  <?php 
  while ($row = $result->fetch_assoc()):
  ?>

                    <tr>
                        <td><?php echo $row['name']?></td>
                       <td><?php echo $row['point']?></td>
                       <td>
                            
                             <a href="server.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
                      </td>
                   </tr>
  <?php endwhile; ?>
  </tbody>
            </table>


<?php
  function pre_r( $array ) {
    echo'<pre>';
    print_r($array);
    echo'<pre>';
  }
  ?>


    <form action="server.php" method="POST">

        <div class="form-group form2">
        <label>Name</label>
        <input type="text" name="name" class="form-control" value="Enter your name">
        </div>

        <div class="form-group">
        <label>Point</label>
        <input type="text" name="point" class="form-control" value="Enter your Points">
        </div>

        <div class="form-group">
          <button type="submit" class="btn btn-primary" name="save">save</button>
        </div>

      </form>
    </div>
  </div>
  </div>
  </div>
  </div>

    <footer class="footer-07 col-sm-12">
      <p class="copyright">
      Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This site is made <i class="ion-ios-heart" aria-hidden="true"></i> by <a href="https://mvsuals.dk" target="_blank">Mvsuals.dk</a>
      </p>

</footer>
    <!-- Optional JavaScript; choose one of the two! -->
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script src="tablesrt.js"></script>

  </body>
</html>

