<?php
/* セッション開始 */
session_start();
 
/* POSTで送信されている */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

      /* データ挿入 */
    // 呼び出し
    include "MA.php";
    // addインスタンス生成
    $add = new MA();

    $_SESSION['eventuser_id'] = 1;

    // 入力したいカラム名を指定
    $column = ['coupon_name','eventuser_id', 'coupon_place', 'coupon_prefectures', 'coupon_content', 'coupon_deadline'];
    
    // 入力された値をpost配列に格納
    $post = [$_POST['coupon_name'], $_SESSION['eventuser_id'], $_POST['coupon_place'], $_POST['coupon_prefectures'], $_POST['coupon_content'], $_POST['coupon_deadline']];

    // 入力された値の型を定義
    $type = [1,0,1,1,1,0];

    // 引数としてテーブル名、追加する値、追加する値の型 返り値としてID
    $_SESSION['coupon_id'] = $add->ma_return("coupon",$column, $post, $type);
 
    header('Location: ./list.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>画面ID E-CP6</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="E-CP6.css" type="text/css">
  <link rel="stylesheet" href="E-menu.css" type="text/css">
  
</head>
<body>

<main id="main">
    <button type="button" class="button_back" onclick="history.back()"><h3>＜</h3></button><h3 class="button_back">クーポン発行</h3>


    <form action="#" method="POST" name="searchForm" id="form1" onsubmit="return check()">
        <table>
            <tr>
                <td><p><label class="label-prefectures-shop" for="prefectures">都道府県<span class="require">必須</span></label></p></td>
                <td><p><label class="label-prefectures-shop" for="shop">店名<span class="require">必須</span></label></p></td>
            </tr>
        
            <tr>
            <td>
            <select name="coupon_prefectures" class="prefectures-shop" required>
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
            </td>
        
            <td><input type="text" class="prefectures-shop" name="coupon_place" maxlength="30" placeholder="30文字以内" required></td>
            </tr>
        </table>
    
        <p><label for="shop">使用期限<span class="require">必須</span></label></p>
        <input type="date" id="date" name="coupon_deadline" class="day" required>
    
        <p><label for="shop">詳細<span class="require">必須</span></label></p>
        <textarea class="tarea" name="coupon_content" maxlength="1000" placeholder="1000文字以内" required></textarea>
    
     
        

      <center>
        <button id="open-btn" class="overlay-event">発行する</button>
      </center>
    </form>  
   
      <div style="display: block;" id="overlay">
        <div class="flex">
          <div id="overlay-inner">
            <hr class="top">
            都道府県
            <hr>
            店名
            <hr>
            使用期限
            <hr>
            詳細
            <hr class="under">
          <!--idはデザイン-->
          <button id="close-btn1" class="close" value="" disabled>はい</button>
          <!--はいを押したら消去機能呼び出し-->
          <button id="close-btn2" class="close" type="button" disabled>いいえ</button>
          </div>
        </div>
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
  var open = document.getElementById("open-btn");
  var close = document.getElementById("close-btn1");
  var close2 = document.getElementById("close-btn2");
  const overlay = document.getElementById('overlay');
  function overlayToggle() {
    overlay.classList.toggle('overlay-on');
  }


  function check(){ // formが送信される直前に実行
    if(close.value==1){ // 'はい'が押されたとき
      history.pushState(null, null, null);

    window.addEventListener("popstate", function() {
        history.pushState(null, null, null);
    });
      return true;
    }
    open.setAttribute("disabled","");
    close.removeAttribute("disabled");
    close2.removeAttribute("disabled");
    overlayToggle();
    return false;
  }
  
  close2.addEventListener('click', function(){
    close2.setAttribute("disabled","");
    open.removeAttribute("disabled");
    overlayToggle();
  }, false);

  close.addEventListener('click', function(){
    close.value = "1";
    close.setAttribute("disabled","");
    document.forms.form1.submit();
  }, false);


</script>



<script>
  n=1;
function disp() {
  if(n == 1){
      document.getElementById("overlay-inner").innerHTML = "<span style='color: red;'>完了しました</span><br><button id=close-btn type=button onclick=location.href='E-CP1.html'>完了</button>";
  }else if(n == 2){
      document.getElementById("overlay-inner").innerHTML = "<span style='color: red;'>エラーです.<br>ページを再読み込みします。<br>入力しなおしてください</span><br><button id=close-btn type=button onclick=location.href='E-CP6.php'>再読み込み</button>";
  }
}      
  </script>





</body>