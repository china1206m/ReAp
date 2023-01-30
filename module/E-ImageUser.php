<?php
include "MC-01.php";

$pdo = getDB();

$sql = 'SELECT * FROM eventuser WHERE eventuser_id = :eventuser_id LIMIT 1';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':eventuser_id', (int)$_GET['id'], PDO::PARAM_INT);
$stmt->execute();
$image = $stmt->fetch();

//header('Content-type: ' . $image['image_type']);
echo $image['profile_image'];
exit();
?>