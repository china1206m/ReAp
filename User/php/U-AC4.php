<?php
session_start();
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    include "MU.php";

    $update = new MU();
    $column = ["user_name", "profile_message", "profile_image"];
    $post = [$_POST['user_name'], $_POST['profile_message'], $_FILES['profile_image']['tmp_name']];
    $type = [2, 2, 1];
    $column_name = "user_id";
    $id = $_SESSION['user_id'];
    $update->mu("user", $column, $post, $type, $column_name, $id);
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
                    
                    <img class="profile__img" src="画像のURL"><br>
                    <input type="file" name="profile_image" accept="image/jpeg,image/png">
                </div>
                
                <div class="box1" align="left">
                        <font size="+5">
                            <p><label for="user_mail" require>ユーザ名<span class="require">必須</span></label></p>
               
                        </font>
                        <br>
                        <div align="center" class="text">
                            <input type=”text” maxlength="20" name="user_name" class="profile__name" placeholder="20文字以内" required>
                        </div>
                        
                </div><br>
        
                <div class="box1">
                    <div align="left">
                        <font size="+5">
                            コメント
                        </font>
                    </div><br>
                    <div>
                        <textarea name="profile_message" cols="50" rows="10" class="profile__coment"></textarea><br>
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
        

    </body>
</html>
