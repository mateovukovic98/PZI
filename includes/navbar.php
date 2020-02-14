<?php

    include_once 'databaseConn/session.php';

    if(checkSession()){ ?>
        <ul id="dropdown1" class="dropdown-content">
            <li><a class="blue-text text-darken-1" href="<?php echo 'logout.php'; ?>">Odjava</a></li>
        </ul>
    <?php }else{ ?>
        <ul id="dropdown1" class="dropdown-content">
            <li><a class="blue-text text-darken-1" href="<?php echo 'login.php'; ?>">Prijava</a></li>
            <li><a class="blue-text text-darken-1" href="<?php echo 'register.php'; ?>">Registracija</a></li>
        </ul>
<?php } ?>


<nav class="nav'wrapper  grey darken-4">
    <div class="container">
        <a href="<?php echo 'index.php'; ?>" class = "brand-logo">Animestreams</a>
        <ul class="right">
        <?php if(checkSession()){ ?>
            <li><?php echo $_SESSION['email'] ?></li>
        <?php } ?>
        <!-- Dropdown Trigger -->
        <li><a class="dropdown-trigger" href="#!" data-target="dropdown1"><i class="material-icons right">arrow_drop_down</i></a></li>
        </ul>
    </div>
</nav>
