<!DOCTYPE html>
<html>

<head>
  <title>U-EV2</title>
  <meta charset=”UTF-8″>
  <link rel="stylesheet" href="U-EV2.css" type="text/css">
</head>

<body bgcolor="#f0f8ff">
  <main id="main">
    <button type="button" class="button_back" onclick="history.back()"><h3>＜</h3></button>

    <div class="yoko">
      <ul>
        <li>
          <div class="event_information">
            <a href="U-EV3.html" style="text-decoration:none;">
              <img src = "monkey.png" class="circle" align="left" alt="アイコン" width="100%" height="100%">
            </a>
            <div class="title">
              題名
            </div>
            <p>本文</p>
            <p>費用</p>
            <p>開催場所</p>
            <center id="image_area"></center>
          </div>
        </li>
      </ul>
    </div>
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

  <script>
  //画像の文字列はphpで用意する
  const images = ['neko.jpg', 'naruto.jpg'];
  const content_area = document.getElementById("image_area");
  for (var count = 0; count < 2; count++) {
    let img_add = document.createElement('img');
    img_add.src = images[count];
    img_add.alt = 'さいくん'; // 代替テキスト
    img_add.width = 400; // 横サイズ（px）
    content_area.appendChild(img_add);
  }
  </script>

</body>
</html>