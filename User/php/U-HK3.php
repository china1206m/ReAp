<?php
/* セッション開始 */
session_start();

/* POSTで送信されている */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $_SESSION['plan_search'] = $_POST['plan_search'];
    $_SESSION['plan_who'] = $_POST['plan_who'];
    $_SESSION['plan_prefectures'] = $_POST['plan_prefectures'];
    $_SESSION['plan_cost'] = $_POST['plan_cost'];
    $_SESSION['plan_stay'] = $_POST['plan_stay'];

    // 画面遷移　計画検索結果画面
    header('Location:U-HK11.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="U-HK3.css" type="text/css">
    <link rel="stylesheet" href="U-menu.css" type="text/css">
    <title>U-HK3</title>
</head>

<body>
  <main id="main">
    <form action="" method="POST" name="searchForm" onSubmit="return check();">
      <input type="search" name="plan_search" class="plan_search" placeholder="キーワードを入力">
      <p>カテゴリ</p>
      <table align="center">
        <tr>
          <td><input type="radio" name="plan_who" value="一人" id="one"><label for="one">一人</label></td>
          <td><input type="radio" name="plan_who" value="友達" id="friend"><label for="friend">友達</label></td>
        </tr>
        <tr>
          <td><input type="radio" name="plan_who" value="恋人" id="lover"><label for="lover">恋人</label></td>
          <td><input type="radio" name="plan_who" value="家族" id="family"><label for="family">家族</label></td>
        </tr>
      </table> 
  
      <p>都道府県</p>
      <select id="region" class="region-select">
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
      <select id="pref" class="pref-select" name="plan_prefectures">
        <option value="">選択してください</option>
      </select>
  
      <p>費用</p>
      <input type="text" name="plan_cost" class="cost"> 円
  
      <p>宿泊</p>
      <input type="text" name="plan_stay" class="stay-from"> 泊 <input type="text" name="plan_stay_day" class="stay-to"> 日
  
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
            {cd:"北海道", label:"北海道"}
        );
        array["tohoku"] = [
            {cd:"青森県", label:"青森県"},
            {cd:"岩手県", label:"岩手県"},
            {cd:"宮城県", label:"宮城県"},
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
  </script>
  <script>
function check () {
var prefectures = document.searchForm.plan_prefectures.value;
var plansearch = document.searchForm.plan_search.value;

if ( prefectures == "" && plansearch == "") {
alert ( "検索したい項目を入力してください。" );
document.searchForm.plan_search.focus();
return false;
}

return true;
}
</script>
</body>

</html>