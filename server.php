<?php

session_start();



$mysqli = new mysqli('localhost', 'root', 'root', 'crud') or die(mysqli_error($mysqli));

if (isset($_POST['save'])){
    $name = $_POST['name'];
    $point = $_POST['point'];
    $mysqli->query("INSERT INTO data (name, point) VALUES('$name', '$point')")  or die($mysqli->error);

    $_SESSION['message'] = "Highscore has been saved!";
    $_SESSION['msg_type'] = "success";

    header("location: leaderboard.php");
}
 if (isset($_GET['delete'])){
     $id = $_GET['delete'];
     $mysqli->query("DELETE FROM data WHERE id=$id") or die($mysqli->error());

     $_SESSION['message'] = "Highscore has been deleted!";
     $_SESSION['msg_type'] = "danger";

     header("location: leaderboard.php");
 }
 // echo "succses";

?>