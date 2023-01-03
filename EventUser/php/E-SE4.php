<!DOCTYPE html>
<html>
<head>
  <title>画面ID E-SE4</title>
  <meta charset=”UTF-8″>
  <link rel="stylesheet" href="E-SE4.css" type="text/css">
  <link rel="stylesheet" href="E-menu.css" type="text/css">
  
</head>
<body bgcolor="#f0f8ff">
  <main id="main">
    <button type="button" class="button_back" onclick="history.back()"><h3>＜</h3></button><h3 class="button_back">投稿イベント</h3>
    <p class="post_day">投稿日</p>
<div class="yoko">
  <ul>
  <li><div class="event_information">
    <img src = 'monkt.png' class="circle" align="left" alt="アイコン" width="100%" height="100%">
    
    <div class="title">
    題名
    </div>

    <p>本文の内容</p>
    <!--費用に関しては必須でないのでデータがない場合には表示されないようになっている。-->
    <p>費用</p>
    <p>開催日時</p>
    <p>開催場所</p>
    <center id="image_area">
    </center>

    
  </div></li>
  </ul>

<button id="open-btn" class="overlay-event" type="button">消去する</button>
</div>

<div id="overlay" class="overlay-event">
  <div class="flex">
    <div id="overlay-inner">
      <p>選択した投稿を消去します。</p>
      <p>本当によろしいですか。</p>
      <!--idはデザイン-->
<form action="#" method="post">
      <button id="close-btn" name="eventdelay-yes" type=button onClick="disp()">はい</button>
</form>
      <!--はいを押したら消去機能呼び出し-->
      <button id="close-btn" class="overlay-event" type=button>いいえ</button>
    </div>
  </main>
  
  <aside id="sub">
  
    <ul>
      <li class="menu-list"><a class="menu-button" href="E-EL1.html"><img src="E-menu-home.png" width="45" height="43">　ホーム</a></li><br>
      <li class="menu-list"><a class="menu-button" href="E-CB1.php"><img src="E-menu-post.png" width="45" height="43">　イベント投稿</a></li><br>
      <li class="menu-list"><a class="menu-button" href="E-SE1.php"><img src="E-menu-see.png" width="45" height="43">　投稿イベント<br>　　　一覧・消去</a></li><br>
      <li class="menu-list"><a class="menu-button" href="E-AC3.php"><img src="E-menu-acount.png" width="45" height="43">　アカウント</a></li><br>
    </ul>
  </aside>
  
<script>
  //画像の文字列はphpで用意する
const images = ['neko.jpg', 'naruto.jpg'];
const content_area = document.getElementById("image_area");
for (var count = 0; count < 2; count++) {
let img_add = document.createElement('img');
img_add.src = images[count];
img_add.alt = 'さいくん'; // 代替テキスト
img_add.width = 400; // 横サイズ（px） 


content_area.appendChild(img_add);
}
</script>


  <script>
    //nが1の時処理が完了・nが2の時処理にエラー
    n=1;
function disp() {
    if(n == 1){
        document.getElementById("overlay-inner").innerHTML = "<span style='color: red;'>完了しました<br></span><br><button id=close-btn type=button onclick=location.href='E-SE1.php'>完了</button>";
    }else if(n == 2){
        document.getElementById("overlay-inner").innerHTML = "<span style='color: red;'>エラーです.<br>ページを再読み込みします。</span><br><button id=close-btn type=button onclick=location.href='E-SE4.php'>再読み込み</button>";
    }
}      
    </script>



<script>
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
</script>

</body>
</html>