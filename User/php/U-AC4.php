<?php
session_start();

include "MG.php";

$user_id = $_SESSION['user_id'];
$db = MG_01($user_id,"","","","","","","","","");
$user = $db->fetchAll(PDO::FETCH_ASSOC);

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    /*
    include "MU.php";

    $update = new MU();
    $column = ["user_name", "profile_message", "profile_image"];
    $post = [$_POST['user_name'], $_POST['profile_message'], $_FILES['profile_image']['tmp_name']];
    $type = [2, 2, 1];
    $column_name = "user_id";
    $id = $_SESSION['user_id'];
    $update->mu("user", $column, $post, $type, $column_name, $id);
    */

    include "MU.php";

    $update = new MU();
    $column = ["user_name", "profile_message"];
    $post = [$_POST['user_name'], $_POST['profile_message']];
    $type = [2, 2];
    $column_name = "user_id";
    $user_id = $_SESSION['user_id'];
    $update->update("user", $column, $post, $type, $column_name, $user_id);

    include_once "MC-01.php";
    $pdo = getDB();

    if(!empty($_FILES['profile_image']['tmp_name'])) {
        $content = file_get_contents($_FILES['profile_image']['tmp_name']);
        $sql = 'UPDATE user SET  profile_image = :profile_image WHERE user_id = :user_id';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':profile_image', $content);
        $stmt->bindValue(':user_id', $user_id);
        $stmt->execute();
    }
    header('Location:U-AC3.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang = "ja">
    <head>
        <title>U-AC4</title>
        <meta charset = "UTF-8">
        <link rel="stylesheet" href = "button.css">
        <link rel="stylesheet" href = "U-AC4.css">
        <link rel="stylesheet" href="U-menu.css" type="text/css">
    </head>
    <body>
        <main id="main">

            <button type="button" class="button_back" onclick="history.back()">＜</button><h3 class="button_back"></h3>
                
            
            
            <form action='' method="POST" enctype="multipart/form-data">
            <div align="center">
                <div class="profile">
                    
                <img id="preview" class="profile__img" src="data:image/gif;base64,R0lhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEOw=="><br>
                <input type="file" name="profile_image" accept="image/jpeg,image/png" onchange="previewImage(this);">
                </div>
                
                <div class="box1" align="left">
                        <font size="+5">
                            <p><label for="user_mail" require>ユーザ名<span class="require">必須</span></label></p>
               
                        </font>
                        <br>
                        <div align="center" class="text">
                            <input type=”text” maxlength="20" name="user_name" class="profile__name" placeholder="20文字以内" value="<?php print($user[0]['user_name']); ?>"required>
                        </div>
                        
                </div><br>
        
                <div class="box1">
                    <div align="left">
                        <font size="+5">
                            コメント
                        </font>
                    </div><br>
                    <div>
                        <textarea name="profile_message" cols="50" rows="10" class="profile__coment"><?php print($user[0]['profile_message']); ?></textarea><br>
                    </div>
                    
                </div>
    
                
            <button type="submit" class="button-only" class="register">
                    変更する
            </button>
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
            function previewImage(obj){
                var fileReader = new FileReader();
                fileReader.onload = (function(){
                    document.getElementById('preview').src =fileReader.result;
                });
                fileReader.readAsDataURL(obj.files[0]);
            }
          </script>
    
    </body>
</html>
