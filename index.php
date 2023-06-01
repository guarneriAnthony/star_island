<?php      require_once 'config/function.php';
            require_once 'inc/header.inc.php';       

            if(isset($_GET ['a']) && $_GET['a'] == 'dis'){
                unset($_SESSION['user']);
                $_SESSION['messages']['info'][]= 'A bientot';
                header('location:./');
                exit();
            }
            
?>

<?php 
echo '<pre>';
var_dump($_SESSION);
echo'</pre>';
?>



<?php     require_once 'inc/footer.inc.php';          ?>
