<?php
session_start(); // セッション開始
include "MG.php";

$id = $_SESSION['user_id'];

$db = MG_01($id,"","","","","","","","","");

$user = $db->fetchAll(PDO::FETCH_ASSOC);
/*include "MGvG.php";
$post = 3;
$db = MG("user",$post);
$user = $db->fetchAll(PDO::FETCH_ASSOC);*/
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
        <?php if(!empty($user[0]['profile_image'])) { ?>
          <img src="U-imageUser.php?id=<?= $user[0]['user_id']; ?>" class="circle1">
        <?php } else { ?>
          <!-- デフォルトアイコン -->
          <img src="castle.bmp" align="left" alt="写真" class="circle">
        <?php } ?>
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
    <a class="link" href="U-AC9.php"><p class="acount-menu">クーポン</p></a>
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