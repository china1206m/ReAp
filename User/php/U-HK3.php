<?php
// セッション開始 
session_start();

if(!isset($_SESSION['user_id'])){
  $_SESSION['login_message'] = 'ログインしてください';
  header('Location:U-AC6.php');
  exit;
}

/* セッションの初期化 */
$_SESSION['plan_search'] = '';
$_SESSION['plan_who'] = '';
$_SESSION['plan_prefectures'] = '';
$_SESSION['plan_cost'] = '';
$_SESSION['plan_date_first'] = '';
$_SESSION['plan_date_end'] = '';
$_SESSION['plan_stay'] = '';


// POSTで送信されている
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $_SESSION['plan_search'] = $_POST['plan_search'];
    $_SESSION['plan_who'] = $_POST['plan_who'];
    $_SESSION['plan_prefectures'] = $_POST['plan_prefectures'];
    $_SESSION['plan_cost'] = $_POST['plan_cost'];
    $_SESSION['plan_date_first'] = $_POST['plan_date_first'];
    $_SESSION['plan_date_end'] = $_POST['plan_date_end'];
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
    <link rel="stylesheet" href="button.css" type="text/css">
    <link rel="stylesheet" href="U-menu.css" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <title>U-HK3</title>
</head>

<body>
  <main id="main">
  <i class="fas fa-less-than less fa-3x" onclick="history.back()"></i>
    <font size="+4" class="screenname">検索条件</font>

    <form action="" method="POST" name="searchForm" onSubmit="return check();">
      <input type="search" name="plan_search" class="plan_search" maxlength="32" placeholder="キーワードを入力">

      <p>カテゴリ</p>
      <table class="cate">
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
      <div align="center">
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
      </div>

      <p>期間</p>
        <table align="center">
        <tr>
        <td><input type="date" id="date" name="plan_date_first" class="plan-day" value=""></td>
        <td><div class="kara">～</div></td>
        <td><input type="date" id="date" name="plan_date_end" class="plan-day2" value=""></td>
        </tr>
      </table>
  
      <p>費用</p>
      <div align="center">
        <input type="number" name="plan_cost" class="cost"> 円
      </div>
  
      <p>宿泊</p>
      <div align="center">
        <input type="number" name="plan_stay" class="stay"> 泊
      </div>

      <center>
        <br>
        <br>
      <button type="submit" class="button-only" name="submit" align="center">検索</button>
      </center>
    </form>
    <div class="box"></div>

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
  <script>
function check () {
var prefectures = document.searchForm.plan_prefectures.value;
var search = document.searchForm.plan_search.value;
var who = document.searchForm.plan_who.value;
var date_first = document.searchForm.plan_date_first.value;
var date_end = document.searchForm.plan_date_end.value;
var cost = document.searchForm.plan_cost.value;
var stay  = document.searchForm.plan_stay.value;

if ( prefectures == "" && who == "" && search == "" && date_first == "" && date_end == "" && cost == "" && stay == "") {
  alert ( "検索したい項目を入力してください。" );
  document.searchForm.plan_prefectures.focus();
  return false;
}
if(date_first != "" && date_end  == ""){
  alert ( "開催期間の終了日を選択してください" );
  document.searchForm.plan_date_end.focus();
  return false;
}
if(date_end != "" && date_first == ""){
  alert ( "開催期間の開始日を選択してください" );
  document.searchForm.plan_fate_first.focus();
  return false;
}
return true;
}
</script>

<script>
    const radioButtons = document.querySelectorAll('input[type="radio"]');

const clearRadioButton = (radioButton) => {
  setTimeout(func =()=>{
    radioButton.checked = false;
  },100)
}

radioButtons.forEach(radioButton => {
  let queryStr = 'label[for="' + radioButton.id + '"]'
  let label = document.querySelector(queryStr)

  radioButton.addEventListener("mouseup", func=()=>{
    if(radioButton.checked){
      clearRadioButton(radioButton)
    }
  });

  if(label){
    label.addEventListener("mouseup", func=()=>{
      if(radioButton.checked){
        clearRadioButton(radioButton)
      }
    });
  }

});
  </script>
</body>

</html>