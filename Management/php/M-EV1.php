<?php

include "MG.php";

$db = getDB();
$sql = "SELECT * FROM event ORDER BY post_date DESC LIMIT 50";
$stmt = $db->prepare($sql);
$stmt->execute();

$count1 = $stmt->rowCount();

$event = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
<html>
<head>
  <title>画面ID M-EV1</title>
  <meta charset=”UTF-8″>
  <link rel="stylesheet" href="M-EV1.css" type="text/css">
  <link rel="stylesheet" href="M-menu.css" type="text/css">
</head>
<body bgcolor="#f0f8ff">
  <main id="main">
    
    <h3>投稿イベント</h3>

    <div>
      <ul id="country_list">
          
      </ul>
    
    
      <div class="right"> 
                <button type="button" onclick="location.href='M-SC2.php'"><img src="serch_image.png"  height ="40" width="40"/></button>
      </div>
    </div>

</main>

<aside id="sub">
  
  <ul>
    <li class="menu-list"><a class="menu-button" href="M-HK1.php"><img src="M-menu-home.png" width="45" height="43">　ホーム</a></li><br>
    <li class="menu-list"><a class="menu-button" href="M-PL1.html"><img src="M-menu-place.png" width="45" height="43">　名所</a></li><br>
    <li class="menu-list"><a class="menu-button" href="M-EV1.php"><img src="M-menu-event.png" width="45" height="43">　イベント</a></li><br>
    <li class="menu-list"><a class="menu-button" href="M-RP2.php"><img src="M-menu-report.png" width="45" height="43">　通報一覧</a></li><br>
    <li class="menu-list"><a class="menu-button" href="M-CP1.html"><img src="M-menu-coupon.png" width="45" height="43">　クーポン</a></li><br>
    <li class="menu-list"><a class="menu-button" href="M-UM1.php"><img src="M-menu-acount.png" width="45" height="43">　ユーザ管理</a></li><br>
  </ul>
</aside>

<script>

                


  // 四角の数を動的に変化
  //文字列はphpで作成しそれを引っ張ってくる
  //var country = ['日本', 'アメリカ', 'イギリス', 'ロシア', 'フランス'];

  var ul = document.getElementById("country_list");

  <?php 

    for ($i = 0; $i < $count1; $i++) :  

      $eventuser_id = $event[$i]['eventuser_id']; 
      $db = MG_02($eventuser_id,"","","","","","","","","");
      $eventuser = $db->fetchAll(PDO::FETCH_ASSOC);
  ?>

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
  var daimei = document.createTextNode("<?php print($event[$i]['event_title']); ?>");
  div.appendChild(daimei);

  // 本文を作成
  var p = document.createElement('p');
  p.classList.add("limit");
  var text = document.createTextNode("<?php print($event[$i]['event_content']); ?>");
  p.appendChild(text);

  // もっと見るを作成
  var a = document.createElement('a');
  a.classList.add("more-see");
  a.href = "M-EV2.php";
  a.innerText = "...もっと見る";
  
  // それぞれの要素を追加したい場所へ追加
  ul.appendChild(li);
  li.appendChild(img);
  li.appendChild(div);
  li.appendChild(p);
  li.appendChild(a);

      <?php endfor; ?>

</Script>
</body>