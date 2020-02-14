<?php include 'databaseConn/session.php'; ?>
<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Cookie.js -->
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

    <title>Animestreams |
        <?php echo 'Home'; /*Custom title*/ ?>
    </title>

    <style>
      main {
        background-color: #f5f5f5;
      }
    </style>
</head>
<body>

    <!-- Navbar -->
    <?php include './includes/navbar.php'; ?>

    <!-- Content -->
    <div class="containter">
        <div class="row">
            <?php
                include './databaseConn/database.php';
                include './includes/animes.php';

                initializeConnection();

                $animes = listAnimes();
                displayAnimes($animes);

                closeConnection();
            ?>
        </div>
    </div>

    <!-- Footer -->
    <?php include './includes/footer.php'; ?>


</body>
</html>
