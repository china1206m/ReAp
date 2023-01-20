<?php
/* セッション開始 */
session_start();
 
/* POSTで送信されている */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // 呼び出し
    include "MA.php";
    // addインスタンス生成
    $add = new MA();

    // 現在時刻取得
    $post_date = date('Y-m-d');

    // 入力したいカラム名を指定
    $column = ['user_id','plan_title', 'plan_who', 'plan_prefectures', 
              'plan_cost', 'plan_day', 'plan_favorite_total', 'plan_favorite_season', 'post_date'];
    
    // 入力された値をpost配列に格納
    $post = [$_SESSION['user_id'], $_POST['plan_title'], $_POST['plan_who'], $_POST['plan_prefectures'], 
            $_POST['plan_cost'], $_POST['plan_day'], 0, 0, $post_date];

    // 入力された値の型を定義
    $type = [0,1,1,1,0,0,0,0,1];

    // 引数としてテーブル名、追加する値、追加する値の型 返り値としてID
    $_SESSION['plan_id'] = $add->ma_return("plan",$column, $post, $type);

    // 計画投稿（計画詳細）画面
    header('Location:U-HK10.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="U-HK8.css" type="text/css">
    <link rel="stylesheet" href="U-menu.css" type="text/css">
    <title>U-HK8</title>
</head>

<body>
  <main id="main">

    <form action="" method="POST" name="searchForm" onSubmit="return check();">
    <button type="button" class="button_back" onclick="history.back()"><h3>＜</h3></button><h3 class="button_back"></h3>
    <font size="+4" class="screenname">
      投稿
    </font>
    <p><font size="+4" for="post_day" >投稿日</font></p>
    <div id="current_date" name="post_date" class="post_day"></div>
      <p>
        <font size="+4">タイトル<span class="require">必須</span></font>
      </p>
      <div align="center">
        <input type="text" name="plan_title" class="title" required placeholder="タイトル">
      </div>

      <p>
        <font size="+4">カテゴリ</font>
      </p>
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
  
      <p>
        <font size="+4">都道府県<span class="require">必須</span></font>
      </p>
      <div align="center">
        <select id="region" class="region-select" required>
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
          <select id="pref" class="pref-select" name="plan_prefectures" required>
            <option value="">選択してください</option>
          </select>
      </div>
      
  
      <p>
        <font size="+4">費用<span class="require">必須</span></font>
      </p>
      
      <div align="center">
        <input type="number" name="plan_cost" class="cost" required> 
        <font size="+3">
            円
        </font>
      </div>
      
  
      <p>
        <font size="+4">宿泊</font>
      </p>
      <div align="center">
        <input type="number" name="plan_day" class="stay-from"> 
        <font size="+3">
            泊 
        </font>
        <input type="number" name="plan_day" class="stay-to"> 
        <font size="+3">
            日
        </font>
      </div>
      
  
      <center>
      <button type="submit" class="button-only" name="submit">次へ</button>
      </center>
    </form>
  </main>

  <aside id="sub">
    <ul class="menu">
        <li class="menu-list"><a class="menu-button" href="U-HK6.php"><img class="menu_img" src="U-menu-home.png" >　ホーム</a></li><br>
        <li class="menu-list"><a class="menu-button" href="U-PL1.php"><img class="menu_img" src="U-menu-place.png">　名所</a></li><br>
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
var title = document.searchForm.plan_title.value;
var who = document.searchForm.plan_who.value;
var prefectures = document.searchForm.plan_prefectures.value;
var cost = document.searchForm.plan_cost.value;
var day = document.searchForm.plan_day.value;


if ( title == "" && who == "" && prefectures == "" && cost == "" && day == "") {
alert ( "投稿したい項目を入力してください。" );
document.searchForm.plan_title.focus();
return false;
}

return true;
}
</script>
<script>
  date = new Date();
  year = date.getFullYear();
  month = date.getMonth() + 1;
  day = date.getDate();
  document.getElementById("current_date").innerHTML = year + "/" + month + "/" + day;
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