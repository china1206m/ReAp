<?php
// セッション開始
session_start();
include "MGvG.php";
$post = [null, null, null, null, null, null, $_SESSION['user_id']];
$db = MG("user", $post);
$coupon = $db->fetchAll(PDO::FETCH_ASSOC);
$coupn_count = $coupon[0]['coupon_can_get'];
if($coupn_count == 0) {
   header('Location:U-AC9.html');
    exit;
}
// POSTで送信されたら
if($_SERVER['REQUEST_METHOD'] === 'POST'){
  $_SESSION['coupon_prefectures'] = $_POST['ccoupon_prefectures'];
  // 取得クーポン一覧画面
  header('Location:U-AC11.php');
  exit;
}
?>

<!DOCTYPE html>
<html lang = "ja">
    <head>
        <title>U-AC10</title>
        <meta charset = "UTF-8">
        <link rel="stylesheet" href = "U-AC10.css">
        <link rel="stylesheet" href="U-menu.css" type="text/css">
    </head>

    <body>
        <main id="main">
        <button type="button" class="button_back" onclick="history.back()"><h3>＜</h3></button>

        <form action='' method="POST" enctype="multipart/form-data">

        <div align="center">
            <font size="+4">
                都道府県一覧
            </font><br>
            <h2>
                選択してください
            </h2>
            

            <div class="box-tihou">
                <h2 style="text-align:left">
                    北海道地方
                </h2>
    
                <button type="submit" class="box-tdhk" name="coupon_prefectures" value="北海道">
                    北海道
                </button>
            </div>
    
            <div class="box-tihou">
                <h2 style="text-align:left">
                    東北地方
                </h2>
    
                <button type="submit" class="box-tdhk" name="coupon_prefectures" value="青森県">
                    青森県
                </button>
                <button type="submit" class="box-tdhk" name="coupon_prefectures" value="岩手県">
                    岩手県
                </button>
                <button type="submit" class="box-tdhk" name="coupon_prefectures" value="宮城県">
                    宮城県
                </button>
                <button type="submit" class="box-tdhk" name="coupon_prefectures" value="秋田県">
                    秋田県
                </button>
                <button type="submit" class="box-tdhk" name="coupon_prefectures" value="山形県">
                    山形県
                </button>
                <button type="submit" class="box-tdhk" name="coupon_prefectures" value="福島県">
                    福島県
                </button>
            </div>
    
            <div class="box-tihou">
                <h2 style="text-align:left">
                    関東地方
                </h2>
    
                <button type="submit" class="box-tdhk" name="coupon_prefectures" value="茨城県">
                    茨城県
                </button>
                <button type="submit" class="box-tdhk" name="coupon_prefectures" value="栃木県">
                    栃木県
                </button>
                <button type="submit" class="box-tdhk" name="coupon_prefectures" value="群馬県">
                    群馬県
                </button>
                <button type="submit" class="box-tdhk" name="coupon_prefectures" value="埼玉県">
                    埼玉県
                </button>
                <button type="submit" class="box-tdhk" name="coupon_prefectures" value="千葉県">
                    千葉県
                </button>
                <button type="submit" class="box-tdhk" name="coupon_prefectures" value="東京都">
                    東京都
                </button>
                <button type="submit" class="box-tdhk" name="coupon_prefectures" value="神奈川県">
                    神奈川県
                </button>
                
            </div>
    
            <div class="box-tihou">
                <h2 style="text-align:left">
                    中部地方
                </h2>
    
                <button type="submit" class="box-tdhk" name="coupon_prefectures" value="新潟県">
                    新潟県
                </button>
                <button type="submit" class="box-tdhk" name="coupon_prefectures" value="富山県">
                    富山県
                </button>
                <button type="submit" class="box-tdhk" name="coupon_prefectures" value="石川県">
                    石川県
                </button>
                <button type="submit" class="box-tdhk" name="coupon_prefectures" value="福井県">
                    福井県
                </button>
                <button type="submit" class="box-tdhk" name="coupon_prefectures" value="山梨県">
                    山梨県
                </button>
                <button type="submit" class="box-tdhk" name="coupon_prefectures" value="長野県">
                    長野県
                </button>
                <button type="submit" class="box-tdhk" name="coupon_prefectures" value="岐阜県">
                    岐阜県
                </button>
                <button type="submit" class="box-tdhk" name="coupon_prefectures" value="静岡県">
                    静岡県
                </button>
                <button type="submit" class="box-tdhk" name="coupon_prefectures" value="愛知県">
                    愛知県
                </button>
            </div>
            
            <div class="box-tihou">
                <h2 style="text-align:left">
                    近畿地方
                </h2>
    
                <button type="submit" class="box-tdhk" name="coupon_prefectures" value="三重県">
                    三重県
                </button>
                <button type="submit" class="box-tdhk" name="coupon_prefectures" value="滋賀県">
                    滋賀県
                </button>
                <button type="submit" class="box-tdhk" name="coupon_prefectures" value="京都府">
                    京都府
                </button>
                <button type="submit" class="box-tdhk" name="coupon_prefectures" value="大阪府">
                    大阪府
                </button>
                <button type="submit" class="box-tdhk" name="coupon_prefectures" value="兵庫県">
                    兵庫県
                </button>
                <button type="submit" class="box-tdhk" name="coupon_prefectures" value="奈良県">
                    奈良県
                </button>
                <button type="submit" class="box-tdhk" name="coupon_prefectures" value="和歌山県">
                    和歌山県
                </button>
            </div>
    
            <div class="box-tihou">
                <h2 style="text-align:left">
                    中国地方
                </h2>
    
                <button type="submit" class="box-tdhk" name="coupon_prefectures" value="鳥取県">
                    鳥取県
                </button>
                <button type="submit" class="box-tdhk" name="coupon_prefectures" value="島根県">
                    島根県
                </button>
                <button type="submit" class="box-tdhk" name="coupon_prefectures" value="岡山県">
                    岡山県
                </button>
                <button type="submit" class="box-tdhk" name="coupon_prefectures" value="広島県">
                    広島県
                </button>
                <button type="submit" class="box-tdhk" name="coupon_prefectures" value="山口県">
                    山口県
                </button>
            </div>
    
            <div class="box-tihou">
                <h2 style="text-align:left">
                    四国地方
                </h2>
    
                <button type="submit" class="box-tdhk" name="coupon_prefectures" value="徳島県">
                    徳島県
                </button>
                <button type="submit" class="box-tdhk" name="coupon_prefectures" value="香川県">
                    香川県
                </button>
                <button type="submit" class="box-tdhk" name="coupon_prefectures" value="愛媛県">
                    愛媛県
                </button>
                <button type="submit" class="box-tdhk" name="coupon_prefectures" value="高知県">
                    高知県
                </button>
            </div>
    
            <div class="box-tihou">
                <h2 style="text-align:left">
                    九州、沖縄地方
                </h2>
    
                <button type="submit" class="box-tdhk" name="coupon_prefectures" value="福岡県">
                    福岡県
                </button>
                <button type="submit" class="box-tdhk" name="coupon_prefectures" value="佐賀県">
                    佐賀県
                </button>
                <button type="submit" class="box-tdhk" name="coupon_prefectures" value="長崎県">
                    長崎県
                </button>
                <button type="submit" class="box-tdhk" name="coupon_prefectures" value="熊本県">
                    熊本県
                </button>
                <button type="submit" class="box-tdhk" name="coupon_prefectures" value="大分県">
                    大分県
                </button>
                <button type="submit" class="box-tdhk" name="coupon_prefectures" value="宮城県">
                    宮崎県
                </button>
                <button type="submit" class="box-tdhk" name="coupon_prefectures" value="鹿児島県">
                    鹿児島県
                </button>
                <button type="submit" class="box-tdhk" name="coupon_prefectures" value="沖縄県">
                    沖縄県
                </button>
            </div>
            <p>
                <br>
                <br>
                <br>
                <br>
            </p>

        </div>
        </form>
    </main>

    <aside id="sub">
        <ul class="menu">
            <li class="menu-list"><a class="menu-button" href="U-HK6.php"><img class="menu_img" src="U-menu-home.png" >　ホーム</a></li><br>
            <li class="menu-list"><a class="menu-button" href="U-PL1.php"><img class="menu_img" src="U-menu-place.png">　名所</a></li><br>
            <li class="menu-list"><a class="menu-button" href="U-EV1.php"><img class="menu_img" src="U-menu-event.png">　イベント</a></li><br>
            <li class="menu-list"><a class="menu-button" href="U-FV2.php"><img class="menu_img" src="U-menu-favorite.png">　お気に入り</a></li><br>
            <li class="menu-list"><a class="menu-button" href="U-AC3.php"><img class="menu_img" src="U-menu-acount.png">　アカウント</a></li><br>
          </ul>
      </aside>

        

    </body>
</html>