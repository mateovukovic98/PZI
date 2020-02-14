<?php

    include 'databaseConn/session.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $email = $_POST['email'];
        $pass = $_POST['password'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];

        include 'databaseConn/database.php';

        initializeConnection();
        $redirect_ = registerCheck($email, $pass, $first_name, $last_name);

        closeConnection();

        if($redirect_){
            $_SESSION['success_msg'] = true;
            header('Location: login.php');
        }else{

            $failure_msg = true;
        }

    }else{

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
        <?php echo 'Registracija'; /*Custom title*/ ?>
    </title>

    <style>
        #register_form{
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
      <div class="container">
        <div class="row">
            <form class="col s6" id="register_form" method="POST">
                <div class="row">
                    <div class="input-field col s6">
                        <input id="first_name" name="first_name" type="text" class="validate" required>
                        <label for="first_name">Ime</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="last_name" name="last_name" type="text" class="validate" required>
                        <label for="last_name">Prezime</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input placeholder="Please enter valid E-mail" id="email" name="email" type="email" class="validate" required>
                        <label for="email">E-mail</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="password" name="password" type="password" class="validate" minlength="8" required>
                        <label for="password">Lozinka</label>
                    </div>
                </div>
                <div class="row">
                    <button class="btn waves-effect waves-light indigo" type="submit" name="submit">Registracija
                        <i class="material-icons right">send</i>
                    </button>
                </div>
            </form>
        </div>
      </div>

    </main>

    <!-- Footer -->
    <?php include './includes/footer.php'; ?>

    <?php
        if(isset($failure_msg)){
            echo '<script language="javascript">';
            echo 'M.toast({html: "Korisnik vec postoji !"})';
            echo '</script>';
        }
    ?>


</body>
</html>
