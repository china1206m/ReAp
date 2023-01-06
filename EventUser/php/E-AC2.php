<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
          integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" media="screen" href="E-AC2.css">
    <link rel="stylesheet" media="screen" href="button.css">
    <title>E-AC2</title>
    
</head>

<body>
    <section>
        <div class="box1"><h3 align="center">アカウント登録</h3></div>   

        <div align="center" class="box2">
            <form action="E-AC3.php" method="POST">
                <p>　　　　　　ユーザ名：<input type="text" name="name" maxlength="30" required></p>
                <p>　　　メールアドレス：<input type="email" name="mail" required></p>
               
                <div class="form-group" class="form-wrapper">
                <p>　　　　　パスワード：<input type="password" class="form-control" name="password" id="password" minlength="8" maxlength="16" pattern="^[a-zA-Z0-9]+$" required><i id="eye" class="fa-solid fa-eye"></i></p>
                </div>
               
                <div class="form-group" class="form-wrapper">
                <p>パスワード (再確認）：<input type="password" class="form-control" name="confirm" minlength="8" maxlength="16" pattern="^[a-zA-Z0-9]+$" oninput="CheckPassword(this)" required><i id="eye" class="fa-solid fa-eye"></i></p>
                </div>
                <button align="center" type="submit" class="button-only">登録する</button>
            </form>
        </div>
    </section>

<style>
    .form-wrapper {
         display: flex;
         justify-content: center;
         gap: 10px;
         margin: 10px 0;
         width: 250px;
    }

    #eye {
         display: flex;
         align-items: center;
         width: 25px;
         height: 25px;
         cursor: pointer;
    }
</style>

<script>
    function CheckPassword(confirm){
        // 入力値取得
        var input1 = password.value;
        var input2 = confirm.value;
        // パスワード比較
        if(input1 != input2){
            confirm.setCustomValidity("入力値が一致しません。");
        }else{
            confirm.setCustomValidity('');
        }
    }
</script>

<script>
    let eye = document.getElementById("eye");
    eye.addEventListener('click', function () {
         if (this.previousElementSibling.getAttribute('type') == 'password') {
              this.previousElementSibling.setAttribute('type', 'text');
              this.classList.toggle('fa-eye');
              this.classList.toggle('fa-eye-slash');
         } else {
              this.previousElementSibling.setAttribute('type', 'password');
              this.classList.toggle('fa-eye');
              this.classList.toggle('fa-eye-slash');
         }
    })
</script>
</body>

</html>