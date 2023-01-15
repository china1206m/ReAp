<?php

include "MG.php";

$event_id = 2;
$db = MG_06($event_id,"","","","","","","","","","","");
$event = $db->fetchAll(PDO::FETCH_ASSOC);

$eventuser_id = $event[0]['eventuser_id'];
$db = MG_02($eventuser_id,"","","","","","","","","");
$eventuser = $db->fetchAll(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
<html>
<head>
  <title>画面ID M-EV2</title>
  <meta charset=”UTF-8″>
  <link rel="stylesheet" href="M-EV2.css" type="text/css">
  <link rel="stylesheet" href="M-menu.css" type="text/css">
</head>
<body bgcolor="#f0f8ff">
    <form action="M-SC1.php" method="POST" enctype="multipart/form-data">
  <main id="main">
    <button type="submit" class="button_back" onclick="history.back()"><h3>＜</h3><h3 class="button_back"></h3></button>
    
    

    <div>
      <ul id="country_list">
          
      </ul>
    
    
      <div class="right"> 
                <button type="submit" onclick="location.href='M-SC1.php'"><img src="serch_image.png"  height ="40" width="40"/></button>
      </div>
    </div>
</form>
    
</main>

<aside id="sub">
  
  <ul>
    <li class="menu-list"><a class="menu-button" href="M-HK1.php.html"><img src="M-menu-home.png" width="45" height="43">　ホーム</a></li><br>
    <li class="menu-list"><a class="menu-button" href="M-PL1.php"><img src="M-menu-place.png" width="45" height="43">　名所</a></li><br>
    <li class="menu-list"><a class="menu-button" href="M-EV1.php"><img src="M-menu-event.png" width="45" height="43">　イベント</a></li><br>
    <li class="menu-list"><a class="menu-button" href="M-RP1.php"><img src="M-menu-report.png" width="45" height="43">　通報一覧</a></li><br>
    <li class="menu-list"><a class="menu-button" href="M-CP1.php"><img src="M-menu-coupon.png" width="45" height="43">　クーポン</a></li><br>
    <li class="menu-list"><a class="menu-button" href="M-UM1.php"><img src="M-menu-acount.png" width="45" height="43">　ユーザ管理</a></li><br>
  </ul>
</aside>

<script>

                


  // 四角の数を動的に変化
  //文字列はphpで作成しそれを引っ張ってくる
  //var country = ['日本', 'アメリカ', 'イギリス', 'ロシア', 'フランス'];

  var ul = document.getElementById("country_list");



	// li要素を作成
	var li = document.createElement('li');
  li.classList.add("event_information");

  // アイコンを作成
  var img = document.createElement('img');
  img.classList.add("circle");
  img.src = 'monky.png';
  img.align = 'left'
  img.alt = 'アイコン'
  img.width = 100;
  img.height = 100;

  // 題名を作成
  var div = document.createElement('div');
  div.className = 'title';
  var daimei = document.createTextNode("<?php print($event[0]['event_title']); ?>");
  div.appendChild(daimei);

  // 本文を作成
  var p = document.createElement('p');
  p.classList.add("limit");
  var text = document.createTextNode("<?php print($event[0]['event_content']); ?>");
  p.appendChild(text);
  
  // それぞれの要素を追加したい場所へ追加
  ul.appendChild(li);
  li.appendChild(img);
  li.appendChild(div);
  li.appendChild(p);

</Script>
</body>