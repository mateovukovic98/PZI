<?php

    function displayMovies($movies){
        for ($index=0; $index < count($movies); $index++) {
            if($index % 3 == 0){
                echo '<div class="row">';
            }

            $movie = $movies[$index];
            displayMovie($movie);

            if($index % 3 == 2){
                echo '</div>';
            }
        }
    }

    function displayMovie($movie){?>

        <div class="col s4">
            <div class="card">
                <div class="card-image waves-effect waves-block waves-light">
                    <img class="activator" src="<?php echo 'assets/'.$movie["poster"]; ?>">
                </div>
                <div class="card-content">
                    <span class="card-title activator grey-text text-darken-4"><?php echo $movie["naslov"]; ?></span>
                    <p><a href="<?php echo 'movie.php?id='.$movie["idFilm"]; ?>" class = "btn indigo">Klikni za rezervaciju</a></p>
                </div>
            </div>
        </div>
<?php
    }

?>
