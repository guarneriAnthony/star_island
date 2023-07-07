<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Page Index</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
        defer
    </script>



    <link rel="stylesheet" href="http://localhost/PHP/star_island/css/style_bootstrap.css" />
    <link rel="stylesheet" href="http://localhost/PHP/star_island/css/style_header.css">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-black mb-5" id="navbarHeader">
            <div class="container-fluid" id="container-fluid">
                <a class="navbar-brand" href="http://localhost/PHP/star_island/index.php"><img src="http://localhost/PHP/star_island/assets/starisland.png" alt="logo star islande"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" id="button">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item" id="ico-home">
                            <a class="nav-link active" href="http://localhost/PHP/star_island/index.php"><img src="http://localhost/PHP/star_island/assets/home.png" alt="logo home"></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="http://localhost/PHP/star_island/galerie.php">Galerie</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="http://localhost/PHP/star_island/vip.php">Devenir VIP</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="http://localhost/PHP/star_island/team.php">Team</a>
                        </li>
                        
                    </ul>


                    <div class="class-div containerItems">
                        <ul class="class-ul">
                            <li class="nav-item item-row firstItem">
                                <img src="http://localhost/PHP/star_island/assets/vector.png" class="imgs-nav" alt="logo tutoriel">
                                <a href="https://fivem.net/">
                                    <p class="class-text">Tutoriel</p>
                                </a>
                            </li>

                            <?php
                            $events = execute(
                                "SELECT e.id, c.title
                                FROM event e
                                INNER JOIN event_content ec ON e.id = ec.event_id
                                INNER JOIN content c ON c.id = ec.content_id
                                WHERE end_date > NOW()"
                            )->fetchAll(PDO::FETCH_ASSOC);
                            ?>


                            <?php if (!empty($events)) : ?>
                                <li class="nav-item dropdown item-row firstItem">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Events
                                    </a>

                                    <ul class="dropdown-menu">
                                        <?php foreach ($events as $event) : ?>
                                            <li><a href="http://localhost/PHP/star_island/event.php?evi=<?= $event['id']; ?>"><?= $event['title'] ?></a>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </li>
                            <?php endif; ?>

                        </ul>
                    </div>


                </div>
            </div>
        </nav>
    </header>

    <main>