<?php
session_start();
if(!isset($_SESSION['user_id'])) {
  $_SESSION['login_message'] = 'ログインしてください';
  header('Location:U-AC6.php');
  exit;
}
// POSTで送信されている 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $_SESSION['coupon_search'] = $_POST['coupon_search1'];
    $_SESSION['coupon_name'] = $_POST['coupon_name'];
    $_SESSION['coupon_prefectures'] = $_POST['coupon_prefectures'];
    $_SESSION['coupon_place'] = $_POST['coupon_place'];
    $_SESSION['coupon_deadline'] = $_POST['coupon_deadline'];
    $_SESSION['plan_cost'] = $_POST['plan_cost'];

    // 画面遷移　クーポン検索結果画面
    header('Location:U-AC11.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>画面ID U-AC10</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="button.css" type="text/css">
  <link rel="stylesheet" href="U-AC10.css" type="text/css">
  <link rel="stylesheet" href="U-menu.css" type="text/css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>
<body>

<main id="main">
<i class="fas fa-less-than less fa-3x" onclick="history.back()"></i>
    
    <font size="+4" class="screenname">クーポン検索</font>

    <form action="" method="POST" name="searchForm" onSubmit="return check();">
    <input type="search" name="coupon_search1" class="event_search" placeholder="キーワードを入力">
    
        
      <p><label class="label-prefectures-shop" for="prefectures" >都道府県</label></p>
      <select id="region" class="prefectures-shop">
        <option value="">選択してください</option>
        <option value="hokkaido">北海道地方</option>
        <option value="tohoku">東北地方</option>
        <option value="kanto">関東地方</option>
        <option value="tyubu">中部地方</option>
        <option value="kansai">関西地方</option>
        <option value="tyugoku">中国地方</option>
        <option value="shikoku">四国地方</option>
        <option value="kyushu-okinawa">九州・沖縄地方</option>
      </select>
      <select id="pref" class="prefectures-shop" name="coupon_prefectures">
        <option value="">選択してください</option>
      </select>
    

      <p><label class="label-prefectures-shop" for="shop">店名</label></p>
      <input type="text" class="prefectures-shop" name="coupon_place" maxlength="30">
    

    <p><label for="shop">使用期限</label></p>
    <input type="date" id="date" name="coupon_deadline" class="day" value="">

    
  

    <center>
    <button type="submit" name="coupon_search" class="button-only arrang">検索</button>
    </center>
</form>

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
      function check () {
      var prefectures = document.searchForm.coupon_prefectures.value;
      var eventday = document.searchForm.coupon_place.value;
      var eventsearch = document.searchForm.coupon_deadline.value;
      var content = document.searchForm.coupon_search1.value;
      
      if ( prefectures == "" && eventday == "" && eventsearch == "" && content == "") {
      alert ( "検索したい項目を入力してください。" );
      document.searchForm.coupon_prefectures.focus();
      return false;
      }
      
      return true;
      }
      </script>

<script>
  var array = new Array();
      array[''] = new Array({cd:"0", label:"選択してください"});
      array["hokkaido"] = new Array(
          {cd:"北海道", label:"北海道"}
      );
      array["tohoku"] = [
          {cd:"青森県", label:"青森県"},
          {cd:"岩手県", label:"岩手県"},
          {cd:"宮城県", label:"宮城県"},
          {cd:"秋田県", label:"秋田県"},
          {cd:"山形県", label:"山形県"},
          {cd:"福島県", label:"福島県"}
      ];
      array["kanto"] = [
          {cd:"茨城県", label:"茨城県"},
          {cd:"栃木県", label:"栃木県"},
          {cd:"群馬県", label:"群馬県"},
          {cd:"埼玉県", label:"埼玉県"},
          {cd:"千葉県", label:"千葉県"},
          {cd:"東京都", label:"東京都"},
          {cd:"神奈川県", label:"神奈川県"}
      ];
      array["tyubu"] = [
          {cd:"新潟県", label:"新潟県"},
          {cd:"富山県", label:"富山県"},
          {cd:"石川県", label:"石川県"},
          {cd:"福井県", label:"福井県"},
          {cd:"山梨県", label:"山梨県"},
          {cd:"長野県", label:"長野県"},
          {cd:"岐阜県", label:"岐阜県"},
          {cd:"静岡県", label:"静岡県"},
          {cd:"愛知県", label:"愛知県"}
      ];
      array["kansai"] = [
          {cd:"三重県", label:"三重県"},
          {cd:"滋賀県", label:"滋賀県"},
          {cd:"京都府", label:"京都府"},
          {cd:"大阪府", label:"大阪府"},
          {cd:"兵庫県", label:"兵庫県"},
          {cd:"奈良県", label:"奈良県"},
          {cd:"和歌山県", label:"和歌山県"}
      ];
      array["tyugoku"] = [
          {cd:"鳥取県", label:"鳥取県"},
          {cd:"島根県", label:"島根県"},
          {cd:"岡山県", label:"岡山県"},
          {cd:"広島県", label:"広島県"},
          {cd:"山口県", label:"山口県"}
      ];
      array["shikoku"] = [
          {cd:"香川県", label:"香川県"},
          {cd:"徳島県", label:"徳島県"},
          {cd:"愛媛県", label:"愛媛県"},
          {cd:"高知県", label:"高知県"}
      ];
      array["kyushu-okinawa"] = [
          {cd:"福岡県", label:"福岡県"},
          {cd:"佐賀県", label:"佐賀県"},
          {cd:"長崎県", label:"長崎県"},
          {cd:"熊本県", label:"熊本県"},
          {cd:"大分県", label:"大分県"},
          {cd:"宮崎県", label:"宮崎県"},
          {cd:"鹿児島県", label:"鹿児島県"},
          {cd:"沖縄県", label:"沖縄県"}
      ];

  document.getElementById('region').onchange = function(){
    city = document.getElementById("pref");
    city.options.length = 0
    var changedPref = region.value;
      for (let i = 0; i < array[changedPref].length; i++) {
        var op = document.createElement("option");
        value = array[changedPref][i]
        op.value = value.cd;
        op.text = value.label;
        pref.appendChild(op);
      }
  }
</script>



    </body>
</html>