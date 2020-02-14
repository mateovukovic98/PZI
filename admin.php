<?php

    include 'databaseConn/session.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        include 'databaseConn/database.php';

        initializeConnection();

        if(isset($_POST['form1'])){

            $naslov = $_POST['naslov'];
            $autor= $_POST['autor'];
            $likovi= $_POST['likovi'];
            $opis = $_POST['opis'];
            $trajanje = $_POST['trajanje'];
            $blagajna = $_POST['blagajna'];
            $poster = $_FILES['poster'];

            $notifikacija = createAnime($naslov, $autor,
                       $likovi, $opis,
                       $trajanje, $blagajna, $poster);

            if($notifikacija){
                $_SESSION['success_msg'] = 'kreirano';
            }

        }else{
            $idAnimea = $_POST['idAnimea'];
            $nazivStupca = $_POST['nazivStupca'];
            $novaVrijednost = $_POST['novaVrijednost'];

            $notifikacija = updateAnime($idAnimea, $nazivStupca, $novaVrijednost);

            if($notifikacija){
                $_SESSION['success_msg'] = 'izmijenjeno';
            }
        }

        closeConnection();

    }else{

        if(!checkAdminSession()){
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

    <title>Animestreams |
        <?php echo 'Admin Panel'; /*Custom title*/ ?>
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

            <!-- Form for creating new book -->
            <form class="col s6" id="create_book_form" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="input-field col s12">
                        <input id="naslov" name="naslov" type="text" class="validate" required>
                        <label for="naslov">Naslov filma</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="autor" name="autor"  type="text" class="validate" required>
                        <label for="autor">Autor</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="likovi" name="likovi"  type="text" class="validate" required>
                        <label for="likovi">Likovi</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="opis" name="blagajna"  type="text" class="validate" required>
                        <label for="opis">Blagajna</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="trajanje" name="trajanje"  type="text" class="validate" required>
                        <label for="trajanje">Trajanje</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <textarea id="blagajna" name="opis" type="text" class="validate" required></textarea>
                        <label for="blagajna">Opis</label>
                    </div>
                </div>
                <div class="file-field input-field">
                    <div class="btn blue darken-1">
                        <span>File</span>
                        <input type="file" name="poster">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                    </div>
                </div>
                <div class="row">
                    <button class="btn waves-effect waves-light blue darken-1" type="submit" name="form1">Kreiraj anime
                        <i class="material-icons right">send</i>
                    </button>
                </div>
            </form>

            <form class="col s6" id="update_book_form" method="POST">
                <div class="row">
                    <div class="input-field col s12">
                        <input id="idAnimea" name="idAnimea" type="number" class="validate" required>
                        <label for="idAnimea">Unesite ID animea</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <select name="nazivStupca">
                            <option value="naslov">Naslov</option>
                            <option value="autor">Autor</option>
                            <option value="likovi">Likovi</option>
                            <option value="opis">Opis</option>
                            <option value="trajanje">Trajanje</option>
                            <option value="blagajna">Blagajna</option>
                        </select>
                        
                        <label name="nazivStupca">Što želite promijeniti ?</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="novaVrijednost" name="novaVrijednost" type="text" class="validate" required>
                        <label for="novaVrijednost">Nova vrijednost</label>
                    </div>
                </div>
                <div class="row">
                    <button class="btn waves-effect waves-light blue darken-1" type="submit" name="form2">Uredi
                        <i class="material-icons right">send</i>
                    </button>
                </div>
            </form>

        </div>
    </main>

    <!-- Footer -->
    <?php include './includes/footer.php'; ?>

    <script>
        $(document).ready(function(){
            $('select').formSelect();
        });
    </script>

    <?php
        if(isset($_SESSION['success_msg'])){
            if($_SESSION['success_msg'] === 'kreirano'){
                echo '<script language="javascript">';
                echo 'M.toast({html: "Uspješno kreiran anime !"})';
                echo '</script>';
            }else{
                echo '<script language="javascript">';
                echo 'M.toast({html: "Uspjesno izmijenjeno !"})';
                echo '</script>';
            }

            unset($_SESSION['success_msg']);
        }
    ?>

</body>
</html>
