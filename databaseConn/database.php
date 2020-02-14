<?php

    $conn = null;

    function initializeConnection(){
        global $conn;

        $servername = "localhost";
        $username = "fpmoz022019";
        $password = "csdigital2019";
        $dbname = "fpmoz022019";

        $conn = new mysqli($servername, $username, $password, $dbname);
        $conn->set_charset('utf8mb4');

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
    }

    function loginCheck($email, $pass){
        global $conn;

        $sql =  "SELECT * FROM korisnik WHERE";
        $sql .= " email='".$email."'";
        $sql .= " AND lozinka='".$pass."'";

        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $_SESSION['email'] = $email;
            return true;
        }
        return false;
    }

  function registerCheck($email, $pass, $first_name, $last_name){
        global $conn;

        $sql =  "SELECT * FROM korisnik WHERE";
        $sql .= " email='".$email."'";

        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            return false;
        }

        $sql  = "INSERT INTO korisnik (ime, prezime, email, lozinka) VALUES ";
        $sql .= "('".$first_name."','".$last_name."','".$email."','".$pass."')";

        if ($conn->query($sql) === TRUE) {
            return true;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

    }

    function listAnimes(){
        global $conn;

        $sql  = "SELECT idAnime, naslov, opis, poster FROM anime";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

            $animes = array();

            while($row = $result->fetch_assoc()) {
                array_push($animes, $row);
            }

            return $animes;

        }else{
            echo '<h1>Na ovoj stranici nisu dostupni Animes.</h1>';
        }
    }

    function getAnimeById($id){
        global $conn;

        $sql  = "SELECT * FROM anime WHERE idAnime='".$id."'";
        $result = $conn->query($sql);

        if($result->num_rows == 1){
            return $result->fetch_assoc();
        }else{
            return 'No anime with that ID';
        }

    }

    function createAnime($naslov, $autor, $likovi, $opis, $trajanje, $blagajna, $poster){
        global $conn;

        $target_dir = "assets/";
        $target_file = $target_dir . basename($poster["name"]);
        move_uploaded_file($poster["tmp_name"], $target_file);

        $sql  = "INSERT INTO anime (naslov, autor, likovi, opis, trajanje, blagajna, poster) VALUES ";
        $sql .= "('".$naslov."','".$autor."','".$likovi."','".$opis."','".$trajanje."','".$blagajna."','".$poster['name']."')";

        if ($conn->query($sql) === TRUE) {
            return true;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    function updateAnime($idAnimea, $nazivStupca, $novaVrijednost){
        global $conn;

        $sql  = "UPDATE anime SET ".$nazivStupca."='".$novaVrijednost."' ";
        $sql .= "WHERE idAnime='".$idAnimea."' ";

        if ($conn->query($sql) === TRUE) {
            return 'izmijenjeno';
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    function closeConnection(){
        global $conn;
        $conn->close();
        $conn = null;
    }

?>
