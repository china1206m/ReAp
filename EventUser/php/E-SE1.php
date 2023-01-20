<?php

include "MG.php";
session_start(); // セッション開始
$id = $_SESSION['eventuser_id'];
$db = MG_02($id,"","","","","","","","","");
$eventuser = $db->fetchAll(PDO::FETCH_ASSOC);

$db = getDB();
$sql = "SELECT * FROM event WHERE eventuser_id = ? ORDER BY post_date DESC LIMIT 50";
$stmt = $db->prepare($sql);
$stmt->bindValue(1,$id);
$stmt->execute();

$count1 = $stmt->rowCount();

$event = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
<html>
<head>
  <title>画面ID E-SE1</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="E-SE1.css" type="text/css">
  <link rel="stylesheet" href="E-menu.css" type="text/css">
</head>
<body bgcolor="#f0f8ff">
  <main id="main">
    <h3>投稿イベント</h3>

  

    <div>
      <ul id="country_list">
          
      </ul>
    
    <!--ここに追加してね-->
    <p class="non">
        投稿したイベントはありません
    </p>

      <div class="right"> 
        <button type="button" onclick="location.href='E-SC1.php'"> 検索　　　　<img src="serch_image.png" height ="40" width="40" /></button>
    
      </div>
    
    </div>
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

<script>
  // 四角の数を動的に変化
  //文字列はphpで作成しそれを引っ張ってくる
  

  var ul = document.getElementById("country_list");
  
  <?php 

      for ($i = 0; $i < $count1; $i++) :

  ?>

	// li要素を作成
	var li = document.createElement('li');
  li.classList.add("event_information");

  //投稿日の追加
  var div_right = document.createElement('p');
      div_right.classList.add("p_right");
      div_right.innerText = "<?php print($event[$i]['post_date']) ?>";

  //都道府県の追加
      var div_pre = document.createElement('p');
      div_pre.innerText = "<?php print($event[$i]['event_prefectures']) ?>"

  //開始日の追加
  var div_first = document.createElement('p');
      div_first.innerText = "<?php print($event[$i]['event_day_first']) ?>"
      div_first.classList.add("yoko");

  //~の追加
  var div_heniyo = document.createElement('p');
      div_heniyo.innerText = "～"
      div_heniyo.classList.add("yoko");

  //終了日の追加
  var div_end = document.createElement('p');
      div_end.classList.add("yoko");
      div_end.innerText = "<?php print($event[$i]['event_day_end']) ?>"

  //場所の追加
  var div_place = document.createElement('p');
      div_place.innerText = "<?php print($event[$i]['event_place']) ?>"

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
  div.innerHTML = "<?php print($event[$i]['event_title']) ?>"

  // 本文を作成
  var p = document.createElement('p');
  p.classList.add("limit");
  p.innerHTML = "<?php print($event[$i]['event_content']) ?>";

  // もっと見るを作成
  var a = document.createElement('a');
  a.classList.add("more-see");
  a.href = "E-SE4.php";
  a.innerText = "...もっと見る";
  
  // それぞれの要素を追加したい場所へ追加
  ul.appendChild(li);
  li.appendChild(div_right);
  li.appendChild(img);
  li.appendChild(div);
  li.appendChild(div_pre);
  li.appendChild(div_first);
  li.appendChild(div_heniyo);
  li.appendChild(div_end);
  li.appendChild(div_place);
  li.appendChild(p);
  li.appendChild(a);

        <?php endfor; ?>

</Script>
</body>