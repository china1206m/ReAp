<?php
session_cache_limiter("none");
session_start();
if(!isset($_SESSION['user_id'])) {
    $_SESSION['login_message'] = 'ログインしてください';
    header('Location:U-AC6.php');
    exit;
}
include "MG.php";

$coupon_search = $_SESSION['coupon_search'];
//$coupon_name = $_SESSION['coupon_name'];
$coupon_prefectures = $_SESSION['coupon_prefectures'];
$coupon_place = $_SESSION['coupon_place'];
$coupon_deadline = $_SESSION['coupon_deadline'];

$db = MG_13("",$coupon_search,$coupon_prefectures,$coupon_place,$coupon_deadline);

$count1 = $db->rowCount();

$coupon = $db->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $counter = $_POST['counter'];
    $coupon_id = $coupon[$counter]['coupon_id'];
    $_SESSION['coupon_id'] = $coupon_id;
    header('Location:U-AC16.php');
  }

?>

<!DOCTYPE html>
<html lang = "ja">
    <head>
        <title>U-AC11</title>
        <meta charset = "UTF-8">
        <link rel="stylesheet" href = "U-AC11.css">
        <link rel="stylesheet" href="U-menu.css" type="text/css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    </head>

    <body>
    <main id="main">
        <i class="fas fa-less-than less fa-3x" onclick="history.back()"></i>
        <form action='' method="POST">
        <input type="hidden" id="counter" name="counter" value="0">
        <div align="center">
            <font size="+4">
                クーポン一覧
            </font>

            <p class="non">
              <?php
                if($count1 == 0){
                  echo '検索条件に合致するクーポンはありません';
                }
              ?>
            </p>

            <ul id="coupon_list">
            </ul>   
        </div>
    </form>  
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
    var ul = document.getElementById("coupon_list");

<?php for ($i = 0; $i < $count1; $i++) : ?>
// li要素を作成
var li = document.createElement('li');

var button1 = document.createElement('button');
button1.type = "submit";
button1.classList.add("coupon");
button1.setAttribute('id', <?php print($i); ?>);
button1.setAttribute('onclick','button(this.id)');

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
    ul.appendChild(li);
    li.appendChild(button1);
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
        
        function button(clicked_id){
        var s = clicked_id;
        var counter = document.getElementById("counter");
        counter.value = s;
    }

    </script>
        
        
    </body>
</html>