<?php

class MD {

    // テーブル名、カラム名、削除したい値、型   
    function md($table, $columnnaem, $post, $type) : void {
        try {
            include "MC-01.php";
            // データベース接続
            $db = getDB();

            $sum;
            if($type == 0) { 
                $sum = $sum.$post;
            } else if($type == 1) {
                $sum = $sum."'".$post."'";
            } else {
                $sum = $sum."N'".$post."'";
            }

            // SQL文をセット
            $stt = $db->prepare("DELETE FROM ".$table." WHERE ".$columnnaem."=".$sum);
    
            // INSERT命令を実行
            $stt->execute();
        } catch(PDOException $e) {
            die("エラーメッセージ：{$e->getMessage()}");
        }
    }
}
 