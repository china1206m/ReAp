<?php
// セッション開始 
session_start();
 
// POSTで送信されている 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // データ挿入 
    // 呼び出し
    include "MA.php";
    // addインスタンス生成
    $add = new MA();

    // 入力したいカラム名を指定
    $column = ['user_id','report_content'];
    
    // 入力された値をpost配列に格納
    $post = [$_SESSION['user_id'], $_POST['report_content']];

    // 入力された値の型を定義
    $type = [0,1];

    // 引数としてテーブル名、追加する値、追加する値の型 返り値としてID
    $_SESSION['user_report_id'] = $add->add_return("user_report",$column, $post, $type);

    //通報回数変更
    include "MU.php";
    $mu = new MU();
    $mu->report_count($_SESSION['user_id']);

    header('Location:U-HK6.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" media="screen" href="U-HK12.css">
    <link rel="stylesheet" href="U-menu.css" type="text/css">
    <title>U-HK12</title>
</head>

<body>
    <main id="main">
    <button type="button" class="button_back" onclick="history.back()">＜</button>
        <div class="box" align="center">
            <h2>通報理由</h2>
        </div>
    
        <form action="" method="POST" name="reportForm" onSubmit="return check();">
            <div class="reason-select" align="center">
                <div class="button-box">
                    <div class="reason" style="max-width:650px;">
                        <input type="radio" name="report_content" value="単に気に入らない" id="hate"><label for="hate">単に気に入らない</label>
                        <input type="radio" name="report_content" value="スパムである" id="spam"><label for="spam">スパムである</label>
                        <input type="radio" name="report_content" value="虚偽の情報である" id="lie"><label for="lie">虚偽の情報である</label>
                        <input type="radio" name="report_content" value="詐欺である" id="scam"><label for="scam">詐欺である</label>
                        <input type="radio" name="report_content" value="差別的発言である" id="discriminatory"><label for="discriminatory">差別的発言である</label>
                    </div>
                    <button class="button-only">決定</button>
                </div>
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
function check () {
var reason = document.reportForm.report_content.value;

if ( reason == "" ) {
alert ( "通報理由を選択してください。" );

return false;
}

return true;
}
</script>
</body>
</html>