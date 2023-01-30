<?php
include "MC-01.php";

$pdo = getDB();


//$sql = 'SELECT * FROM event WHERE event_id = 7 LIMIT 1';
$sql = 'SELECT * FROM event WHERE event_id = :event_id LIMIT 1';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':event_id', (int)$_GET['id'], PDO::PARAM_INT);
$stmt->execute();
$image = $stmt->fetch();

//header('Content-type: ' . $image['image_type']);
echo $image['event_image'];
exit();
?>