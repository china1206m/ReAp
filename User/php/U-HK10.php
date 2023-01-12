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

    <form action="U-HK6.php" method="post" enctype="multipart/form-data">
    

    <ol id="place_list">
        <li>
            <div class="plan_information">
            <input type="text" name="plan_place1" class="plan_place" value="" placeholder="場所名を入力　必須" required>

            <textarea name="plan_content1" class="plan_content" minlength="1" maxlength="1000" placeholder="本文内容を入力(1000文字以内)　必須" required></textarea>
            
            <input type="text" name="plan_time1" class="plan_time" value="" placeholder="滞在時間を入力　必須" required>

            <select class="plan_time2" name="plan_time_mh1">
                <option value="minutes">分</option>
                <option value="hour">時間</option>
            </select>

            <input type="file" accept="image/jpeg,image/png" name="plan_image1" class="plan_image" multiple/>
            </div>

            <input type="text" name="travel_time1" class="travel_time" value="" placeholder="移動時間を入力　必須" required>
            <select class="plan_time2" name="travel_time_mh1">
                <option value="minutes">分</option>
                <option value="hour">時間</option>
            </select>
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
      <li class="menu-list"><a class="menu-button" href="U-HK1.php"><img class="menu_img" src="U-menu-home.png" >　ホーム</a></li><br>
      <li class="menu-list"><a class="menu-button" href="U-PL1.php"><img class="menu_img" src="U-menu-place.png">　名所</a></li><br>
      <li class="menu-list"><a class="menu-button" href="U-EV1.php"><img class="menu_img" src="U-menu-event.png">　イベント</a></li><br>
      <li class="menu-list"><a class="menu-button" href="U-FV1.php"><img class="menu_img" src="U-menu-favorite.png">　お気に入り</a></li><br>
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

        //olの追加
        var ol = document.getElementById("place_list");

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

        var input_time = document.createElement('input');
        input_time.type = "text";
        input_time.setAttribute('name','plan_time' + count);
        input_time.classList.add("plan_time");
        input_time.placeholder = "場所名を入力";
        input_time.required = true;

        var input_time2 = document.createElement('select');
        input_time2.classList.add("plan_time2");
        input_time2.setAttribute('name','plan_time_mh' + count);
        var option_minutes = document.createElement('option');
        option_minutes.text = "分";
        var option_hour = document.createElement('option');
        option_hour.text = "時";

        var input_img = document.createElement('input');
        input_img.type = "file";
        input_img.setAttribute('name','plan_image' + count);
        input_img.classList.add("plan_image");  
        input_img.multiple = true;

        var input_traveltime = document.createElement('input');
        input_traveltime.type = "text";
        input_traveltime.setAttribute('name','travel_time' + count);
        input_traveltime.classList.add("travel_time");  
        input_traveltime.placeholder = "移動時間を入力";
        input_traveltime.required = true;

        var input_traveltime2 = document.createElement('select');
        input_traveltime2.classList.add("plan_time2");
        input_traveltime2.setAttribute('name','travel_time_mh' + count);
        var option_minutes2 = document.createElement('option');
        option_minutes2.text = "分";
        var option_hour2 = document.createElement('option');
        option_hour2.text = "時";


        ol.appendChild(li);
        li.appendChild(div);
        div.appendChild(input_place);
        div.appendChild(textarea_content);
        div.appendChild(input_time);
        div.appendChild(input_time2);
        input_time2.appendChild(option_minutes);
        input_time2.appendChild(option_hour);
        div.appendChild(input_img);
        li.appendChild(input_traveltime);
        li.appendChild(input_traveltime2);
        input_traveltime2.appendChild(option_minutes2);
        input_traveltime2.appendChild(option_hour2);


    }
</script>



  </body>
  </html>