<!DOCTYPE html>
<html>
<head>
  <title>画面ID E-CP4</title>
  <meta charset=”utf-8″>
  <link rel="stylesheet" href="E-CP4.css" type="text/css">
  <link rel="stylesheet" href="E-menu.css" type="text/css">
  
</head>
<body>

<main id="main">
    <button type="button" class="button_back" onclick="history.back()"><h3>＜</h3></button><h3 class="button_back">検索結果</h3>


    <center>
    
    <hr class="top">
    <p class="coupon">都道府県：</p>
    <hr class="middle">
    <p class="coupon">　　店名：</p>
    <hr class="middle">
    <p class="coupon">使用期限：</p>
    <hr class="middle">
    <p class="coupon">　　詳細：</p>

    <hr class="under">
    

    <div class="delay">
    <button id="open-btn" class="overlay-event" name="coupon_delay" type="button">消去する</button>
    </div>

    <div id="overlay" class="overlay-event">
      <div class="flex">
      <form action="#" method="POST">
        <div id="overlay-inner">
          <p>選択した投稿を消去します。</p>
          <p>本当によろしいですか。</p>
          <!--idはデザイン-->
          <button id="close-btn" type=button onClick="disp()">はい</button>
          <!--はいを押したら消去機能呼び出し-->
          <button id="close-btn" class="overlay-event" type=button>いいえ</button>
        </div>
      </form>
    </center>



</main>

<aside id="sub">

  <ul>
        <li class="menu-list"><a class="menu-button" href="E-EL1.html"><img src="E-menu-home.png" width="45" height="43">　ホーム</a></li><br>
        <li class="menu-list"><a class="menu-button" href="E-CB1.php"><img src="E-menu-post.png" width="45" height="43">　イベント投稿</a></li><br>
        <li class="menu-list"><a class="menu-button" href="E-SE1.php"><img src="E-menu-see.png" width="45" height="43">　投稿イベント<br>　　　一覧・消去</a></li><br>
        <li class="menu-list"><a class="menu-button" href="E-CP1.php"><img src="E-menu-coupon.png" width="45" height="43">　クーポン</a></li><br>
        <li class="menu-list"><a class="menu-button" href="E-AC3.php"><img src="E-menu-acount.png" width="45" height="43">　アカウント</a></li><br>
  </ul>
</aside>

<script>
  //ｎ＝１は正常に消去　n＝２はエラー
  n=2;
function disp() {
  if(n == 1){
      document.getElementById("overlay-inner").innerHTML = "<span style='color: red;'>完了しました</span><br><button id=close-btn type=button onclick=location.href='E-CP1.html'>完了</button>";
  }else if(n == 2){
      document.getElementById("overlay-inner").innerHTML = "<span style='color: red;'>エラーです.<br>ページを再読み込みします。</span><br><button id=close-btn type=button onclick=location.href='E-CP4.php'>再読み込み</button>";
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