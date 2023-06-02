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
    <title> Page teaser</title>
</head>

<body>

    <main class="class-main">
        <div>
            <img class="class-logo" src="./assets/starisland.png">
        </div>
        <div class="container-punshLine">
            <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Et autem amet adipisci voluptatem. Tenetur velit dolor recusandae earum dolorem sint sunt laudantium cum omnis. Fuga deserunt inventore ex a temporibus.</p>
        </div>
        <div class="container-timerSidebar">
            <p id="countdown">.</p>
        </div>

    </main>
    <?php require_once './inc/sideBar.php'; ?>


    <script src="./script/script.js"></script>
</body>

</html>