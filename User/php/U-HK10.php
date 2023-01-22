<?php
/* セッション開始 */
session_start();
 
/* POSTで送信されている */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 呼び出し
    include "MA.php";
    // addインスタンス生成
    $add = new MA();

    // 計画を追加した回数
    $count = $_POST['counter'];
    
    for($i = 1; $i <= $count; $i++) {
        if($i == 1) {
            // 入力したいカラム名を指定
            $column = ['plan_id','plan_place', 'plan_content', 'stay_time_hour', 'stay_time_minute', 'plan_image'];
            // 入力された値をpost配列に格納
            $post = [$_SESSION['plan_id'], $_POST["plan_place$i"], $_POST["plan_content$i"], $_POST["stay_time_hour$i"], $_POST["stay_time_minute$i"], 
            $_FILES["plan_image$i"]['tmp_name']];
            // 入力された値の型を定義
            $type = [0,1,1,0,0,1];
        } else {
            // 入力したいカラム名を指定
            $column = ['plan_id','plan_place', 'plan_content', 'stay_time_hour', 'stay_time_minute', 'plan_image', 
            'travel_time_hour', 'travel_time_minute'];
            // 入力された値をpost配列に格納
            $post = [$_SESSION['plan_id'], $_POST["plan_place$i"], $_POST["plan_content$i"], $_POST["stay_time_hour$i"], $_POST["stay_time_minute$i"], 
            $_FILES["plan_image$i"]['tmp_name'], $_POST["travel_time_hour2"], $_POST["travel_time_minute2"]];
            // 入力された値の型を定義
            $type = [0,1,1,0,0,1,0,0];
        }
        // 引数としてテーブル名、追加する値、追加する値の型 返り値としてID
        $_SESSION['user_detail_id'] = $add->ma_return("plan_detail",$column, $post, $type);        
    }
    // ホーム画面
    header('Location:U-HK6.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>画面ID U-HK10</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="U-HK10.css" type="text/css">
  <link rel="stylesheet" href="U-menu.css" type="text/css">
</head>
<body>
  <main id="main">
    <button type="button" class="button_back" onclick="history.back()"><h3>＜</h3></button><h3 class="button_back">投稿　詳細</h3>
    <div class="right"><button class="place_add" onclick="place_add()"><img src="U-home_add.png" alt="追加写真"></button></div>

    <form action="" method="POST" enctype="multipart/form-data">
    
    <input type="hidden" id="counter" name="counter" value="1">

    <ol id="place_list">
        <li>
            <div class="plan_information">

            <input type="text" name="plan_place1" class="plan_place" value="" placeholder="場所名を入力" required>

            <textarea name="plan_content1" class="plan_content" minlength="1" maxlength="1000" placeholder="本文内容を入力(1000文字以内)　必須" required></textarea>

            <br>
            <label>滞在時間：</label>
            
            <input type="number" name="stay_time_hour1" class="plan_time" value="" placeholder="" required>　時間
            <input type="number" name="stay_time_minute1" class="plan_time" value="" placeholder="" required>　分
            <input type="file" accept="image/jpeg,image/png" name="plan_image1" class="plan_image" multiple/>
            </div>

            
        </li>

    </ol>
    <center>
    <button type="submit" class="button-only" name="contribution">投稿</button>
    </center>
    </form>
</ul>
</main>

<aside id="sub">
    <ul class="menu">
      <li class="menu-list"><a class="menu-button" href="U-HK6.php"><img class="menu_img" src="U-menu-home.png" >　ホーム</a></li><br>
      <li class="menu-list"><a class="menu-button" href="U-PL1.html"><img class="menu_img" src="U-menu-place.png">　名所</a></li><br>
      <li class="menu-list"><a class="menu-button" href="U-EV1.php"><img class="menu_img" src="U-menu-event.png">　イベント</a></li><br>
      <li class="menu-list"><a class="menu-button" href="U-FV2.php"><img class="menu_img" src="U-menu-favorite.png">　お気に入り</a></li><br>
      <li class="menu-list"><a class="menu-button" href="U-AC3.php"><img class="menu_img" src="U-menu-acount.png">　アカウント</a></li><br>
      </ul>
  </aside>


  <script>

var count = 1;
function addCount(){
  count++;
}

    function place_add(){

        addCount();        

        var counter = document.getElementById("counter");
        console.log(counter.value);
        counter.value = count;
        console.log(counter.value);

        //olの追加
        var ol = document.getElementById("place_list");

        var center = document.createElement('center');

        var label_travel = document.createElement('label');
        label_travel.innerHTML="移動時間：";


        var input_traveltimeh = document.createElement('input');
        input_traveltimeh.type = "number";
        input_traveltimeh.setAttribute('name','travel_time_hour' + count);
        input_traveltimeh.classList.add("plan_time");  
        input_traveltimeh.required = true;

        var font_traveltime_h = document.createElement('font');
        font_traveltime_h.innerHTML = "　時間";

        var input_traveltimem = document.createElement('input');
        input_traveltimem.type = "number";
        input_traveltimem.setAttribute('name','travel_time_minute' + count);
        input_traveltimem.classList.add("plan_time");  
        input_traveltimem.required = true;

        var font_traveltime_m = document.createElement('font');
        font_traveltime_m.innerHTML = "　分";



        var li = document.createElement('li');

        var div = document.createElement('div');
        div.classList.add("plan_information");

        var input_place = document.createElement('input');
        input_place.type = "text";
        input_place.setAttribute('name','plan_place' + count);
        input_place.classList.add("plan_place"); 
        input_place.value = "";
        input_place.placeholder = "場所名を入力";
        input_place.required = true;

        var textarea_content = document.createElement('textarea');
        textarea_content.setAttribute('name','plan_content' + count);
        textarea_content.classList.add("plan_content"); 
        textarea_content.minLength = "1";
        textarea_content.maxLength = "1000";
        textarea_content.placeholder = "本文内容を入力(1000文字以内)";
        textarea_content.required = true;

        

        var br1 = document.createElement('br');

        var label_plan = document.createElement('label');
        label_plan.innerHTML="滞在時間：";

        var input_plantimeh = document.createElement('input');
        input_plantimeh.type = "number";
        input_plantimeh.setAttribute('name','stay_time_hour' + count);
        input_plantimeh.classList.add("plan_time");  
        input_plantimeh.required = true;

        var font_plantime_h = document.createElement('font');
        font_plantime_h.innerHTML = "　時間";

        var input_plantimem = document.createElement('input');
        input_plantimem.type = "number";
        input_plantimem.setAttribute('name','stay_time_minute' + count);
        input_plantimem.classList.add("plan_time");  
        input_plantimem.required = true;

        var font_plantime_m = document.createElement('font');
        font_plantime_m.innerHTML = "　分";



        var input_img = document.createElement('input');
        input_img.type = "file";
        input_img.setAttribute('name','plan_image' + count);
        input_img.classList.add("plan_image");  
        input_img.multiple = true;
        input_img.accept = "image/jpeg,image/png";

        

       


        ol.appendChild(center);
        center.appendChild(label_travel);
        center.appendChild(input_traveltimeh);
        center.appendChild(font_traveltime_h);
        center.appendChild(input_traveltimem);
        center.appendChild(font_traveltime_m);
        ol.appendChild(li);
        li.appendChild(div);
        div.appendChild(input_place);
        div.appendChild(textarea_content);
        div.appendChild(br1);
        div.appendChild(label_plan);
        div.appendChild(input_plantimeh);
        div.appendChild(font_plantime_h);
        div.appendChild(input_plantimem);
        div.appendChild(font_plantime_m);


        div.appendChild(input_img);
        
        


    }
</script>



  </body>
  </html>

  <?php
/* セッションの初期化 */
$_SESSION['for'] = '';
?>