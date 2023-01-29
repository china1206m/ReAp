<?php
session_cache_limiter("none");
session_start(); // セッション開始

include "MG.php";

$eventuser_id = $_SESSION['eventuser_id'];
$event_search = $_SESSION['event_search'];
$event_prefectures = $_SESSION['event_prefectures'];
$event_day_first = $_SESSION['event_day_first'];
$event_day_end = $_SESSION['event_day_end'];
$event_cost = $_SESSION['event_cost'];

$db = MG_11($eventuser_id,$event_search,$event_prefectures,$event_day_first,$event_day_end,$event_cost);

$count1 = $db->rowCount();

if($count1 == 0) {
  $_SESSION['event'] = '検索項目に該当するものがありません。';
}

$event = $db->fetchAll(PDO::FETCH_ASSOC);

$db = MG_02($eventuser_id,"","","","","","","","","");
$eventuser =  $db->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $counter = $_POST['counter'];
  $event_id = $event[$counter]['event_id'];
  $_SESSION['event_id'] = $event_id;
  header('Location:E-SE4.php');
}

?>


<!DOCTYPE html>
<html>
<head>
  <title>画面ID E-SC2</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="E-SC2.css" type="text/css">
  <link rel="stylesheet" href="E-menu.css" type="text/css">
</head>
<body bgcolor="#f0f8ff">
  <main id="main">
    <button type="button" class="button_back" onclick="history.back()"><h3>＜</h3></button><h3 class="button_back">検索結果</h3>
    <form action="" method="POST">
    <input type="hidden" id="counter" name="counter" value="0">
    
    <p class="non">
    <?php
      if (isset($_SESSION['event'])) {
      echo($_SESSION['event']);
      }
    ?>
    </p>

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
      div_right.innerText = "<?php print($event[$i]['post_date']); ?>";

  //都道府県の追加
      var div_pre = document.createElement('p');
      div_pre.innerText = "<?php print($event[$i]['event_prefectures']); ?>"

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

  // ユーザ指定アイコン
  <?php if(!empty($eventuser[0]['profile_message'])) { ?>

    var img = document.createElement('img');
    img.classList.add("circle1");
    img.src = 'E-ImageUser.php?id=<?= $event[$i]['eventuser_id']; ?>';
    img.align = 'left'
    img.alt = 'アイコン'
    img.width = 100;
    img.height = 100;

    // デフォルトアイコン
  <?php } else { ?>
  var img1 = document.createElement('img');
  img1.classList.add("circle");
  img1.src = 'castle.bmp';
  img1.align = 'left'
  img1.alt = 'アイコン'
  <?php } ?>

  // 題名を作成
  var div = document.createElement('div');
  div.className = 'title';
  div.innerHTML = "<?php print($event[$i]['event_title']); ?>"

  // 本文を作成
  var p = document.createElement('p');
  p.classList.add("limit");
  p.innerHTML = "<?php print($event[$i]['event_content']); ?>";

  // もっと見るを作成
  var a = document.createElement('button');
  a.type="submit";
  a.classList.add("more-see");
  a.setAttribute('name','more_see' + <?php print($i); ?>);
  a.setAttribute('id', <?php print($i); ?>);
  a.setAttribute('onclick','button(this.id)');
  a.innerText = "...もっと見る";
  
  // それぞれの要素を追加したい場所へ追加
  ul.appendChild(li);
  li.appendChild(div_right);
  <?php if(!empty($eventuser[0]['profile_message'])) { ?>
  li.appendChild(img);
  <?php } ?>
  //デフォルト作成
  li.appendChild(img1);
  //ここまで
  li.appendChild(div);
  li.appendChild(br);
  li.appendChild(div_pre);
  li.appendChild(div_first);
  li.appendChild(div_heniyo);
  li.appendChild(div_end);
  li.appendChild(div_place);
  li.appendChild(p);
  li.appendChild(a);

        <?php endfor; ?>

        function button(clicked_id){
          var s = clicked_id;
          var counter = document.getElementById("counter");
          counter.value = s;
        }

</Script>
</body>
</html>

<?php
/* セッションの初期化 */
$_SESSION['event'] = '';
?>