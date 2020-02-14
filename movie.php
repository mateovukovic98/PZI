<?php include 'databaseConn/session.php'; ?>
<!DOCTYPE html>
<html lang="en">
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

    <title>O Filmu |
        <?php echo 'Filmovi'; /*Custom title*/ ?>
    </title>

</head>
<body>

    <!-- Navbar -->
    <?php include './includes/navbar.php'; ?>

    <!-- Content -->
    <?php

        include './databaseConn/database.php';

        initializeConnection();

        $movie = getMovieById($_GET['id']);
    ?>
    <div class="container">
        <div class="row">
            <div class="col s8">
                <div class="card ">
                    <div class="card-image">
                        <img src="<?php echo 'assets/'.$movie['poster']; ?>">
                    </div>
                    <div class="card-content">
                        <p><?php echo $movie['opis']; ?></p>
                    </div>
                    <?php if(checkSession()){ ?>
                        <div class="card-action">
                            <button onclick="myFunction()" class = "btn indigo" name = "rez">Rezerviraj</button>
                        </div>
                    <?php } else {?>
                      <div class="card-action">
                        <a href="#" class = "btn disabled">Logiraj se rezervaciju</a>
                      </div>
                    <?php } ?>

                </div>
            </div>
            <div class="col s4">
                <div class="card-panel indigo darken-3">
                    <p class="white-text">
                        <b>Redatelj: </b>
                        <i><?php echo $movie['redatelj']; ?></i>
                    </p>
                    <p class="white-text">
                        <b>Glumci: </b>
                        <i><?php echo $movie['glumci']; ?></i>
                    </p>
                    <p class="white-text">
                        <b>Trajanje: </b>
                        <i id="price"><?php echo $movie['trajanje']; ?></i>
                    </p>
                    <p class="white-text">
                        <b>Blagajna: </b>
                        <i><?php echo $movie['blagajna']; ?></i>
                    </p>
                </div>
            </div>
        </div>
    </div>


    <script>
        function myFunction() {
            alert("Rezervirano");
              }
    </script>

    <!-- Footer -->
    <?php include './includes/footer.php'; ?>

</body>
</html>
