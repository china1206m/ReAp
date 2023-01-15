<?php

include "MG.php";

$event_search = "";
$event_prefectures = "";
$event_day_first = "";
$event_day_end = "";

$db = MG_11($event_search,$event_prefectures,$event_day_first,$event_day_end);

$count1 = $db->rowCount();

$event = $db->fetchAll(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
<html>
<head>
  <title>画面ID E-SC2</title>
  <meta charset=”UTF-8″>
  <link rel="stylesheet" href="E-SC2.css" type="text/css">
  <link rel="stylesheet" href="E-menu.css" type="text/css">
</head>
<body bgcolor="#f0f8ff">
  <main id="main">
    <button type="button" class="button_back" onclick="history.back()"><h3>＜</h3></button><h3 class="button_back">検索結果</h3>
    


<div>
  <ul id="country_list">
  </ul>
</div>
</main>

<aside id="sub">
<ul>
        <li class="menu-list"><a class="menu-button" href="E-EL1.html"><img src="E-menu-home.png" width="45" height="43">　ホーム</a></li><br>
        <li class="menu-list"><a class="menu-button" href="E-CB1.php"><img src="E-menu-post.png" width="45" height="43">　イベント投稿</a></li><br>
        <li class="menu-list"><a class="menu-button" href="E-SE1.php"><img src="E-menu-see.png" width="45" height="43">　投稿イベント<br>　　　一覧・消去</a></li><br>
        <li class="menu-list"><a class="menu-button" href="E-CP1.php"><img src="E-menu-coupon.png" width="45" height="43">　クーポン</a></li><br>
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
      div_right.innerText = "<?php print($event[$i]['post_date']); ?>";

  //都道府県の追加
      var div_pre = document.createElement('p');
      div_pre.innerText = "<?php print($event[$i]['event_prefectures']); ?>"

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
  div.innerHTML = "<?php print($event[$i]['event_title']); ?>"

  // 本文を作成
  var p = document.createElement('p');
  p.classList.add("limit");
  p.innerHTML = "<?php print($event[$i]['event_content']); ?>";

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
  li.appendChild(p);
  li.appendChild(a);

        <?php endfor; ?>

</Script>
</body>
</html>