<style>
    main {
        margin-top: 20vh;
    }
</style>
<?php 
require_once '../config/function.php';
require_once '../inc/formHeader.inc.php';
?>

<h2 class="text-center">COMMENTAIRES</h2>

<?php  


$comments = execute("SELECT * FROM comment")->fetchAll(PDO::FETCH_ASSOC);

 /*Debut de mon controle comment'*/ 
    $validate = 1;
    if (!empty($_GET) && isset($_GET['id']) && isset($_GET['a']) && $_GET['a'] == 'val') {
        $comment_id = execute("SELECT * FROM comment WHERE id = :id", array (
            ':id' => $_GET['id']
        ))->fetch(PDO::FETCH_ASSOC);
    }

    if (!empty($_GET) && isset($_GET['id']) && isset($_GET['a']) && $_GET['a'] == 'val') {
        execute("UPDATE comment SET validate = :validate WHERE id = :id", array (
            ':validate' => $validate,
            ':id' => $_GET['id']
        ));
        header('location: ./formComment.php');
        exit();
    }
    
    if (!empty($_GET) && isset($_GET['id']) && isset($_GET['a']) && $_GET['a'] == 'del') {
        $content_id = execute("DELETE FROM comment WHERE id = :id", array (
            ':id' => $_GET['id']
        ));
        header('location: ./formComment.php');
        exit();
    }
?>


<table class="table table-dark table-striped w-75 mx-auto">
    <thead>
        <tr>
            <th>Rating</th>
            <th>Comment</th>
            <th>publish_date</th>
            <th >Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($comments as $comment) : ?>
            <?php if ($comment['validate'] == 0) : ?>
                <tr>
                    <td><?= $comment['rating']; ?></td>
                    <td><?= $comment['comment']; ?></td>
                    <td><?= $comment['publish_date']; ?></td>
                    <td>
                        <a href="?id=<?= $comment['id']; ?>&a=val" onclick="return confirm('Voulez vous valider ?')" class="btn btn-outline-info">Activer</a>
                        <a href="?id=<?= $comment['id']; ?>&a=del" onclick="return confirm('Voulez vous supprimer ?')" class="btn btn-outline-danger">Supprimer</a>
                    </td>
                </tr>
            <?php endif; ?>
        <?php endforeach; ?>
    </tbody>
</table>


