<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" media="screen" href="M-CP9.css">
  <link rel="stylesheet" media="screen" href="M-menu.css">
  <title>M-CP9</title>
</head>

<body>
  <button type="button" class="button_back" onclick="history.back()"><h3>＜</h3></button><h3 class="button_back">期限切れクーポン</h3>

  <div class="yoko-narabi">
    <form action="E-AC4.php" method="POST">
        <ul id="coupon_list1">  
        </ul>
    </form> 
    <form action="E-AC4.php" method="POST">
        <ul id="coupon_list2">
        </ul>
    </form>
  </div>

  <button id="open-btn" class="overlay-event" type="button" align="right">消去する</button>

  <div id="overlay" class="overlay-event">
    <div class="flex">
      <div id="overlay-inner">
        <p>期限切れクーポンを消去します。</p>
        <p>本当によろしいですか。</p>
        <!--idはデザイン-->
        <button id="close-btn" type=button onClick="disp()">はい</button>
        <!--はいを押したら消去機能呼び出し-->
        <button id="close-btn" class="overlay-event" type=button>いいえ</button>
      </div>

  <script>
    var expired = 2;
    if (expired > 0) {
          // phpで文字列に改行を入れて作成する　下のcountry,shopはphpで作成するもの
  var country = ['店名１', '店名２', '店名３', '店名４', '店名５'];
  var shop = ['内容１', '内容２', '内容３', '内容４', '内容５'];

var ul1 = document.getElementById("coupon_list1");
for (var count = 0; count < 3; count=count+2) {
    // li要素を作成
    var li1 = document.createElement('li');

    var button1 = document.createElement('button');
    button1.classList.add("box1");

    // テキスト情報を作成
    var text = document.createTextNode(country[count]);
    var br = document.createElement('br');
    var shopname = document.createTextNode(shop[count]);

    // ul要素に追加
    li1.appendChild(button1);
    button1.appendChild(text);
    button1.appendChild(br);
    button1.appendChild(shopname);
    ul1.appendChild(li1);
}

var ul2 = document.getElementById("coupon_list2");
for (var count = 1; count < 3; count=count+2) {
    // li要素を作成
    var li2 = document.createElement('li');

    var button2 = document.createElement('button');
    button2.classList.add("box2");

    // テキスト情報を作成
    var text = document.createTextNode(country[count]);
    var br = document.createElement('br');
    var shopname = document.createTextNode(shop[count]);

    // ul要素に追加
    li2.appendChild(button2);
    button2.appendChild(text);
    button2.appendChild(br);
    button2.appendChild(shopname);
    ul2.appendChild(li2);
}
    } else {
      document.getElementById("no-expired").innerHTML ="現在期限切れクーポンはありません";
    }   

document.addEventListener('DOMContentLoaded', function(){

// オーバレイを開閉する関数
const overlay = document.getElementById('overlay');
function overlayToggle() {
  overlay.classList.toggle('overlay-on');
}
// 指定した要素に対して上記関数を実行するクリックイベントを設定
const clickArea = document.getElementsByClassName('overlay-event');
for(let i = 0; i < clickArea.length; i++) {
  clickArea[i].addEventListener('click', overlayToggle, false);
}

// イベントに対してバブリングを停止
function stopEvent(event) {
  event.stopPropagation();
}
const overlayInner = document.getElementById('overlay-inner');
overlayInner.addEventListener('click', stopEvent, false);

}, false);

n=2;
function disp() {
    if(n == 1){
        document.getElementById("overlay-inner").innerHTML = "<span style='color: red;'>完了しました</span>";
    }else if(n == 2){
        document.getElementById("overlay-inner").innerHTML = "<span style='color: red;'>エラーです</span>";
    }
}
  </script>
</body>
</html>