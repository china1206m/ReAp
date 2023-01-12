<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" media="screen" href="U-AC24.css">
    <link rel="stylesheet" href="U-menu.css" type="text/css">
    
    <title>U-AC24</title>
</head>

<body>
    <main id="main">
    <form action="#" method="post">
        <button type="button" class="button_back" onclick="history.back()"><h3>＜</h3><h3 class="button_back"></h3></button>

        <p>
            <font size="+5" color="blue">
                構成
            </font>
        </p>
    
        <div class="box">
            <label class="deco-radio">
                <input type="radio" name="sample_radio" value="0">
                <span class="dummy"></span>
                <span>
                    <font size="+4" >
                        一人
                    </font>
                </span>
            </label>
            <label class="deco-radio">
                <input type="radio" name="sample_radio" value="1">
                <span class="dummy"></span>
                <span>
                    <font size="+4" >
                        友達
                    </font>
                </span>
            </label>
            <label class="deco-radio">
                <input type="radio" name="sample_radio" value="2">
                <span class="dummy"></span>
                <span>
                    <font size="+4" >
                        恋人
                    </font>
                </span>
            </label>
            <label class="deco-radio">
                <input type="radio" name="sample_radio" value="3">
                <span class="dummy"></span>
                <span>
                    <font size="+4" >
                        家族
                    </font>
                </span>
            </label>
        </div>

        
        <p>
            <font size="+5" color="blue">
                場所
            </font>
        </p>
        <div align="cenetr" class="left">
            <select id="region" class="size">
                <option value="">選択してください</option>
                <option value="hokkaido">北海道地方</option>
                <option value="tohoku">東北地方</option>
                <option value="kanto">関東地方</option>
                <option value="tyubu">中部地方</option>
                <option value="kansai">関西地方</option>
                <option value="tyugoku">中国地方</option>
                <option value="shikoku">四国地方</option>
                <option value="kyushu-okinawa">九州・沖縄地方</option>
            </select>
            <select id="pref" class="size">
                <option value="">選択してください</option>
            </select>
        </div>
            

            <p>
                <font size="+5" color="blue">
                    季節
                </font>
            </p>
        
            <div class="box">
                <label class="deco-radio">
                    <input type="radio" name="sample_radio" value="0">
                    <span class="dummy"></span>
                    <span>
                        <font size="+4" >
                            春
                        </font>
                    </span>
                </label>
                <label class="deco-radio">
                    <input type="radio" name="sample_radio" value="1">
                    <span class="dummy"></span>
                    <span>
                        <font size="+4" >
                            夏
                        </font>
                    </span>
                </label>
                <label class="deco-radio">
                    <input type="radio" name="sample_radio" value="2">
                    <span class="dummy"></span>
                    <span>
                        <font size="+4" >
                            秋
                        </font>
                    </span>
                </label>
                <label class="deco-radio">
                    <input type="radio" name="sample_radio" value="3">
                    <span class="dummy"></span>
                    <span>
                        <font size="+4" >
                            冬
                        </font>
                    </span>
                </label>
            </div>

            <p>
                <font size="+5" color="blue">
                    費用:
                </font>
                <div align="center">
                    <input type="cost" class="size">
                    <font size="+3">
                        ～
                    </font>
                    
                    <input type="cost" class="size">
                    <font size="+3">
                        円
                    </font>
                </div>
                
            </p>

            <p>
                <font size="+5" color="blue">
                    期間:
                </font>
                <div align="center">
                    <input type="cost" class="size">
                    <font size="+3">
                        泊
                    </font>
                    
                    <input type="cost" class="size">
                    <font size="+3">
                        日
                    </font>
                </div>
                
            </p>
    
            <div align="right">
                <button type="button" onclick="location.href='U-AC18.html'" class="next">
                    <font size="+3">
                        再投稿する
                    </font>     
                </button>
            </div>
        

        
        
    </form>
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
        var array = new Array();
        array[''] = new Array({cd:"0", label:"選択してください"});
        array["hokkaido"] = new Array(
            {cd:"1", label:"北海道"}
        );
        array["tohoku"] = [
            {cd:"1", label:"青森県"},
            {cd:"2", label:"岩手県"},
            {cd:"3", label:"宮城県"},
            {cd:"4", label:"秋田県"},
            {cd:"5", label:"山形県"},
            {cd:"6", label:"福島県"}
        ];
        array["kanto"] = [
            {cd:"1", label:"茨城県"},
            {cd:"2", label:"栃木県"},
            {cd:"3", label:"群馬県"},
            {cd:"4", label:"埼玉県"},
            {cd:"5", label:"千葉県"},
            {cd:"6", label:"東京都"},
            {cd:"7", label:"神奈川県"}
        ];
        array["tyubu"] = [
            {cd:"1", label:"新潟県"},
            {cd:"2", label:"富山県"},
            {cd:"3", label:"石川県"},
            {cd:"4", label:"福井県"},
            {cd:"5", label:"山梨県"},
            {cd:"6", label:"長野県"},
            {cd:"7", label:"岐阜県"},
            {cd:"8", label:"静岡県"},
            {cd:"9", label:"愛知県"}
        ];
        array["kansai"] = [
            {cd:"1", label:"三重県"},
            {cd:"2", label:"滋賀県"},
            {cd:"3", label:"京都府"},
            {cd:"4", label:"大阪府"},
            {cd:"5", label:"兵庫県"},
            {cd:"6", label:"奈良県"},
            {cd:"7", label:"和歌山県"}
        ];
        array["tyugoku"] = [
            {cd:"1", label:"鳥取県"},
            {cd:"2", label:"島根県"},
            {cd:"3", label:"岡山県"},
            {cd:"4", label:"広島県"},
            {cd:"5", label:"山口県"}
        ];
        array["shikoku"] = [
            {cd:"1", label:"香川県"},
            {cd:"2", label:"徳島県"},
            {cd:"3", label:"愛媛県"},
            {cd:"4", label:"高知県"}
        ];
        array["kyushu-okinawa"] = [
            {cd:"1", label:"福岡県"},
            {cd:"2", label:"佐賀県"},
            {cd:"3", label:"長崎県"},
            {cd:"4", label:"熊本県"},
            {cd:"5", label:"大分県"},
            {cd:"6", label:"宮崎県"},
            {cd:"7", label:"鹿児島県"},
            {cd:"8", label:"沖縄県"}
        ];

        document.getElementById('region').onchange = function(){
            city = document.getElementById("pref");
            city.options.length = 0
            var changedPref = region.value;
            for (let i = 0; i < array[changedPref].length; i++) {
                var op = document.createElement("option");
                value = array[changedPref][i]
                op.value = value.cd;
                op.text = value.label;
                pref.appendChild(op);
            }
        }
    </script>
</body>

</html>