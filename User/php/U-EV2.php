<?php
session_start(); // セッション開始

include "MG.php";

$event_id = $_SESSION['event_id'];
$db = MG_06($event_id,"","","","","","","","","","","");
$event = $db->fetchAll(PDO::FETCH_ASSOC);

$eventuser_id = $event[0]['eventuser_id'];
$db = MG_02($eventuser_id,"","","","","","","","","");
$eventuser = $db->fetchAll(PDO::FETCH_ASSOC);

$_SESSION['event_eventuser_id'] = $eventuser_id;
?>


<!DOCTYPE html>
<html>

<head>
  <title>U-EV2</title>
  <meta charset=”UTF-8″>
  <link rel="stylesheet" href="U-EV2.css" type="text/css">
  <link rel="stylesheet" href="U-EV2.css" type="text/css">
  <link rel="stylesheet" href="U-menu.css" type="text/css">
</head>

<body>
  <main id="main">
    <button type="button" class="button_back" onclick="history.back()"><h3>＜</h3></button>

    <div class="yoko">
      <div class="event_information">
        <p align="right"><?php print($event[0]['post_date']); ?></p>
          <div class="yoko">
            <a href="U-EV3.php" style="text-decoration:none;">
              <img src = "E-ImageUser.php?id=<?= $eventuser[0]['eventuser_id']; ?>" class="circle" align="left" alt="アイコン" width="100%" height="100%">
            </a>
            <div class="title">
              <?php print($event[0]['event_title']); ?>
            </div>
          </div>
          <p class="event_info"><?php print($event[0]['event_day_first']); ?>　～　<?php print($event[0]['event_day_end']); ?></p>
          <div class="event_info">
            <p><?php print($event[0]['event_prefectures']); ?></p>
            <p><?php print($event[0]['event_place']); ?></p>
          </div>
          <center id="image_area"></center>
          <p><?php print($event[0]['event_content']); ?></p>
          <p><?php print($event[0]['event_cost']); ?>円</p>
        </div>
    </div>
    <div class="box"></div>
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

  <script>
  //画像の文字列はphpで用意する
  const images = ['neko.jpg', 'naruto.jpg'];
  const content_area = document.getElementById("image_area");
  let img_add = document.createElement('img');
  img_add.src = 'E-ImageEvent.php?id=<?= $event[0]['event_id']; ?>';
  img_add.alt = 'さいくん'; // 代替テキスト
  img_add.width = 400; // 横サイズ（px）
  content_area.appendChild(img_add);
  </script>

</body>
</html>