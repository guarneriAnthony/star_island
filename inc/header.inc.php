
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/5.2.3/lux/bootstrap.min.css" integrity="sha512-+TCHrZDlJaieLxYGAxpR5QgMae/jFXNkrc6sxxYsIVuo/28nknKtf9Qv+J2PqqPXj0vtZo9AKW/SMWXe8i/o6w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./css/style_header.css">
    <link rel="stylesheet" href="./css/style_index.css">
    
</head>
<body>
<header>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-5">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><img src="./assets/starisland.png"></a>      
        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="<?=  BASE_PATH; ?>"><img src="./assets/home.png"></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="<?=  BASE_PATH; ?>">Galerie</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=  BASE_PATH; ?>">Devenir VIP</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=  BASE_PATH; ?>">Serveur</a>
                </li>
            </ul>
        </div>
        <div class="class-div">
            <ul class="class-ul">
                <li class="nav-item item-row">   
                    <img src="./assets/vector.png">    
                    <p class="class-text">Tutoriel</p>
                </li>
                <li class="nav-item item-row">   
                    <img src="./assets/vector1.png">    
                    <p class="class-text">Event</p>
                </li>
            </ul>
        </div>
    </div>
</nav>
</header>
<main >

<?php 

if (isset($_SESSION['messages']) && !empty($_SESSION['messages'])) :
    foreach ($_SESSION['messages'] as $type => $messages) :
        foreach ($messages as $key => $message) :  ?>
            <div class="alert alert-<?= $type; ?> text-center w-50 mx-auto">
            <p><?= $message; ?></p>
            </div>
        <?php unset($_SESSION['messages'][$type][$key]); 
        endforeach;
    endforeach;
endif;
?>
