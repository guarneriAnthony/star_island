<style>
    main {
        margin-top: 20vh;
    }
</style>
<?php require_once '../config/function.php';
require_once '../inc/header.inc.php';


if (!empty($_POST['email'])) {
        $sql = "SELECT * FROM user WHERE email =:email";
        $user = execute($sql,array(
            ':email' => $_POST['email']
        ));

        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $email = 'Format invalide';
            $error = true;
        }

        if ($user->rowCount() == 1) {
             
            $user = $user->fetch(PDO::FETCH_ASSOC);

            if (password_verify($_POST['password'], $user['password'])) {
                $_SESSION['user'] = $user;
                //$_SESSION['messages']['success'][] = "Bienvenue !";
                header('location: http://localhost/PHP/star_island/back/formMedia_type.php');
                exit();
            }
        } else {
            $password = 'Mot de passe incorrect';
        }
    
}

?>

<form class="mt-5 w-75 mx-auto" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input name="email" type="text" class="form-control" id="email" aria-describedby="emailHelp">
        <small class="text-danger"><?= $email ?? ""; ?></small>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Mot de passe</label>
        <input name="password" type="password" class="form-control" id="password">
        <small class="text-danger"><?= $password  ?? ""; ?></small>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>


