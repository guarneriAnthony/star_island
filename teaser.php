<?php require_once './config/function.php';
?>



<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style_sidebar.css">
    <link href="./css/style_teaser.css" rel="stylesheet">
    <link href="./css/style_sideBar.css" rel="stylesheet">
    <title> Page teaser</title>
</head>

<body class="class-body">

    <main class="class-main">
        <div class="container-logo">
            <img class="class-logo" src="./assets/starisland.png" alt="logo-starIsland">
        </div>
        <div class="container-punshLine">
            <p> Bienvenue sur notre serveur dédié à GTA 5 ! Rejoignez notre communauté passionnée et profitez d'une expérience de jeu gratuite et captivante. <br><br>
            Plongez dans un monde ouvert où vous pourrez simuler la vie urbaine, participer à des braquages palpitants et interagir avec une communauté active. <br><br>
            Rejoignez-nous dès maintenant pour des moments distrayants et intenses.</p>
        </div>
        <div class="container-timerSidebar">
            <p id="countdown">.</p>
        </div>

    </main>
    <?php require_once './inc/sideBar.php'; ?>


    <script src="./script/script.js"></script>
</body>

</html>