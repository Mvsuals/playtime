<?php require_once('config.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Document</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" href="play1.css?v=1.1">
</head>

<body>

    <div>
        <?php
    
    if(isset($_POST['create'])){
        $name = $_POST['name'];

    $sql = "INSERT INTO users(name) VALUES(?)";
    $stmtinsert = $db->prepare($sql);
    $result = $stmtinsert->execute([$name]);
    if ($result){
        echo 'User Login complete';
    }else{
        echo 'User Login fail';
    }
}
    ?>
    </div>

    <div class="container vh-100">
        <div class="row justify-content-center h-100">
            <div class=" card my-auto shadow">

                <div class="card-header text-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="228.263" height="192.149" viewBox="0 0 228.263 192.149">
  <g id="Group_12" data-name="Group 12" transform="translate(-41.701 -12.082)">
    <path id="Icon_simple-player-dot-me" data-name="Icon simple-player-dot-me" d="M65.958,0A61.426,61.426,0,0,0,4.537,61.42v2.5c1.769,44.632,48.4,100.675,48.4,100.675V90.56a31.947,31.947,0,1,1,23.29,1.118L76,91.746v30.36A61.443,61.443,0,0,0,66.2.007h-.247Z" transform="translate(82.707 10.831) rotate(16)" fill="#fff"/>
    <text id="LAYTIME" transform="translate(99.963 151.452)" fill="#fff" font-size="32" font-family="SegoeUI-SemilightItalic, Segoe UI" font-weight="300" font-style="italic" letter-spacing="0.181em"><tspan x="0" y="35">LAYTIME</tspan></text>
  </g>
</svg>
                    <br></br>
                    <p class="p-1 m-0 text-black-50">Login and beat your highscore!</p>
                </div>


                <div class="card-body">
                    <?
            unset($_COOKIE['my_login']);
            setcookie('my_login', '', time() - 3600, '/'); 
        ?>
                    <form action="play.php" method="get">
                        <div class="form-group text-center text-black-50">
                            <label for="Name">Player Name</label>
                            <input class="form-control" id=type="text" name="name" required>
                        </div>
                        <input class="btn btn-primary w-50 offset-3" type="submit" name="create" value="Enter">
                    </form>
                </div>
                <div class="card-footer text-black-50">
                    <small>&copy; PlayTime a MVsuals website</small>
                </div>
            </div>
        </div>
    </div>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="main.js"></script>

    <script type="text/javascript">
        $(function () $('#Enter').click(function ()

                    Swal.fire(
                        'Good job!',
                        'You clicked the button!',
                        'success'
                    );
    </script>

</body>

</html>