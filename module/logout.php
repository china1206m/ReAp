<?php
class logout {
    // ログアウト後の遷移先を引数として持ってくる
    function logout($url) : void {
        session_start();
        session_destroy();
        header('Location:'.$url.'');
    exit;
    }    
}
?>