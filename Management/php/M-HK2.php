<!DOCTYPE html>
<html>
<head>
  <title>M-HK2</title>
  <meta charset=”utf-8″>
  <link rel="stylesheet" href="M-HK2.css" type="text/css">
  <link rel="stylesheet" href="M-menu.css" type="text/css">
</head>
<body bgcolor="#f0f8ff">
  <main id="main">
    <button type="button" class="button_back" onclick="history.back()"><h3>＜</h3></button><h3 class="button_back"></h3>
    <ul id="ranking">
      <li class="home-list">
        <div class="ranking_information">
          <p align="right">投稿日時</p>
          <div class="yoko">
            <img src="monky.png" class="circle" align="left" alt="アイコン">
            <div class="title">題名</div>
          </div><br>
          <p class="condition">都道府県</p>
          <p class="condition">誰と</p>
          <p class="condition">費用</p>
          <p class="condition">何泊何日</p>
          <ol id="plan-detail"></ol>
        </div>
        <p align="right" class="favorite">お気に入り数</p>
      </li>
    </ul>
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
    var country = ['日本', 'アメリカ', 'イギリス', 'ロシア', 'フランス'];
    var ol = document.getElementById("plan-detail");
    for (var count = 0; count < 6; count++) {
        //ol内のliの追加
        var li_ol = document.createElement('li');

        //場所の四角の追加
        var div_home = document.createElement('div');
        div_home.classList.add("home_information");

        //場所名追加
        var p_planname = document.createElement('p');
        p_planname.classList.add("plan_content");
        p_planname.innerHTML = "場所名"

        //本文内容追加
        var p_content = document.createElement('p');
        p_content.classList.add("plan_content");
        p_content.innerHTML = "本文内容"

        //滞在時間追加
        var p_time = document.createElement('p');
        p_time.innerHTML = "滞在時間"
        p_time.classList.add("plan_content");

        //移動時間追加
        var p_travel = document.createElement('p');
        p_travel.classList.add("travel_time");
        p_travel.innerHTML = "移動時間"

        ol.appendChild(li_ol);
        li_ol.appendChild(div_home);
        div_home.appendChild(p_planname);
        div_home.appendChild(p_content);
        div_home.appendChild(p_time);
        li_ol.appendChild(p_travel);
    }

    

</script>
</body>