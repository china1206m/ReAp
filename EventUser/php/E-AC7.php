<?php
session_start();
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    include "MU.php";

    $update = new MU();
    $column = ["eventuser_name", "profile_message"];
    $post = [$_POST['user_name'], $_POST['profile_message']];
    $type = [2, 2];
    $column_name = "eventuser_id";
    $eventuser_id = $_SESSION['eventuser_id'];
    $update->update("eventuser", $column, $post, $type, $column_name, $eventuser_id);

    include_once "MC-01.php";
    $pdo = getDB();

    if(!empty($_FILES['profile_image']['tmp_name'])) {
      $content = file_get_contents($_FILES['profile_image']['tmp_name']);
      $sql = 'UPDATE eventuser SET  profile_image = :profile_image WHERE eventuser_id = :eventuser_id';
      $stmt = $pdo->prepare($sql);
      $stmt->bindValue(':profile_image', $content);
      $stmt->bindValue(':eventuser_id', $eventuser_id);
      $stmt->execute();
    }
    header('Location:E-AC3.php');
    exit;
}
?>

<html>
<head>
  <title>画面ID E-AC7</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="E-AC7.css" type="text/css">
  <link rel="stylesheet" href="E_button.css" type="text/css">
  <link rel="stylesheet" href="E-menu.css" type="text/css">
</head>
<body>
  <main id="main">
    <button type="button" class="button_back" onclick="history.back()">＜</button><h3 class="button_back">プロフィール編集</h3>

  
    <p id="select_img">
      
    </p>
    <br>
    <center>
    <form action="" method="POST" enctype="multipart/form-data">
    <input id="event_image_" type="file" name="profile_image" class="profiel_image" accept="image/jpeg,image/png" value="castle.bmp" value="">
     
    </center>

              <p><label for="user_name" >ユーザ名<span class="require">必須</span></label></p>
              <input type="text" class="txt" name="user_name" maxlength="20" placeholder="20文字以内" required>
                
              <p><label for="message" >一言コメント</label></p>
                <p><textarea class="tarea" name="profile_message" placeholder="200文字以内" maxlength="200"></textarea></p>
                
    <center>
               <button type="submit" class="button-only">変更する</button>
            </form>
    </center>
  </main>
    <aside id="sub">
  
      <ul>
        <li class="menu-list"><a class="menu-button" href="E-EL1.html"><img src="E-menu-home.png" width="45" height="43">　ホーム</a></li><br>
        <li class="menu-list"><a class="menu-button" href="E-CB1.php"><img src="E-menu-post.png" width="45" height="43">　イベント投稿</a></li><br>
        <li class="menu-list"><a class="menu-button" href="E-SE1.php"><img src="E-menu-see.png" width="45" height="43">　投稿イベント<br>　　　一覧・消去</a></li><br>
        <li class="menu-list"><a class="menu-button" href="E-CP1.html"><img src="E-menu-coupon.png" width="45" height="43">　クーポン</a></li><br>
        <li class="menu-list"><a class="menu-button" href="E-AC3.php"><img src="E-menu-acount.png" width="45" height="43">　アカウント</a></li><br>
      </ul>
    </aside>


    <script>
    var img = document.createElement('img');
    img.classList.add("profile_img");
    img.setAttribute('id','preview');
    var td = document.getElementById("select_img");
    td.appendChild(img);
    var obj = document.getElementById("event_image_");
    obj.addEventListener('change', function(){
      img.src = "";
      
      var fileReader = new FileReader();
      fileReader.onload = function(){
        console.log(this.result);
        img.src = this.result;
      };
      fileReader.readAsDataURL(obj.files[0]);
    }, false);

    </script>
</body>