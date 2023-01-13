<?php
/* セッション開始 */
session_start();

/* POSTで送信されている */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $_SESSION['event_search'] = $_POST['event_search'];
    $_SESSION['event_prefectures'] = $_POST['event_prefectures'];
    $_SESSION['event_day'] = $_POST['event_day'];

    // 画面遷移　イベント検索結果画面
    header('Location:U-EV6.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="U-EV4.css" type="text/css">
    <link rel="stylesheet" href="U-menu.css" type="text/css">
    <title>U-EV4</title>
</head>

<body>
  <main id="main">
    <form action="" method="POST" name="searchForm" onSubmit="return check();">
      <input type="search" name="event_search" class="event_search" placeholder="キーワードを入力">
  
      <p>都道府県</p>
      <select id="region" class="region-select">
        <option value="">地方を選択</option>
        <option value="hokkaido">北海道地方</option>
        <option value="tohoku">東北地方</option>
        <option value="kanto">関東地方</option>
        <option value="tyubu">中部地方</option>
        <option value="kansai">関西地方</option>
        <option value="tyugoku">中国地方</option>
        <option value="shikoku">四国地方</option>
        <option value="kyushu-okinawa">九州・沖縄地方</option>
      </select>
      <select id="pref" class="pref-select" name="event_prefectures">
        <option value="">都道府県を選択</option>
      </select>

      <p>開催月</p>
      <table align="center">
        <tr>
          <td><input type="checkbox" name="event_day[]" value="1">１月</td>
          <td><input type="checkbox" name="event_day[]" value="2">２月</td>
          <td><input type="checkbox" name="event_day[]" value="3">３月</td>
        </tr>
        <tr>
          <td><input type="checkbox" name="event_day[]" value="4">４月</td>
          <td><input type="checkbox" name="event_day[]" value="5">５月</td>
          <td><input type="checkbox" name="event_day[]" value="6">６月</td>
        </tr>
        <tr>
            <td><input type="checkbox" name="event_day[]" value="7">７月</td>
            <td><input type="checkbox" name="event_day[]" value="8">８月</td>
            <td><input type="checkbox" name="event_day[]" value="9">９月</td>
        </tr>
        <tr>
            <td><input type="checkbox" name="event_day[]" value="10">10月</td>
            <td><input type="checkbox" name="event_day[]" value="11">11月</td>
            <td><input type="checkbox" name="event_day[]" value="12">12月</td>
        </tr>
      </table> 

      <center>
        <br>
        <br>
      <button type="submit" class="button-only" name="submit">検索</button>
      </center>
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
  
  <script>
    var array = new Array();
        array[''] = new Array({cd:"0", label:"選択してください"});
        array["hokkaido"] = new Array(
            {cd:"1", label:"北海道"}
        );
        array["tohoku"] = [
            {cd:"1", label:"青森県"},
            {cd:"2", label:"岩手県"},
            {cd:"3", label:"宮城県"},
            {cd:"4", label:"秋田県"},
            {cd:"5", label:"山形県"},
            {cd:"6", label:"福島県"}
        ];
        array["kanto"] = [
            {cd:"1", label:"茨城県"},
            {cd:"2", label:"栃木県"},
            {cd:"3", label:"群馬県"},
            {cd:"4", label:"埼玉県"},
            {cd:"5", label:"千葉県"},
            {cd:"6", label:"東京都"},
            {cd:"7", label:"神奈川県"}
        ];
        array["tyubu"] = [
            {cd:"1", label:"新潟県"},
            {cd:"2", label:"富山県"},
            {cd:"3", label:"石川県"},
            {cd:"4", label:"福井県"},
            {cd:"5", label:"山梨県"},
            {cd:"6", label:"長野県"},
            {cd:"7", label:"岐阜県"},
            {cd:"8", label:"静岡県"},
            {cd:"9", label:"愛知県"}
        ];
        array["kansai"] = [
            {cd:"1", label:"三重県"},
            {cd:"2", label:"滋賀県"},
            {cd:"3", label:"京都府"},
            {cd:"4", label:"大阪府"},
            {cd:"5", label:"兵庫県"},
            {cd:"6", label:"奈良県"},
            {cd:"7", label:"和歌山県"}
        ];
        array["tyugoku"] = [
            {cd:"1", label:"鳥取県"},
            {cd:"2", label:"島根県"},
            {cd:"3", label:"岡山県"},
            {cd:"4", label:"広島県"},
            {cd:"5", label:"山口県"}
        ];
        array["shikoku"] = [
            {cd:"1", label:"香川県"},
            {cd:"2", label:"徳島県"},
            {cd:"3", label:"愛媛県"},
            {cd:"4", label:"高知県"}
        ];
        array["kyushu-okinawa"] = [
            {cd:"1", label:"福岡県"},
            {cd:"2", label:"佐賀県"},
            {cd:"3", label:"長崎県"},
            {cd:"4", label:"熊本県"},
            {cd:"5", label:"大分県"},
            {cd:"6", label:"宮崎県"},
            {cd:"7", label:"鹿児島県"},
            {cd:"8", label:"沖縄県"}
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

function check () {
var prefectures = document.searchForm.event_prefectures.value;
var eventday = document.searchForm.event_day.value;
var eventsearch = document.searchForm.event_search.value;

if ( prefectures == "" && eventday == "" && eventsearch == "") {
alert ( "検索したい項目を入力してください。" );
document.searchForm.event_search.focus();
return false;
}

return true;
}
  </script>
    
</body>

</html>