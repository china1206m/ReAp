<?php

include "MG.php";

$id = 1;

$db = MG_01($id,"","","","","","","","");

$user = $db->fetchAll(PDO::FETCH_ASSOC);

?>



<!DOCTYPE html>
<html>
<head>
  <title>画面ID E-AC3</title>
  <meta charset=”UTF-8″>
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
      <div class="left"><p class="image-circle"></p></div>
    </div>
    
    <center>
      <br>
      <div class="box">
        <?php print($user[0]['profile_message']); ?>
      </div>
      <br><a class="link" href="U-AC4.php">プロフィール編集</a>
    </center>
    <a class="link" href="U-AC5.php"><p class="acount-menu">アカウント情報変更</p></a>
    <a class="link" href="U-AC7.php"><p class="acount-menu">アカウントログアウト</p></a>
    <a class="link" href="U-AC8.php"><p class="acount-menu">アカウント消去</p></a>
</main>

<aside id="sub">
  <ul class="menu">
      <li class="menu-list"><a class="menu-button" href="U-HK1.php"><img class="menu_img" src="U-menu-home.png" >　ホーム</a></li><br>
      <li class="menu-list"><a class="menu-button" href="U-PL1.php"><img class="menu_img" src="U-menu-place.png">　名所</a></li><br>
      <li class="menu-list"><a class="menu-button" href="U-EV1.php"><img class="menu_img" src="U-menu-event.png">　イベント</a></li><br>
      <li class="menu-list"><a class="menu-button" href="U-FV1.php"><img class="menu_img" src="U-menu-favorite.png">　お気に入り</a></li><br>
      <li class="menu-list"><a class="menu-button" href="U-AC3.php"><img class="menu_img" src="U-menu-acount.png">　アカウント</a></li><br>
    </ul>
</aside>
</body>