<?php require_once 'config/function.php';
require_once 'inc/header.inc.php';
$sql = "SELECT c.*, e.* 
FROM event e 
INNER JOIN event_content ec ON e.id = ec.event_id 
INNER JOIN content c ON c.id = ec.content_id 
WHERE e.id = $_GET[evi]"; 
$event = execute($sql)->fetch(PDO::FETCH_ASSOC);

echo '<pre>';
var_dump($event);
echo'</pre>';
?>

<div class="imgLeft">
    <img src="./assets/pirate-android-wide.jpg" alt="image Event">
</div>
<div class="textRight">
    <h3>Time Remaning</h3>
    <p id="countdown">.</p>
    <h2> Titre de levent</h2>
    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. In perferendis reprehenderit quaerat facere atque asperiores id tempora commodi explicabo officia iste aperiam dicta dolorem, voluptates consectetur rem provident sit ut.
        Lorem ipsum dolor sit amet consectetur, adipisicing elit. In perferendis reprehenderit quaerat facere atque asperiores id tempora commodi explicabo officia iste aperiam dicta dolorem, voluptates consectetur rem provident sit ut.
    </p>
</div>



<link rel="stylesheet" href="./css/style_event.css">
<!--SCRIPT FOR THE TIMER-->
<script src="./script/scriptEvent.js"></script>
<?php require_once 'inc/footer.inc.php'; ?>
<?php require_once 'inc/sideBar.php'; ?>