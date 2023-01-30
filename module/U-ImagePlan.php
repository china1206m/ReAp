<?php
include "MC-01.php";

$pdo = getDB();

$sql = 'SELECT * FROM plan_detail WHERE plan_detail_id = :plan_detail_id LIMIT 1';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':plan_detail_id', (int)$_GET['id'], PDO::PARAM_INT);
$stmt->execute();
$image = $stmt->fetch();

//header('Content-type: ' . $image['image_type']);
echo $image['plan_image'];
exit();
?>