<?php
// セッション開始 
session_start();

// POSTで送信されている 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // 呼び出し
    include "MA.php";
    // addインスタンス生成
    $add = new MA();

    // 現在時刻取得
    $post_date = date('Y-m-d');

    // 入力したいカラム名を指定
    $column = ['eventuser_id','event_title', 'event_prefectures', 'event_day_first', 'event_day_end', 
              'event_content', 'event_image', 'event_place', 'event_cost', 'event_favorite_total', 'post_date'];
    
    // 入力された値をpost配列に格納
    $post = [$_SESSION['eventuser_id'], $_POST['event_title'], $_POST['event_prefectures'], $_POST['event_day_first'], $_POST['event_day_end'], 
            $_POST['event_content'], $_FILES['event_image']['tmp_name'], $_POST['event_place'], $_POST['event_cost'], 0, $post_date];

    // 入力された値のデータ型を定義
    $type = [0, 2, 2, 1, 1, 2, 1, 2, 0, 0, 1];

    // 引数としてテーブル名、追加する値、追加する値の型 返り値としてID
    $_SESSION['event_id'] = $add->ma_return("event",$column, $post, $type);

    // 画面遷移　ホーム画面
    header('Location:E-EL1.html');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>画面ID E-CB1</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="E-CB1.css" type="text/css">
  <link rel="stylesheet" href="E_button.css" type="text/css">
  <link rel="stylesheet" href="E-menu.css" type="text/css">
</head>
<body>
  <main id="main">
  <h3>イベント投稿</h3>

  
  
  <form action="" method="POST" enctype="multipart/form-data">
   
    <table>
      
      <tr>
        <td><p><label for="post_day" >投稿日</label></p></td>
        <td><img src="select_image.png" class="event_image" width="103px" height="85px"></td>
    </tr>
    <tr>
      <td><div id="current_date" name="post_day" class="post_day"></p></td>
      <td><input type="file" name="event_image" class="event_image" accept="image/jpeg,image/png" multiple/></td>
    </tr>
</table>
    

    <p><label for="title">題名<span class="require">必須</span></label></p>
    <textarea name="event_title" class="event_title" minlength="1" maxlength="30" placeholder="30文字以内" required></textarea>

    <p><label for="shop">都道府県<span class="require">必須</span></label></p>
        <select name="event_prefectures" class="prefectures" required>
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
    
    <p><label for="place">開催場所<span class="require">必須</span></label></p>
    <textarea name="event_place" class="event_place" required></textarea>

    <table>     
<tr>
  <td><p><label for="day">開催開始日<span class="require">必須</span></label></p></td>
  <td><p><label for="day">開催終了日<span class="require">必須</span></label></p></td>
</tr>
<tr>
  <td><input type="date" id="date" name="event_day_first" class="event_day" value="" required></td>
  <td><input type="date" id="date" name="event_day_end" class="event_day" value="" required></td>
  </tr>

<tr>
  <td><p><label for="cost">費用</label></p></td>
</tr>

<tr>
  <td><input type="number" id="date" name="event_cost" class="event_cost" minlength="1"></td>
 </tr>
</table>

<p><label for="content">本文<span class="require">必須</span></label></p>
<textarea name="event_content" class="event_content" minlength="1" maxlength="1000" placeholder="1000文字以内" required></textarea>

<center>
<button class="button-only" id="open-btn"  type="submit">投稿</button>
</form>
</center>
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
  date = new Date();
  year = date.getFullYear();
  month = date.getMonth() + 1;
  day = date.getDate();
  document.getElementById("current_date").innerHTML = year + "/" + month + "/" + day;
  </script>
</body>