<?php
session_start();

if(!isset($_SESSION['eventuser_id'])){
  $_SESSION['login_message'] = 'ログインしてください';
  header('Location:E-AC4.php');
  exit;
}

include "MG.php";

$eventuser_id = $_SESSION['eventuser_id'];

$today = date("Y-m-d");

$db = getDB();
$sql = "SELECT * FROM coupon WHERE eventuser_id = ? AND coupon_deadline <= ? LIMIT 50";
$stmt = $db->prepare($sql);
$stmt->bindValue(1,$eventuser_id);
$stmt->bindValue(2,$today);
$stmt->execute();

$count1 = $stmt->rowCount();
if($count1 == 0) {
  $_SESSION['coupon'] = '期限切れのクーポンはありません。';
}

$coupon = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  include "MD.php";
  $delete = new md();
  $type = [0];
  for($i = 0; $i < $count1; $i++) {
    $delete->delete("coupon", "coupon_id", $coupon[$i]['coupon_id'], $type); 
    $delete->delete("get_coupon", "coupon_id", $coupon[$i]['coupon_id'], $type);
  }
  header('Location:E-CP9.php');
  exit;
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>画面ID E-CP9</title>
  <meta charset=”utf-8″>
  <link rel="stylesheet" href="E-CP9.css" type="text/css">
  <link rel="stylesheet" href="E-menu.css" type="text/css">
</head>
<body>

<main id="main">
    <button type="button" class="button_back" onclick="history.back()"><h3>＜</h3></button><h3 class="button_back">期限切れクーポン</h3>

    <p class="non">
      <?php
        if (isset($_SESSION['coupon'])) {
          echo($_SESSION['coupon']);
        }
      ?>
    </p>

    
<div class="yoko-narabi">

    <ul id="coupon_list1">
            
    </ul>

    <ul id="coupon_list2">
        
    </ul>

</div>

<center>
<button id="open-btn" class="overlay-event" type="button">全て消去する</button>
</center>

<form action="" method="POST" id="form1">
<div id="overlay">
    <div class="flex">
      <div id="overlay-inner">
        <p>選択した投稿を消去します。</p>
        <p>本当によろしいですか。</p>
        <!--idはデザイン-->
        <button id="close-btn" class="send-btn" disabled>はい</button>
        
        <!--はいを押したら消去機能呼び出し-->
        <button id="close-btn" class="close" type=button disabled>いいえ</button>
       </div>
    </div>
</div>
</form>
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
//nは表示数
    var n=8;
    // phpで文字列に改行を入れて作成する　下のcountry,shopはphpで作成するもの
  //var day = ['期限１', '期限２', '期限３', '期限４', '期限５'];
  //var shop = ['店名１', '店名２', '店名３', '店名４', '店名５'];
  //var content = ['内容１', '内容２', '内容３', '内容４', '内容５'];

var ul1 = document.getElementById("coupon_list1");

  <?php 

    for ($i = 0; $i < $count1; $i=$i + 2) :

  ?>

    // li要素を作成
    var li1 = document.createElement('li');

    var button1 = document.createElement('button');
    button1.classList.add("coupon");

    var div_left = document.createElement('div');
    div_left.classList.add("left");

    var div_shop = document.createElement('div');
    div_shop.classList.add("shop");

    var div_price = document.createElement('div');
    div_price.classList.add("price");

    var div_right = document.createElement('div');
    div_right.classList.add("right");

    var div_date = document.createElement('div');
    div_date.classList.add("date");
    div_date.innerText = "有効期限";


    // テキスト情報を作成
    var shopname = document.createTextNode("<?php print($coupon[$i]['coupon_place']); ?>");
    var date = document.createTextNode("<?php print($coupon[$i]['coupon_deadline']); ?>");
    var cont = document.createTextNode("<?php print($coupon[$i]['coupon_name']); ?>");
    var br1 = document.createElement('br');
    var br2 = document.createElement('br');
    var br3 = document.createElement('br');
    

    // ul要素に追加
    ul1.appendChild(li1);
    li1.appendChild(button1);
    button1.appendChild(div_left);
    div_left.appendChild(div_shop);
    div_shop.appendChild(shopname);
    div_left.appendChild(div_price);
    div_price.appendChild(br1);
    div_price.appendChild(br2);
    div_price.appendChild(cont);
    button1.appendChild(div_right);
    div_right.appendChild(div_date);
    div_date.appendChild(br3);
    div_date.appendChild(date);
   
      <?php endfor; ?>

var ul2 = document.getElementById("coupon_list2");

  <?php 

    for ($i = 1; $i < $count1; $i=$i + 2) :

  ?>

    // li要素を作成
    var li1 = document.createElement('li');

    var button1 = document.createElement('button');
    button1.classList.add("coupon");

    var div_left = document.createElement('div');
    div_left.classList.add("left");

    var div_shop = document.createElement('div');
    div_shop.classList.add("shop");

    var div_price = document.createElement('div');
    div_price.classList.add("price");

    var div_right = document.createElement('div');
    div_right.classList.add("right");

    var div_date = document.createElement('div');
    div_date.classList.add("date");
    div_date.innerText = "有効期限";


    // テキスト情報を作成
    var shopname = document.createTextNode("<?php print($coupon[$i]['coupon_place']); ?>");
    var date = document.createTextNode("<?php print($coupon[$i]['coupon_deadline']); ?>");
    var cont = document.createTextNode("<?php print($coupon[$i]['coupon_content']); ?>");
    var br1 = document.createElement('br');
    var br2 = document.createElement('br');
    var br3 = document.createElement('br');
    

    // ul要素に追加
    ul2.appendChild(li1);
    li1.appendChild(button1);
    button1.appendChild(div_left);
    div_left.appendChild(div_shop);
    div_shop.appendChild(shopname);
    div_left.appendChild(div_price);
    div_price.appendChild(br1);
    div_price.appendChild(br2);
    div_price.appendChild(cont);
    button1.appendChild(div_right);
    div_right.appendChild(div_date);
    div_date.appendChild(br3);
    div_date.appendChild(date);

      <?php endfor; ?>

</script>


<script>
var overlayev = document.getElementsByClassName("overlay-event");
  var send = document.getElementsByClassName("send-btn");
  var close = document.getElementsByClassName("close");

  //オーバーレイ開閉の関数
  const overlay = document.getElementById('overlay');
  function overlayToggle() {
    overlay.classList.toggle('overlay-on');
  }


  overlayev[0].addEventListener('click', function(){
    overlayev[0].setAttribute("disabled","");
    send[0].removeAttribute("disabled");
    close[0].removeAttribute("disabled");
    //オーバーレイ開く
    overlayToggle();
    return false;
  }, false);
  //'いいえ'が押されたとき
  close[0].addEventListener('click', function(){
    // ダブルクリック防止
    close[0].setAttribute("disabled","");
    overlayev[0].removeAttribute("disabled");
    //オーバーレイ閉じる
    overlayToggle();
 }, false);

  send[0].addEventListener('click', function(){
    // ダブルクリック防止
    send[0].setAttribute("disabled","");
    //フォーム送信
    document.forms.form1.submit();
  }, false); 

</script>


</body>
</html>

<?php
/* セッションの初期化 */
$_SESSION['coupon'] = '';
?>
