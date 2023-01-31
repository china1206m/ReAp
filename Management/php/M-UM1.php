<?php
session_cache_limiter("none");
session_start();

$user_id = $_SESSION['user_id'];
$user_mail = $_SESSION['user_mail'];
$user_name = $_SESSION['user_name'];
$report_total = $_SESSION['report_total'];
$stop_total = $_SESSION['stop_total'];

$_SESSION['user_id'] = "";
$_SESSION['user_name'] = "";
$_SESSION['user_mail'] = "";
$_SESSION['report_total'] = "";
$_SESSION['stop_total'] = "";

include "MG.php";
include "MU.php";
include "MD.php";

$db = MG_01($user_id,$user_mail,"",$user_name,"","","",$report_total,$stop_total,"");
$count1 = $db->rowCount();

$user = $db->fetchAll(PDO::FETCH_ASSOC);

//-------------------------------------------------------------------------------------------------

$eventuser_id = $_SESSION['eventuser_id'];
$eventuser_name = $_SESSION['eventuser_name'];
$eventuser_mail = $_SESSION['eventuser_mail'];

$_SESSION['eventuser_id'] = "";
$_SESSION['eventuser_name'] = "";
$_SESSION['eventuser_mail'] = "";

$db = MG_02($eventuser_id,$eventuser_mail,"",$eventuser_name,"","","","","","");
$count2 = $db->rowCount();

$eventuser = $db->fetchAll(PDO::FETCH_ASSOC);

//-------------------------------------------------------------------------------------------------

$administrator_id = $_SESSION['administrator_id'];
$administrator_name = $_SESSION['administrator_name'];

$_SESSION['administrator_id'] = "";
$_SESSION['administrator_name'] = "";

$db = MG_03($administrator_id,"",$administrator_name);
$count3 = $db->rowCount();

$administrator = $db->fetchAll(PDO::FETCH_ASSOC);

//$_POST['table']で消去するアカウントテーブル指定
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if($_POST['flag'] == 1){
    //検索の場合

    $_SESSION['user_id'] = $_POST['user_id'];
    $_SESSION['user_name'] = $_POST['user_name'];
    $_SESSION['user_mail'] = $_POST['user_mail'];
    $_SESSION['report_total'] = $_POST['report_total'];
    $_SESSION['stop_total'] = $_POST['stop_total'];
    header('Location:M-UM1.php');
  } else if($_POST['flag'] == 2){
    //復活停止の場合

    $counter = $_POST['counter'];
    $user_id = $user[$counter]['user_id'];
    $db = MG_01($user_id,"","","","","","","","","");
    $userr = $db->fetchAll(PDO::FETCH_ASSOC);

    if($userr[0]['user_stop'] == 0){
      $update = new MU();
      $colum = ['user_stop'];
      $post = [1];
      $type = [1];
      $id_name = "user_id";
      $id = $user_id;
      $update->update("user", $colum, $post, $type, $id_name, $id);
      header('Location:M-UM1.php');
    }else if($userr[0]['user_stop'] == 1){

      print($counter);
      print($user_id);
      $update = new MU();
      $colum = ['user_stop'];
      $post = [0];
      $type = [1];
      $id_name = "user_id";
      $id = $user_id;
      $update->update("user", $colum, $post, $type, $id_name, $id);
      header('Location:M-UM1.php');
    }

    //$_POST['stop']=1なら停止,$_POST['stop']=0なら復活
  } else if($_POST['flag'] == 3){

    $counter = $_POST['counter1'];

    if($_POST['table']=="1"){
        $user_id = $user[$counter]['user_id'];

        $db = getDB();
        $sql = "DELETE FROM user WHERE user_id = ? ";
        $stmt = $db->prepare($sql);
        $stmt->bindValue(1,$user_id);
        $stmt->execute();
      }elseif($_POST['table']=="2"){
        $eventuser_id = $eventuser[$counter]['eventuser_id'];

        $db = getDB();
        $sql = "DELETE FROM eventuser WHERE eventuser_id = ? ";
        $stmt = $db->prepare($sql);
        $stmt->bindValue(1,$eventuser_id);
        $stmt->execute();
      }elseif($_POST['table']=="3"){
        $administrator_id = $administrator[$counter]['administrator_id'];
        
        $db = getDB();
        $sql = "DELETE FROM administrator WHERE administrator_id = ? ";
        $stmt = $db->prepare($sql);
        $stmt->bindValue(1,$administrator_id);
        $stmt->execute();
      }

      header('Location:M-UM1.php');
  } else if($_POST['flag'] == 4){

    $_SESSION['eventuser_id'] = $_POST['eventuser_id'];
    $_SESSION['eventuser_name'] = $_POST['eventuser_name'];
    $_SESSION['eventuser_mail'] = $_POST['eventuser_mail'];

    header('Location:M-UM1.php');

  } else if($_POST['flag'] == 5){

    $_SESSION['administrator_id'] = $_POST['administrator_id'];
    $_SESSION['administrator_name'] = $_POST['administrator_name'];

    header('Location:M-UM1.php');
  }
}

?>


<!DOCTYPE html>
<html>
<head>
  <title>画面ID M-UM1</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="M-UM1.css" type="text/css">
  <!--<link rel="stylesheet" href="M-menu.css" type="text/css">-->
</head>
<body>

<main id="main">
    <h3>ユーザ管理</h3>

<div class="tabbox">
    <input type="radio" name="tabset" id="tabcheck1" checked><label for="tabcheck1" class="tab">利用者</label>
    <input type="radio" name="tabset" id="tabcheck2"><label for="tabcheck2" class="tab">イベント投稿者</label>
    <input type="radio" name="tabset" id="tabcheck3"><label for="tabcheck3" class="tab">管理者</label>

    <div class="tabcontent" id="tabcontent1">

    <form action="" method="POST" name="searchForm1" onSubmit="return check1();">
        <!--検索のための表示場所-->
        <!--場合分け用input-->
        <input type="hidden" name="flag" value="1">
        ユーザID：
        <input type="number" name="user_id" class="search_user" value="">
        ユーザ名：
        <input type="text" name="user_name" class="search_user" maxlength="20" placeholder="20文字以内">
        メールアドレス：
        <input type="email" name="user_mail" class="search_user" maxlength="30" placeholder="〇〇〇＠△△">
        <p>
        投稿通報回数：
        <input type="number" name="report_total" class="search_count" >
        停止回数：
        <input type="number" name="stop_total" class="search_count" >
        <button class="button-only">検索</button></p>
        </form>
    
        <form action="" method="POST" id="stop_form">
        <input type="hidden" name="flag" value="2">
        <input type="hidden" id="stop" name="stop" value="0">
        <input type="hidden" id="counter" name="counter" value="0">
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
        <input type="hidden" name="flag" value="4">
        ユーザID：
        <input type="number" name="eventuser_id" class="search_user" value="">
        ユーザ名：
        <input type="text" name="eventuser_name" class="search_user" maxlength="20" placeholder="20文字以内">
        メールアドレス：
        <input type="email" name="eventuser_mail" class="search_user" maxlength="30" placeholder="〇〇〇＠△△">
        <button type="submit" class="button-only">検索</button>
        </form>


        <!--一覧のための表示場所-->
        <div class="UM-title-yoko">
            <ul id="event_id"><li class="tite">ユーザID</li></ul>
            <ul id="event_name"><li class="tite">ユーザ名</li></ul>
            <ul id="event_mail"><li class="tite">メールアドレス</li></ul>
            <ul id="report_count_e"><li class="tite">通報回数</li></ul>
            <ul id="stop_count_e"><li class="tite">停止回数</li></ul>
            <ul id="condition_e"><li>　</li></ul>
        </div>
  
    </div>


    <div class="tabcontent" id="tabcontent3">
        <form action="M-UM1.php" method="POST" name="searchForm3" onSubmit="return check3();">
        <!--検索のための表示場所-->
        <input type="hidden" name="flag" value="5">
        管理者ID：
        <input type="number" name="administrator_id" class="search_user" value="">
        管理者名：
        <input type="text" name="administrator_name" class="search_user" maxlength="20" placeholder="20文字以内">
        <button type="submit" class="button-only">検索</button>
        </form>

 
        <!--一覧のための表示場所-->
        <div class="UM-title-yoko">
            <ul id="manage_id"><li class="tite">ユーザID</li></ul>
            <ul id="manage_name"><li class="tite">ユーザ名</li></ul>
            <ul id="manage_mail"><li class="tite">メールアドレス</li></ul>
            <ul id="report_count_m"><li class="tite">通報回数</li></ul>
            <ul id="stop_count_m"><li class="tite">停止回数</li></ul>
            <ul id="condition_m"><li>　</li></ul>
                
        </div>

    </div>
       
</div>


<div style="display: block;" id="overlay">
    <div class="flex">
      <form action="" method="POST" id="delete_form">
      <input type="hidden" name="flag" value="3">
      <input type="hidden" id="table" name="table" value="1">
      <input type="hidden" id="counter1" name="counter1" value="0">
      <div id="overlay-inner">
          選択したユーザを消去します。<br>
          本当によろしいですか。<br>
        <button id="close-btn1" class="close" disabled>はい</button>
        <!--はいを押したら消去機能呼び出し-->
        <button id="close-btn2" class="close" type=button disabled>いいえ</button>
      </div>
      </form>
    </div>
  </div>
</main>

<aside id="sub">
    <ul>
    <li class="menu-list"><a class="menu-button" href="M-HK1.php"><img src="M-menu-home.png" width="45" height="43">　ホーム</a></li><br>
    <li class="menu-list"><a class="menu-button" href="M-PL1.html"><img src="M-menu-place.png" width="45" height="43">　名所</a></li><br>
    <li class="menu-list"><a class="menu-button" href="M-EV1.php"><img src="M-menu-event.png" width="45" height="43">　イベント</a></li><br>
    <li class="menu-list"><a class="menu-button" href="M-RP2.php"><img src="M-menu-report.png" width="45" height="43">　通報一覧</a></li><br>
    <li class="menu-list"><a class="menu-button" href="M-CP1.html"><img src="M-menu-coupon.png" width="45" height="43">　クーポン</a></li><br>
    <li class="menu-list"><a class="menu-button" href="M-UM1.php"><img src="M-menu-acount.png" width="45" height="43">　ユーザ管理</a></li><br>

    <li class="menu-list"><button type="button" class="menu-logout" onclick=location.href="M-AC2.php">ログアウト</a></li><br>
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

    <?php 

      for ($i = 0; $i < $count1; $i++) :

        $count = $i + 1;

    ?>

    var ul_id1 = document.getElementById("user_id");
    var li_id1 = document.createElement('li');
    li_id1.innerText = "<?php print($user[$i]['user_id']); ?>"
    li_id1.classList.add("list_u");

    var ul_name1 = document.getElementById("user_name");
    var li_name1 = document.createElement('li');
    li_name1.innerText = "<?php print($user[$i]['user_name']); ?>"
    li_name1.classList.add("list_u");

    var ul_mail1 = document.getElementById("user_mail");
    var li_mail1 = document.createElement('li');
    li_mail1.innerText = "<?php print($user[$i]['user_mail']); ?>"
    li_mail1.classList.add("list_u");

    var ul_report1 = document.getElementById("report_count_u");
    var li_report1 = document.createElement('li');
    li_report1.innerText = "<?php print($user[$i]['report_total']); ?>"
    li_report1.classList.add("list_u");

    var ul_stop1 = document.getElementById("stop_count_u");
    var li_stop1 = document.createElement('li');
    li_stop1.innerText = "<?php print($user[$i]['stop_total']); ?>"
    li_stop1.classList.add("list_u");

    var ul_condition1 = document.getElementById("condition_u");
    var li_condition1 = document.createElement('li');

    var stop = document.getElementById("stop");
    var button_revival = document.createElement('button');
    <?php if($user[$i]['user_stop']==0):?>
      button_revival.setAttribute("disabled","");
      stop.value = "1";
    <?php endif; ?>
    button_revival.type = "button";
    button_revival.classList.add("situation_button");
    button_revival.classList.add("stop_sus");
    button_revival.setAttribute('id', <?php print($i); ?>);
    button_revival.innerHTML = "復活";

    var button_suspension = document.createElement('button');
    <?php if($user[$i]['user_stop']==1):?>
      button_suspension.setAttribute("disabled","");
    <?php endif; ?>
    button_suspension.type = "button";
    button_suspension.classList.add("situation_button");
    button_suspension.classList.add("stop_sus");
    button_suspension.setAttribute('id', <?php print($i); ?>);
    button_suspension.innerHTML = "停止";

    var button_delete = document.createElement('button');
    button_delete.type = "button";
    button_delete.classList.add("situation_button");
    button_delete.classList.add("overlay-event1");
    button_delete.setAttribute('id', <?php print($i); ?>);
    button_delete.innerHTML = "消去";

    
    ul_id1.appendChild(li_id1);
    ul_name1.appendChild(li_name1);
    ul_mail1.appendChild(li_mail1);
    ul_report1.appendChild(li_report1);
    ul_stop1.appendChild(li_stop1);
    ul_condition1.appendChild(li_condition1);
    /*li_condition1.appendChild(input_revival);
    li_condition1.appendChild(label_revival);*/
    li_condition1.appendChild(button_revival);
    /*li_condition1.appendChild(input_suspension);
    li_condition1.appendChild(label_suspension);*/
    li_condition1.appendChild(button_suspension);
    li_condition1.appendChild(button_delete);
    
        <?php endfor; ?>
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
    <?php 

      for ($i = 0; $i < $count2; $i++) :  

    ?>
        var ul_id1 = document.getElementById("event_id");
        var li_id1 = document.createElement('li');
        li_id1.innerText = "<?php print($eventuser[$i]['eventuser_id']); ?>"
        li_id1.classList.add("list_u");

        var ul_name1 = document.getElementById("event_name");
        var li_name1 = document.createElement('li');
        li_name1.innerText = "<?php print($eventuser[$i]['eventuser_name']); ?>"
        li_name1.classList.add("list_u");

        var ul_mail1 = document.getElementById("event_mail");
        var li_mail1 = document.createElement('li');
        li_mail1.innerText = "<?php print($eventuser[$i]['eventuser_mail']); ?>"
        li_mail1.classList.add("list_u");

        var ul_report1 = document.getElementById("report_count_e");
        var li_report1 = document.createElement('li');
        li_report1.innerText = "-"
        li_report1.classList.add("list_u");

        var ul_stop1 = document.getElementById("stop_count_e");
        var li_stop1 = document.createElement('li');
        li_stop1.innerText = "-"
        li_stop1.classList.add("list_u");
        
    
        var ul_condition1 = document.getElementById("condition_e");
        var li_condition1 = document.createElement('li');
    
        var button_delete = document.createElement('button');
        button_delete.type = "button";
        button_delete.classList.add("situation_button");
        button_delete.setAttribute('id', <?php print($i); ?>);
        button_delete.innerHTML = "消去";
        button_delete.classList.add("overlay-event2");
        
        ul_id1.appendChild(li_id1);
        ul_name1.appendChild(li_name1);
        ul_mail1.appendChild(li_mail1);
        ul_report1.appendChild(li_report1);
        ul_stop1.appendChild(li_stop1);
        ul_condition1.appendChild(li_condition1);
        li_condition1.appendChild(button_delete);

    <?php endfor; ?>
    </script>



<script>
    //一覧表示のためのscript（管理者）

    <?php 

      for ($i = 0; $i < $count3; $i++) :  

    ?>

        var ul_id1 = document.getElementById("manage_id");
        var li_id1 = document.createElement('li');
        li_id1.innerText = "<?php print($administrator[$i]['administrator_id']); ?>"
        li_id1.classList.add("list_u");

        var ul_name1 = document.getElementById("manage_name");
        var li_name1 = document.createElement('li');
        li_name1.innerText = "<?php print($administrator[$i]['administrator_name']); ?>"
        li_name1.classList.add("list_u");

        var ul_mail1 = document.getElementById("manage_mail");
        var li_mail1 = document.createElement('li');
        li_mail1.innerText = "-"
        li_mail1.classList.add("list_u");

        var ul_report1 = document.getElementById("report_count_m");
        var li_report1 = document.createElement('li');
        li_report1.innerText = "-"
        li_report1.classList.add("list_u");

        var ul_stop1 = document.getElementById("stop_count_m");
        var li_stop1 = document.createElement('li');
        li_stop1.innerText = "-"
        li_stop1.classList.add("list_u");
        
    
        var ul_condition1 = document.getElementById("condition_m");
        var li_condition1 = document.createElement('li');
    
        var button_delete = document.createElement('button');
        button_delete.type = "button";
        button_delete.classList.add("situation_button");
        button_delete.setAttribute('id', <?php print($i); ?>);
        button_delete.innerHTML = "消去";
        button_delete.classList.add("overlay-event3");
        
        
        ul_id1.appendChild(li_id1);
        ul_name1.appendChild(li_name1);
        ul_mail1.appendChild(li_mail1);
        ul_report1.appendChild(li_report1);
        ul_stop1.appendChild(li_stop1);
        ul_condition1.appendChild(li_condition1);
        li_condition1.appendChild(button_delete);

        <?php endfor; ?>
    </script>

<script>
  var overlayev1 = document.getElementsByClassName("overlay-event1");
  var events1 = Array.from(overlayev1);
  var overlayev2 = document.getElementsByClassName("overlay-event2");
  var events2 = Array.from(overlayev2);
  var overlayev3 = document.getElementsByClassName("overlay-event3");
  var events3 = Array.from(overlayev3);
  var stop_sus = document.getElementsByClassName("stop_sus");
  var sus = Array.from(stop_sus);
  var close = document.getElementById("close-btn1");
  var close2 = document.getElementById("close-btn2");
  var counter = document.getElementById("counter");
  var counter1 = document.getElementById("counter1");

  // オーバレイを開閉する関数
  const overlay = document.getElementById('overlay');
      function overlayToggle() {
        overlay.classList.toggle('overlay-on');
      }

sus.forEach(function(e){

e.addEventListener('click', function(){
counter.value = e.id;
document.forms.stop_form.submit();
}, false);

})

//利用者消去用

  events1.forEach(function(e){

    e.addEventListener('click', function(){
    counter1.value = e.id;
    var table = document.getElementById("table");
    table.value = "1";
    e.setAttribute("disabled","");
    close.removeAttribute("disabled");
    close2.removeAttribute("disabled");
    //オーバーレイ開く
    overlayToggle();
    
    }, false);

  })

  //イベント投稿者消去用

  events2.forEach(function(e){

e.addEventListener('click', function(){
counter1.value = e.id;
var table = document.getElementById("table");
table.value = "2";
e.setAttribute("disabled","");
close.removeAttribute("disabled");
close2.removeAttribute("disabled");
//オーバーレイ開く
overlayToggle();

}, false);

})

//管理者消去用

events3.forEach(function(e){

e.addEventListener('click', function(){
counter1.value = e.id;
var table = document.getElementById("table");
table.value = "3";
e.setAttribute("disabled","");
close.removeAttribute("disabled");
close2.removeAttribute("disabled");
//オーバーレイ開く
overlayToggle();

}, false);

})

  



  //'いいえ'が押されたとき
  close2.addEventListener('click', function(){
    // ダブルクリック防止
    events1.forEach(function(e){
      e.removeAttribute("disabled");
    })
    events2.forEach(function(e){
      e.removeAttribute("disabled");
    })
    events3.forEach(function(e){
      e.removeAttribute("disabled");
    })
    close2.setAttribute("disabled","");
    //オーバーレイ閉じる
    overlayToggle();
 }, false);

  close.addEventListener('click', function(){
    // ダブルクリック防止
    close.setAttribute("disabled","");
    //フォーム送信
    document.forms.delete_form.submit();
  }, false);

</script>

</body>