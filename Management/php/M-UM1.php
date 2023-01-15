<!DOCTYPE html>
<html>
<head>
  <title>画面ID M-UM1</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="M-UM1.css" type="text/css">
  <link rel="stylesheet" href="M-menu.css" type="text/css">
</head>
<body>

<main id="main">
    <h3>ユーザ管理</h3>

<div class="tabbox">
    <input type="radio" name="tabset" id="tabcheck1" checked><label for="tabcheck1" class="tab">利用者</label>
    <input type="radio" name="tabset" id="tabcheck2"><label for="tabcheck2" class="tab">イベント投稿者</label>
    <input type="radio" name="tabset" id="tabcheck3"><label for="tabcheck3" class="tab">管理者</label>

    <div class="tabcontent" id="tabcontent1">

    <form action="M-UM1.php" method="POST" name="searchForm1" onSubmit="return check1();">
        <!--検索のための表示場所-->
        ユーザID：
        <input type="text" name="user_id" class="search_user" value="">
        ユーザ名：
        <input type="text" name="user_name" class="search_user" maxlength="30" placeholder="30文字以内">
        メールアドレス：
        <input type="email" name="user_mail" class="search_user" placeholder="〇〇〇＠△△">
        <p>
        投稿通報回数：
        <input type="number" name="report_total" class="search_count" >
        停止回数：
        <input type="number" name="stop_total" class="search_count" >
        <button class="button-only">検索</button></p>
        </form>
    
        <form action="#" method="POST" onSubmit="return check();">
        <!--一覧のための表示場所-->
        <div class="UM-title-yoko">
            <ul id="user_id"><li class="tite">ユーザID</li></ul>
            <ul id="user_name"><li class="tite">ユーザ名</li></ul>
            <ul id="user_mail"><li class="tite">メールアドレス</li></ul>
            <ul id="report_count_u"><li class="tite">通報回数</li></ul>
            <ul id="stop_count_u"><li class="tite">停止回数</li></ul>
            <ul id="condition_u"><li>　</li></ul>
                
        </div>
        </form>
    </div>

    <div class="tabcontent" id="tabcontent2">
        <form action="M-UM1.php" method="POST" name="searchForm2" onSubmit="return check2();">
        <!--検索のための表示場所-->
        ユーザID：
        <input type="text" name="eventuser_id" class="search_user" value="">
        ユーザ名：
        <input type="text" name="eventuser_name" class="search_user" maxlength="30" placeholder="30文字以内">
        メールアドレス：
        <input type="email" name="eventuser_mail" class="search_user" placeholder="〇〇〇＠△△">
        <button type="submit" class="button-only">検索</button>
        </form>

        <form action="#" method="POST" onSubmit="return check();">
        <!--一覧のための表示場所-->
        <div class="UM-title-yoko">
            <ul id="event_id"><li class="tite">ユーザID</li></ul>
            <ul id="event_name"><li class="tite">ユーザ名</li></ul>
            <ul id="event_mail"><li class="tite">メールアドレス</li></ul>
            <ul id="report_count_e"><li class="tite">通報回数</li></ul>
            <ul id="stop_count_e"><li class="tite">停止回数</li></ul>
            <ul id="condition_e"><li>　</li></ul>
        </div>
        </form>
    </div>


    <div class="tabcontent" id="tabcontent3">
        <form action="M-UM1.php" method="POST" name="searchForm3" onSubmit="return check3();">
        <!--検索のための表示場所-->
        管理者ID：
        <input type="text" name="administator_id" class="search_user" value="">
        管理者名：
        <input type="text" name="administator_name" class="search_user" maxlength="30" placeholder="30文字以内">
        <button type="submit" class="button-only">検索</button>
        </form>

        <form action="#" method="POST" onSubmit="return check();">
        <!--一覧のための表示場所-->
        <div class="UM-title-yoko">
            <ul id="manage_id"><li class="tite">ユーザID</li></ul>
            <ul id="manage_name"><li class="tite">ユーザ名</li></ul>
            <ul id="manage_mail"><li class="tite">メールアドレス</li></ul>
            <ul id="report_count_m"><li class="tite">通報回数</li></ul>
            <ul id="stop_count_m"><li class="tite">停止回数</li></ul>
            <ul id="condition_m"><li>　</li></ul>
                
        </div>
    </form>
    </div>
       
</div>


<div style="display: block;" id="overlay">
    <div class="flex">
      <div id="overlay-inner">
          選択したユーザを消去します。<br>
          本当によろしいですか。<br>
        <button id="close-btn" type="submit" onClick="disp()">はい</button>
      </form>
        <!--はいを押したら消去機能呼び出し-->
        <button id="close-btn" class="close" type=button>いいえ</button>
      </div>
    </div>
  </div>
</main>

<aside id="sub">
    <ul>
        <li class="menu-list"><a class="menu-button" href="M-HK1.php.html"><img src="M-menu-home.png" width="45" height="43">　ホーム</a></li><br>
        <li class="menu-list"><a class="menu-button" href="M-PL1.php"><img src="M-menu-place.png" width="45" height="43">　名所</a></li><br>
        <li class="menu-list"><a class="menu-button" href="M-EV1.php"><img src="M-menu-event.png" width="45" height="43">　イベント</a></li><br>
        <li class="menu-list"><a class="menu-button" href="M-RP1.php"><img src="M-menu-report.png" width="45" height="43">　通報一覧</a></li><br>
        <li class="menu-list"><a class="menu-button" href="M-CP1.php"><img src="M-menu-coupon.png" width="45" height="43">　クーポン</a></li><br>
        <li class="menu-list"><a class="menu-button" href="M-UM1.php"><img src="M-menu-acount.png" width="45" height="43">　ユーザ管理</a></li><br>
    </ul>
</aside>

<script>
    //検索箇所のscript（利用者）
    function check1 () {
    var id_u = document.searchForm1.user_id.value;
    var name_u = document.searchForm1.user_name.value;
    var mail_u = document.searchForm1.user_mail.value;
    var report_count_u = document.searchForm1.report_total.value;
    var stop_count_u = document.searchForm1.stop_total.value;
    
    
    if ( id_u == "" && name_u == "" && mail_u == "" && report_count_u == "" && stop_count_u == "") {
    alert ( "検索したい項目を入力してください。" );
    document.searchForm1.user_id.focus();
    return false;
    }
    return true;
    }
</script>

<script>
    //検索箇所のscript（イベント投稿者）
    function check2 () {
    var id_e = document.searchForm2.eventuser_id.value;
    var name_e = document.searchForm2.eventuser_name.value;
    var mail_e = document.searchForm2.eventuser_mail.value;
    
    if ( id_e == "" && name_e == "" && mail_e == "") {
    alert ( "検索したい項目を入力してください。" );
    document.searchForm2.eventuser_id.focus();
    return false;
    }
    return true;
    }
</script>

<script>
    //検索箇所のscript（管理者）
    function check3 () {
    var id_m = document.searchForm3.administator_id.value;
    var name_m = document.searchForm3.administator_name.value;
    
    if ( id_m == "" && name_m == "") {
    alert ( "検索したい項目を入力してください。" );
    document.searchForm3.administator_id.focus();
    return false;
    }
    return true;
    }
</script>

<script>
    //一覧表示のためのscript（利用者）
for (var count = 1; count < 6; count++) {
    var ul_id1 = document.getElementById("user_id");
    var li_id1 = document.createElement('li');
    li_id1.innerText = "佐藤猛"
    li_id1.classList.add("list_u");

    var ul_name1 = document.getElementById("user_name");
    var li_name1 = document.createElement('li');
    li_name1.innerText = "佐藤猛"
    li_name1.classList.add("list_u");

    var ul_mail1 = document.getElementById("user_mail");
    var li_mail1 = document.createElement('li');
    li_mail1.innerText = "佐藤猛"
    li_mail1.classList.add("list_u");

    var ul_report1 = document.getElementById("report_count_u");
    var li_report1 = document.createElement('li');
    li_report1.innerText = "佐藤猛"
    li_report1.classList.add("list_u");

    var ul_stop1 = document.getElementById("stop_count_u");
    var li_stop1 = document.createElement('li');
    li_stop1.innerText = "佐藤猛"
    li_stop1.classList.add("list_u");

    var ul_condition1 = document.getElementById("condition_u");
    var li_condition1 = document.createElement('li');

    var input_revival = document.createElement('input');
    input_revival.type = "radio";
    input_revival.name = "situation_u"+count;
    input_revival.value = "1";
    input_revival.id = "revival_u"+count;
    var label_revival = document.createElement('label');
    label_revival.innerText = "復活"+count;
    label_revival.classList.add("situation");
    label_revival.htmlFor ="revival_u"+count;

    var input_suspension = document.createElement('input');
    input_suspension.type = "radio";
    input_suspension.name = "situation_u"+count;
    input_suspension.value = "2";
    input_suspension.id  = "suspension_u"+count;
    var label_suspension = document.createElement('label');
    label_suspension.innerText = "停止"+count;
    label_suspension.classList.add("situation");
    label_suspension.htmlFor = "suspension_u"+count;

    var button_delete = document.createElement('button');
    button_delete.type = "submit";
    button_delete.classList.add("situation_button");
    button_delete.classList.add("overlay-event");
    button_delete.innerHTML = "消去";

    
    ul_id1.appendChild(li_id1);
    ul_name1.appendChild(li_name1);
    ul_mail1.appendChild(li_mail1);
    ul_report1.appendChild(li_report1);
    ul_stop1.appendChild(li_stop1);
    ul_condition1.appendChild(li_condition1);
    li_condition1.appendChild(input_revival);
    li_condition1.appendChild(label_revival);
    li_condition1.appendChild(input_suspension);
    li_condition1.appendChild(label_suspension);
    li_condition1.appendChild(button_delete);
    
    
    
}
</script>

<script>
//ｓの文字列において1の時復活状態・2の時停止状態になる
//phpで文字列作成
    s=[1,2,2,1,2];
for (var count = 1; count < 6; count++) {
const elements = document.getElementsByName("situation_u"+count);
const len = elements.length;

/**
 * 画面読み込み時に実行される処理
 */
 (() => {
  // 例：DBから値を取得した値をフロントに渡す
  var a = 0;
  if(s[count-1] == 1){
 a=1;
    }else if(s[count-1] == 2){
 a=2;
  }

  
  for (let i = 0; i < len; i++){
    if (elements.item(i).value == a){
      elements.item(i).checked = true;
    }
  }
})();
}
</script>




<script>
    //一覧表示のためのscript（イベント投稿者）
    for (var count = 1; count < 6; count++) {
        var ul_id1 = document.getElementById("event_id");
        var li_id1 = document.createElement('li');
        li_id1.innerText = "佐藤猛"
        li_id1.classList.add("list_u");

        var ul_name1 = document.getElementById("event_name");
        var li_name1 = document.createElement('li');
        li_name1.innerText = "佐藤猛"
        li_name1.classList.add("list_u");

        var ul_mail1 = document.getElementById("event_mail");
        var li_mail1 = document.createElement('li');
        li_mail1.innerText = "佐藤猛"
        li_mail1.classList.add("list_u");

        var ul_report1 = document.getElementById("report_count_e");
        var li_report1 = document.createElement('li');
        li_report1.innerText = "佐藤猛"
        li_report1.classList.add("list_u");

        var ul_stop1 = document.getElementById("stop_count_e");
        var li_stop1 = document.createElement('li');
        li_stop1.innerText = "佐藤猛"
        li_stop1.classList.add("list_u");
        
    
        var ul_condition1 = document.getElementById("condition_e");
        var li_condition1 = document.createElement('li');
    
        var button_delete = document.createElement('button');
        button_delete.type = "submit";
        button_delete.classList.add("situation_button");
        button_delete.innerHTML = "消去";
        button_delete.classList.add("overlay-event");
        
        ul_id1.appendChild(li_id1);
        ul_name1.appendChild(li_name1);
        ul_mail1.appendChild(li_mail1);
        ul_report1.appendChild(li_report1);
        ul_stop1.appendChild(li_stop1);
        ul_condition1.appendChild(li_condition1);
        li_condition1.appendChild(button_delete);

    }
    </script>



<script>
    //一覧表示のためのscript（管理者）
    for (var count = 1; count < 6; count++) {
        var ul_id1 = document.getElementById("manage_id");
        var li_id1 = document.createElement('li');
        li_id1.innerText = "佐藤猛"
        li_id1.classList.add("list_u");

        var ul_name1 = document.getElementById("manage_name");
        var li_name1 = document.createElement('li');
        li_name1.innerText = "佐藤猛"
        li_name1.classList.add("list_u");

        var ul_mail1 = document.getElementById("manage_mail");
        var li_mail1 = document.createElement('li');
        li_mail1.innerText = "佐藤猛"
        li_mail1.classList.add("list_u");

        var ul_report1 = document.getElementById("report_count_m");
        var li_report1 = document.createElement('li');
        li_report1.innerText = "佐藤猛"
        li_report1.classList.add("list_u");

        var ul_stop1 = document.getElementById("stop_count_m");
        var li_stop1 = document.createElement('li');
        li_stop1.innerText = "佐藤猛"
        li_stop1.classList.add("list_u");
        
    
        var ul_condition1 = document.getElementById("condition_m");
        var li_condition1 = document.createElement('li');
    
        var button_delete = document.createElement('button');
        button_delete.type = "submit";
        button_delete.classList.add("situation_button");
        button_delete.innerHTML = "消去";
        button_delete.classList.add("overlay-event");
        
        
        ul_id1.appendChild(li_id1);
        ul_name1.appendChild(li_name1);
        ul_mail1.appendChild(li_mail1);
        ul_report1.appendChild(li_report1);
        ul_stop1.appendChild(li_stop1);
        ul_condition1.appendChild(li_condition1);
        li_condition1.appendChild(button_delete);
    }
    </script>

<script>
    function check () {
  
      // オーバレイを開閉する関数
      const overlay = document.getElementById('overlay');
      function overlayToggle() {
        overlay.classList.toggle('overlay-on');
      }
      overlayToggle();
    
      const clickArea = document.getElementsByClassName('close');
      for(let i = 0; i < clickArea.length; i++) {
        clickArea[i].addEventListener('click', overlayToggle, false);
      }
      return false;
  }
</script>

</body>