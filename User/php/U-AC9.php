<?php
session_cache_limiter("none");
session_start();
include "MG.php";

$user_id = $_SESSION['user_id'];
$db = MG_01($user_id,"","","","","","","","","");
$user = $db->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="ja">

  <head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="U-AC9.css" type="text/css">
    <link rel="stylesheet" href="U-menu.css" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <title>U-AC9</title>
  </head>

  <body>
    <main id="main">
    <i class="fas fa-less-than less fa-3x" onclick="history.back()"></i>

      <div align="left">
        <img src="coupon.png" alt="" class="pics">
      </div>

      <div align="center">
        <p><button onclick="location.href='U-AC14.php'" class="coupon">所持クーポン一覧</button></p>
        <p><button onclick="location.href='U-AC12.php'" class="coupon">取得する</button></p>
        <?php
        if($user[0]['coupon_can_get'] == 0){
          echo 'クーポン取得権限がありません';
        }
        ?>
      </div>
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
</html>