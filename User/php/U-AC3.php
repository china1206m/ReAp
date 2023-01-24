<?php
/*
include "MG.php";

$id = 1;

$db = MG_01($id,"","","","","","","","");

$user = $db->fetchAll(PDO::FETCH_ASSOC);
*/
session_start(); // セッション開始
include "MGvG.php";
$post = [$_SESSION['user_id']];
$db = MG("user",$post);
$user = $db->fetchAll(PDO::FETCH_ASSOC);
?>



<!DOCTYPE html>
<html>
<head>
  <title>画面ID U-AC3</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="U-AC3.css" type="text/css">
  <link rel="stylesheet" href="U-menu.css" type="text/css">
</head>
<body>
  <main id="main">
  <h3>アカウント</h3>

    <div class="parent">
      <div class="center">
        <?php print($user[0]['user_name']); ?>
      </div>
      <div class="left">
        <a href="#lightbox" data-toggle="modal" data-slide-to="<?= $i; ?>">
          <img src="image.php?id=<?= $user[0]['user_id']; ?>" class="image-circle">
        </a>  
      </div>
    </div>
    
    <center>
      <br>
      <div class="box">
        <?php print($user[0]['profile_message']); ?>
      </div>
      <br><a class="link" href="U-AC4.php">プロフィール編集</a>
    </center>
    <a class="link" href="U-AC18.php"><p class="acount-menu">過去の投稿閲覧</p></a>
    <a class="link" href="U-AC9.html"><p class="acount-menu">クーポン</p></a>
    <a class="link" href="U-AC5.php"><p class="acount-menu">アカウント情報変更</p></a>
    <a class="link" href="U-AC7.php"><p class="acount-menu">アカウントログアウト</p></a>
    <a class="link" href="U-AC8.php"><p class="acount-menu">アカウント消去</p></a>
</main>

<aside id="sub">
  <ul class="menu">
      <li class="menu-list"><a class="menu-button" href="U-HK6.php"><img class="menu_img" src="U-menu-home.png" >　ホーム</a></li><br>
      <li class="menu-list"><a class="menu-button" href="U-PL1.html"><img class="menu_img" src="U-menu-place.png">　名所</a></li><br>
      <li class="menu-list"><a class="menu-button" href="U-EV1.php"><img class="menu_img" src="U-menu-event.png">　イベント</a></li><br>
      <li class="menu-list"><a class="menu-button" href="U-FV2.php"><img class="menu_img" src="U-menu-favorite.png">　お気に入り</a></li><br>
      <li class="menu-list"><a class="menu-button" href="U-AC3.php"><img class="menu_img" src="U-menu-acount.png">　アカウント</a></li><br>
    </ul>
</aside>
</body>