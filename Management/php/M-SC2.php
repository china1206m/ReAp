<?php
// セッション開始
session_start();
if($_SERVER['REQUEST_METHOD'] === 'POST') {
  $_SESSION['event_search'] = $_POST['event_search'];
  $_SESSION['prefectures'] = $_POST['prefectures'];
  $_SESSION['event_search_first'] = $_POST['event_search_first'];
  $_SESSION['event_search_end'] = $_POST['event_search_end'];
  // 検索結果画面
  header(('Location:E-SC5.php'));
  exit;
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>M-SC2</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="M-SC2.css" type="text/css">
  <link rel="stylesheet" href="M-menu.css" type="text/css">
</head>
<body>
<main id="main">
  <button type="button" class="button_back" onclick="history.back()">＜</button>
  <font size="+3" class="screenname">検索条件</font>

  <form action="" method="POST" name="searchForm" onSubmit="return check();">
        <input type="search" name="event_search" class="event_search" placeholder="キーワードを入力">


        <p><label for="shop">開催場所</label></p>

        <select name="event_prefectures" class="prefectures">
          <option value="">都道府県を選択</option>
          <option value="北海道">北海道</option>
          <optgroup label="東北">
            <option value="青森県">青森県</option>
            <option value="秋田県">秋田県</option>
            <option value="岩手県">岩手県</option>
            <option value="山形県">山形県</option>
            <option value="宮城県">宮城県</option>
            <option value="福島県">福島県</option>
          </optgroup>
          <optgroup label="関東">
            <option value="茨城県">茨城県</option>
            <option value="栃木県">栃木県</option>
            <option value="群馬県">群馬県</option>
            <option value="埼玉県">埼玉県</option>
            <option value="千葉県">千葉県</option>
            <option value="東京都">東京都</option>
            <option value="神奈川県">神奈川県</option>
          </optgroup>
          <optgroup label="中部">
            <option value="新潟県">新潟県</option>
            <option value="富山県">富山県</option>
            <option value="石川県">石川県</option>
            <option value="福井県">福井県</option>
            <option value="山梨県">山梨県</option>
            <option value="長野県">長野県</option>
            <option value="岐阜県">岐阜県</option>
            <option value="静岡県">静岡県</option>
            <option value="愛知県">愛知県</option>
          </optgroup>
          <optgroup label="近畿">
            <option value="三重県">三重県</option>
            <option value="滋賀県">滋賀県</option>
            <option value="京都府">京都府</option>
            <option value="大阪府">大阪府</option>
            <option value="兵庫県">兵庫県</option>
            <option value="奈良県">奈良県</option>
            <option value="和歌山県">和歌山県</option>
          </optgroup>
          <optgroup label="中国">
            <option value="岡山県">岡山県</option>
            <option value="広島県">広島県</option>
            <option value="鳥取県">鳥取県</option>
            <option value="島根県">島根県</option>
            <option value="山口県">山口県</option>
          </optgroup>
          <optgroup label="四国">
            <option value="徳島県">徳島県</option>
            <option value="香川県">香川県</option>
            <option value="愛媛県">愛媛県</option>
            <option value="高知県">高知県</option>
          </optgroup>
          <optgroup label="九州沖縄">
            <option value="福岡県">福岡県</option>
            <option value="佐賀県">佐賀県</option>
            <option value="長崎県">長崎県</option>
            <option value="熊本県">熊本県</option>
            <option value="大分県">大分県</option>
            <option value="宮崎県">宮崎県</option>
            <option value="鹿児島県">鹿児島県</option>
            <option value="沖縄県">沖縄県</option>
          </optgroup>
        </select>

        <p><label for="event_day">開催期間</label></p>
        <table>
        <tr>
        <td><input type="date" id="date" name="event_search_first" class="event-day" value=""></td>
        <td><div class="kara">～</div></td>
        <td><input type="date" id="date" name="event_search_end" class="event-day2" value=""></td>
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
function check () {
var prefectures = document.searchForm.event_prefectures.value;
var eventsearch = document.searchForm.event_search.value;
var date_first = document.searchForm.event_search_first.value;
var date_end = document.searchForm.event_search_end.value;

if ( prefectures == "" && eventsearch == "" && date_first == "" && date_end == "" ) {
  alert ( "検索したい項目を入力してください。" );
  document.searchForm.event_prefectures.focus();
  return false;
}
if(date_first != "" && date_end == ""){
  alert ( "開催期間の終了日を選択してください" );
  document.searchForm.event_search_end.focus();
  return false;
}
if(date_end != "" && date_first == ""){
  alert ( "開催期間の開始日を選択してください" );
  document.searchForm.event_search_first.focus();
  return false;
}
return true;
}
</script>

</body>
</html>