<!DOCTYPE html>
<html>
<head>
  <title>U-HK5</title>
  <meta charset=”utf-8″>
  <link rel="stylesheet" href="U-HK5.css" type="text/css">
  <link rel="stylesheet" href="U-menu.css" type="text/css">
</head>
<body>
  <main id="main">
    <button type="submit" class="button_back" onclick="history.back()"><h3>＜</h3></button><h3 class="button_back"></h3>
    <form action="" method="POST" name="searchForm" onSubmit="return check();">
    <div align="center">
        <button type="submit" onclick="location.href='U-HK8.php'" class="buse1">
            計画ルート
        </button><br>
        <button type="submit" onclick="location.href='U-FP5.php'" class="buse2">
            名所
        </button>
    </div>
    

  </form>
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
</html>