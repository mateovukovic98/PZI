<?php

    include 'databaseConn/session.php';


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {


        $email = $_POST['email'];
        $pass = $_POST['password'];

        include 'databaseConn/database.php';


        initializeConnection();
        $redirect_ = loginCheck($email, $pass);
        closeConnection();


        if($redirect_){
          if($_SESSION['email'] == 'admin@gmail.com'){
              header('Location: admin.php');
          }else{
              header('Location: index.php');
          }
        }
    } else{


        if(checkSession()){
            header('Location: index.php');
        }
    }

?>
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

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

    <title>Animestreams |
        <?php echo 'Prijava'; /*Custom title*/ ?>
    </title>

    <style>
        #login_form{
            position: relative;
            left: 25%;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <?php include './includes/navbar.php'; ?>

    <!-- Content -->
    <main>
        <div class="row">
            <form class="col s6" id="login_form" method="POST">
                <div class="row">
                    <div class="input-field col s12">
                        <input id="email" name="email" type="email" class="validate" required>
                        <label for="email">E-mail</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="password" name="password"  type="password" class="validate" required>
                        <label for="password">Lozinka</label>
                    </div>
                </div>
                <div class="row">
                    <button class="btn waves-effect waves-light blue darken-1" type="submit" name="submit">Prijava
                        <i class="material-icons right">send</i>
                    </button>
                </div>
            </form>
        </div>
    </main>

    <!-- Footer -->
    <?php include './includes/footer.php'; ?>

    <?php
        if(isset($_SESSION['success_msg'])){
            echo '<script language="javascript">';
            echo 'M.toast({html: "Uspjesno registrirani. Prijavite se !"})';
            echo '</script>';
            unset($_SESSION['success_msg']);
        }
    ?>


</body>
</html>
