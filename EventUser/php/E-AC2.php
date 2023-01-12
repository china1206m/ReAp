<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
          integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" media="screen" href="E-AC2.css">
    <title>E-AC2</title>
</head>

<body bgcolor="#f0f8ff">
    <section>
        <div class="box1"><h3 align="center">アカウント登録</h3></div>

        <div align="center" class="box2">
            <form action="E-EL1.html" method="POST">
                <div class="register-form" style="max-width:400px;">
                  <p>ユーザ名<span class="require">必須</span></p>
                  <input type="text" name="eventuser_name" maxlength="20" placeholder="20文字以内" required>
                  <p>メールアドレス<span class="require">必須</span></p>
                  <input type="email" name="eventuser_mail" max-length="30" placeholder="example@email.com" required>
                  <p>代表者名<span class="require">必須</span></p>
                  <input type="text" name="representative_name" maxlength="20" placeholder="山田太郎" required>
                  <p>電話番号<span class="require">必須</span></p>
                  <input type="tel" name="phone_number" max-length="10" placeholder="0120123456" required>
                  <p>住所<span class="require">必須</span></p>
                  <textarea rows="2" cols="30" name="address" maxlength="50" placeholder="東京都渋谷区神宮前一丁目二番三号" required></textarea>
                  <p>企業名<span class="require">必須</span></p>
                  <textarea rows="3" cols="40" name="enterprise_name" maxlength="100" placeholder="100文字以内" required></textarea>

                  <div class="form-group" class="form-wrapper">
                  <p>パスワード<span class="require">必須</span></p>
                  <input type="password" class="form-control" name="eventuser_pass" id="password" minlength="8" maxlength="16" pattern="^[a-zA-Z0-9]+$" placeholder="半角８～16文字" required>
                  </div>
                 
                  <div class="form-group" class="form-wrapper">
                  <p>パスワード (再確認）<span class="require">必須</span></p>
                  <input type="password" class="form-control" name="eventuser_pass" id="confirm" minlength="8" maxlength="16" pattern="^[a-zA-Z0-9]+$" placeholder="半角８～16文字" oninput="CheckPassword(this)" required>
                  <i id="eye" class="fa-solid fa-eye"></i>
                  </div>
                </div>
                <button align="center" type="submit" class="button-only">登録する</button>
            </form>
        </div>
        <div class="box3"></div>
    </section>

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