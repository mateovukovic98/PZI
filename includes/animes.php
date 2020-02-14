<?php

    function displayAnimes($animes){
        for ($index=0; $index < count($animes); $index++) {
            if($index % 3 == 0){
                echo '<div class="row">';
            }

            $anime = $animes[$index];
            displayAnime($anime);

            if($index % 3 == 2){
                echo '</div>';
            }
        }
    }

    function displayAnime($anime){?>

        <div class="col s4">
            <div class="card">
                <div class="card-image waves-effect waves-block waves-light">
                    <img class="activator" src="<?php echo 'assets/'.$anime["poster"]; ?>">
                </div>
                <div class="card-content">
                    <span class="card-title activator grey-text text-darken-4"><?php echo $anime["naslov"]; ?></span>
                    <p><a href="<?php echo 'anime.php?id='.$anime["idAnime"]; ?>" class = "btn black">Gledaj</a></p>
                </div>
            </div>
        </div>
<?php
    }

?>
