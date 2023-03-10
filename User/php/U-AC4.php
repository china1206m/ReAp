<?php
session_start();
if(!isset($_SESSION['user_id'])) {
    $_SESSION['login_message'] = 'ログインしてください';
    header('Location:U-AC6.php');
    exit;
}
include "MG.php";

$user_id = $_SESSION['user_id'];
$db = MG_01($user_id,"","","","","","","","","");
$user = $db->fetchAll(PDO::FETCH_ASSOC);

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    include "MU.php";

    $update = new MU();
    $column = ["user_name", "profile_message"];
    $post = [$_POST['user_name'], nl2br($_POST['profile_message'])];
    $type = [2, 2];
    $column_name = "user_id";
    $user_id = $_SESSION['user_id'];
    $update->update("user", $column, $post, $type, $column_name, $user_id);

    include_once "MC-01.php";
    $pdo = getDB();

    if(!empty($_FILES['profile_image']['tmp_name'])) {
        //$content = file_get_contents($_FILES['profile_image']['tmp_name']);
        $name = $_FILES["profile_image"]['name'];
        $err_msg = '';
        if(!move_uploaded_file($_FILES["profile_image"]['tmp_name'], 'image/'.$name)) {
            $err_msg = 'sippai';
        }
        $sql = 'UPDATE user SET  profile_image = :profile_image WHERE user_id = :user_id';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':profile_image', 'image/'.$name);
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
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    </head>
    <body>
        <main id="main">

        <i class="fas fa-less-than less fa-3x" onclick="history.back()"></i>
                
            
            
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
    
                
            <button type="submit" class="button-only arrang" class="register">
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
