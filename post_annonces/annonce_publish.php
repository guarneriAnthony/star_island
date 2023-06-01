<?php 
require_once '../config/function.php';
require_once '../inc/header.inc.php';

$vendeurs = execute("SELECT * FROM vendeurs") -> fetchAll(PDO::FETCH_ASSOC);

if (isset($_GET['i'])){
    if (isset($_GET['a']) && $_GET['a']=='role'){
        $vendeur=execute("SELECT role FROM vendeurs WHERE id=:id", array(
        ':id'=>$_GET['i']))->fetch(PDO::FETCH_ASSOC);

        if ($vendeur['role']=='ROLE_USER'){
            execute("UPDATE vendeurs SET role=:role WHERE id=:id",array(
                ':role'=>'ROLE_ADMIN',
                ':id'=>$_GET['i']
            ));
            header('location:annonce_publish.php');
            exit;
        }else{
            execute("UPDATE vendeurs SET role=:role WHERE id=:id",array(
                ':role'=>'ROLE_USER',
                ':id'=>$_GET['i']
            ));
        header('location:annonce_publish.php');
        exit;
        }
    }

    if (isset($_GET['a']) && $_GET['a']=='del'){
        execute("DELETE FROM vendeurs WHERE id=:id", array(
            ':id'=>$_GET['i']
        ));
        header('location:annonce_publish.php');
        exit;
    }
}

?>


<table class="table table-dark table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Nom vendeur</th>
                <th>Télephone</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
        <?php foreach ($vendeurs as $vendeur) : ?>
         <tr>
            <td><?= $vendeur['id'] ?></td>
            <td><?= $vendeur['vendeur'] ?></td>
            <td><?= $vendeur['telephone'] ?></td>
            <td>
                <a href="" class="btn btn-success">Voir</a>
                <a href="?a=role&i=<?=  $vendeur['id']; ?>" class="btn btn-info">  
                <?php     
                if ($vendeur['role']=='ROLE_USER'): echo'PASSER ADMIN'; else:  echo 'PASSER<br> UTILISATEUR'  ;        
                endif;   
                ?></a>
                <a href="?a=del&i=<?=  $vendeur['id']; ?>" class="btn btn-danger">Supprimer</a>
            </td>
         </tr>
         <?php endforeach; ?>    
        
    
        </tbody>
</table>


<?php 
require_once '../inc/footer.inc.php'
?>