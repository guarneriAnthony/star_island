<?php
require_once 'Db.php';

function execute(string $requete, array $data=[],$lastId=null)
{
    foreach ($data as $marqueur => $valeur){
        $data[$marqueur]=trim(htmlspecialchars($valeur));
    }
    $pdo=Db::getDB(); 
    $resultat= $pdo->prepare($requete);
    $success=$resultat->execute($data);

    if($success){ 
        if ($lastId){ 
            return $pdo->lastInsertId();
        }else{ 
            return $resultat;
        }
    }else{ 
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


