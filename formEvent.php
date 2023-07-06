<style>
    main {
        margin-top: 20vh;
    }
</style>
<?php
require_once './config/function.php';
require_once './inc/formHeader.inc.php';

/*Debut de mon controle de formulaie de 'event$event'*/
if (!empty($_POST)) {
    $error = false;

    if (empty($_POST['start_date'])) {
        $start_date = 'La date de debut est obligatoire';
        $error = true;
    }
    if (empty($_POST['end_date'])) {
        $end_date = 'La date de fin est obligatoire';
        $error = true;
    }

    if (!$error) {

        if (empty($_POST['id'])) {
            $lastEvent = execute("INSERT INTO event (start_date, end_date) VALUES (:start_date, :end_date)", array(
                ':start_date' => $_POST['start_date'],
                ':end_date' => $_POST['end_date']
            ), ' ');
            $lastContent = execute("INSERT INTO content (title, description) VALUES (:title, :description)", array(
                ':title' => $_POST['title'],
                ':description' => $_POST['description']
            ), ' ');
            execute("INSERT INTO event_content (event_id, content_id) VALUES (:event_id, :content_id)", array(
                ':event_id' => $lastEvent,
                ':content_id' => $lastContent
            ));
            header('location: ./formevent.php');
            exit();

        } else {
            execute("UPDATE event SET start_date = :start_date, end_date = :end_date WHERE id = :id", array(
                ":start_date" => $_POST['start_date'],
                ":end_date" => $_POST['end_date'],
                ":id" => $_POST['id']
            ));
            header('location: ./formevent.php');
            exit();
        }
    }
}

$sql = "SELECT c.*, e.* 
FROM event e 
INNER JOIN event_content ec ON e.id = ec.event_id 
INNER JOIN content c ON c.id = ec.content_id  ";
$contentEvents = execute($sql)->fetchALL(PDO::FETCH_ASSOC);
// $contents = execute("SELECT * FROM content")->fetchALL(PDO::FETCH_ASSOC);
// $envents = execute("SELECT * FROM event")->fetchAll(PDO::FETCH_ASSOC);


if (!empty($_GET) && isset($_GET['id']) && isset($_GET['a']) && $_GET['a'] == 'edit') {
    $event_id = execute("SELECT * FROM event WHERE id = :id", array(
        ':id' => $_GET['id']
    ))->fetch(PDO::FETCH_ASSOC);
}
if (!empty($_GET) && isset($_GET['id']) && isset($_GET['a']) && $_GET['a'] == 'del') {
    $event_id = execute("DELETE FROM event WHERE id = :id", array(
        ':id' => $_GET['id']
    ));
    header('location: ./formevent.php');
    exit();
}
?>



<!--Post de event-->

<form class="mt-5 w-75 mx-auto" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="title" class="form-label">Nom de l'event' :</label>
        <input name="title" type="text" class="form-control" id="title" value="<?= $content_id['title'] ?? ""; ?>">
        <small class="text-danger"><?= $title ?? ""; ?></small>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description de l'event' :</label>
        <input name="description" type="text" class="form-control" id="description" value="<?= $content_id['description'] ?? ""; ?>">
        <small class="text-danger"><?= $description ?? ""; ?></small>
    </div>
    <div class="mb-3">
        <label for="start_date" class="form-label">Date de debut :</label>
        <input type="datetime-local" id="start_date" name="start_date" value="<?= $event_id['start_date'] ?? ""; ?>">
        <small class="text-danger"><?= $start_date ?? ""; ?></small>
    </div>
    <div class="mb-3">
        <label for="end_date" class="form-label">Date de fin :</label>
        <input type="datetime-local" id="end_date" name="end_date" value="<?= $event_id['end_date'] ?? ""; ?>">
        <small class="text-danger"><?= $end_date ?? ""; ?></small>
    </div>

    <input type="hidden" name="id" value="<?= $event_id['id'] ?? ""; ?>">
    <button type="submit" class="btn btn-primary">Submit date event</button>
</form>




<table class="table table-dark table-striped w-75 mx-auto">
    <thead>
        <tr>
            <th>Nom de L'event</th>
            <th>Description</th>
            <th>Date de debut</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($contentEvents as $event) : ?>
            <tr>
                <td><?= $event['title']; ?></td>
                <td><?= $event['description']; ?></td>
                <td><?= $event['start_date']; ?></td>
                <td>
                    <a href="?id=<?= $event['id']; ?>&a=edit" class="btn btn-outline-info">Modifier</a>
                    <a href="?id=<?= $event['id']; ?>&a=del" onclick="return confirm('Etes-vous sur ?')" class="btn btn-outline-danger">Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>