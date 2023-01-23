<?php
// セッション開始
session_start();
include "MG.php";

$eventuser_id = $_SESSION['eventuser_id'];
$db = MG_02($eventuser_id,"","","","","","","","","");
$eventuser = $db->fetchAll(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
<html>
<head>
  <title>画面ID E-AC3</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="E-AC3.css" type="text/css">
  <link rel="stylesheet" href="E-menu.css" type="text/css">
</head>
<body>
  <main id="main">
  <h3>アカウント</h3>

    <div class="parent">
      <div class="center">
        <?php print($eventuser[0]['eventuser_name']); ?>
      </div>
      <div class="left"><img src="E-menu-acount.png" class="image-circle"></div>
    </div>
    
    <center>
      <br>
      <div class="box">
        <?php print($eventuser[0]['profile_message']); ?>
      </div>
      <br><a href="E-AC7.php">プロフィール編集</a>
    </center>
    <a href="E-AC8.php"><p class="acount-menu">アカウント情報変更</p></a>
    <a href="E-AC5.php"><p class="acount-menu">アカウントログアウト</p></a>
    <a href="E-AC6.php"><p class="acount-menu">アカウント消去</p></a>
</main>

<aside id="sub">
  
  <ul>
    <li class="menu-list"><a class="menu-button" href="E-EL1.html"><img src="E-menu-home.png" width="45" height="43">　ホーム</a></li><br>
        <li class="menu-list"><a class="menu-button" href="E-CB1.php"><img src="E-menu-post.png" width="45" height="43">　イベント投稿</a></li><br>
        <li class="menu-list"><a class="menu-button" href="E-SE1.php"><img src="E-menu-see.png" width="45" height="43">　投稿イベント<br>　　　一覧・消去</a></li><br>
        <li class="menu-list"><a class="menu-button" href="E-CP1.html"><img src="E-menu-coupon.png" width="45" height="43">　クーポン</a></li><br>
        <li class="menu-list"><a class="menu-button" href="E-AC3.php"><img src="E-menu-acount.png" width="45" height="43">　アカウント</a></li><br>
  </ul>
</aside>
</body>