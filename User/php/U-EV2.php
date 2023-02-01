<?php
session_start(); // セッション開始

if(!isset($_SESSION['user_id'])){
  $_SESSION['login_message'] = 'ログインしてください';
  header('Location:U-AC6.php');
  exit;
}


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
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>

<body>
  <main id="main">
  <i class="fas fa-less-than less fa-3x" onclick="history.back()"></i>

    <div class="yoko">
      <div class="event_information">
        <p align="right"><?php print($event[0]['post_date']); ?></p>
          <div class="yoko">
            <a href="U-EV3.php" style="text-decoration:none;">
              <?php if(!empty($eventuser[0]['profile_image'])) { ?>
                <img src = "<?php echo '../EventUser/'.$eventuser[0]['profile_image']; ?>" class="circle1" align="left" alt="アイコン">
              <?php } else {?>
                <!-- デフォルトアイコン -->
                <img src="castle.bmp" alt="" class="circle" align="left">
              <?php } ?>
            </a>
            <div class="title">
              <?php print($event[0]['event_title']); ?>
            </div>
          </div>
          <p class="event_info">開催期間：<?php print($event[0]['event_day_first']); ?>　～　<?php print($event[0]['event_day_end']); ?></p>
          <div class="event_info">
            <p><?php print($event[0]['event_prefectures']); ?></p>
            <p><?php print($event[0]['event_place']); ?></p>
            <p>費用：<?php print($event[0]['event_cost']); ?>円</p>
            <center id="image_area"></center>
            <p><?php print($event[0]['event_content']); ?></p>
          </div>
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
  <?php if(!empty($event[0]['event_image'])) { ?>
    const images = ['neko.jpg', 'naruto.jpg'];
    const content_area = document.getElementById("image_area");
    let img_add = document.createElement('img');
    img_add.src = '<?php echo "../EventUser/".$event[0]['event_image']; ?>';
    img_add.alt = 'さいくん'; // 代替テキスト
    img_add.width = 400; // 横サイズ（px）
    content_area.appendChild(img_add);
  <?php } ?>
  </script>

</body>
</html>