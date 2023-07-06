<?php
require_once 'Db.php';

function debug($data)
{
    echo '<pre>';
    print_r($data);
    echo '</pre>';
    die();
}

function execute(string $requete, array $data=[],$lastId=null)
{
    // boucle pour echapper les caractères speciaux (pour neutraliser les balise <style> ou <script>) en entité html et de même supprimer les espaces éventuels en début de fin de chaine de caractère
    foreach ($data as $marqueur => $valeur){
        // ici on réaffecte à notre tableau $data
        // les nouvelles valeurs échappées et sans espaces pour chaque tour de boucle
        $data[$marqueur]=trim(htmlspecialchars($valeur));

    }
    $pdo=Db::getDB(); // connexion à la BDD provenant de Db.php
    $resultat= $pdo->prepare($requete);// on prépare la requête envoyée avec marqueur (:marqueur)

    $success=$resultat->execute($data);// on execute en passant notre tableau associatif de nos marqueurs avec leur valeurs

    if($success){ // si tout s'est bien passé ($success renvoi true ou false)

        if ($lastId){ // si le paramètre optionnel $lastId est renseigné

            return $pdo->lastInsertId();// on renvoie le dernier id inséré

        }else{ // sinon on renvoi le jeu de résultat
            return $resultat;
        }

    }else{ // on s'assure d'un retour même si le traitement a échoué
        return  false;
    }




}
function password_strength_check($password)
{
    $regex = '/^(?=.*[A-Z])(?=.*[^a-zA-Z\d]).{6,}$/';

    if (preg_match($regex, $password)) {
        return true;
    } else {
        return false;
    }
}

function connect(){
    if(isset($_SESSION['user'])) {
        return true;
    } else {
        return false;
    }
}

function admin(){
    if (connect() && $_SESSION['user']['role'] == 'ROLE_ADMIN') {
        return true;
    } else {
        return false;
    }
}
