<?php

class MA {

    // テーブル名、追加したい値、追加したい値の型
    function ma($table, $post, $type) : void {
        try {
            include "MC-01.php";

            // データベース接続
            $db = getDB();

            $sum; // 最終挿入値

            for($i = 0; $i < count($post); $i++) {
                
                // 複数挿入の場合
                if($i >= 1){
                    $sum = $sum.",";
                }
                // 型調べ
                // INSERT
                if($type[$i] == 0) {
                    $sum = $sum.$post[$i];

                    // CHAR
                } else if($type[$i] == 1) {
                    $sum = $sum."'".$post[$i]."'";

                    // NCHAR
                } else {
                    $sum = $sum."N'".$post[$i]."'";
                }
            }
            // SQL文をセット
            $stt = $db->prepare("INSERT INTO ".$table." VALUES(".$sum.")");
    
            // INSERT命令を実行
            $stt->execute();
        } catch(PDOException $e) {
            die("エラーメッセージ：{$e->getMessage()}");
        }
    }
}
