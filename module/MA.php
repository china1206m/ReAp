<?php
class MA {
        // テーブル名、追加したい値、追加したい値の型
        function ma($table, $column, $post, $type) : void {
            try {
                // データベース接続
                include_once "MC-01.php";
                $db = getDB();
    
                $sum_column = null; // 最終挿入値column
                $sum_post= null; // 最終挿入値post
    
                for($i = 0; $i < count($post); $i++) {
                    // 複数挿入の場合
                    if($i >= 1){
                        $sum_column = $sum_column.",";
                        $sum_post = $sum_post.",";
                    }
                    // column
                    $sum_column = $sum_column.$column[$i];
                    // 型調べ
                    // INSERT
                    if($type[$i] == 0) {
                        $sum_post = $sum_post.$post[$i];
                        // CHAR
                    } else if($type[$i] == 1) {
                        $sum_post = $sum_post."'".$post[$i]."'";
                        // NCHAR
                    } else {
                        $sum_post = $sum_post."N'".$post[$i]."'";
                    }
                }
                // SQL文をセット
                $stt = $db->prepare("INSERT INTO ".$table." (".$sum_column.") VALUES(".$sum_post.") ");
                // INSERT命令を実行
                $stt->execute();
            } catch(PDOException $e) {
                die("エラーメッセージ：{$e->getMessage()}");
            }
        }

    // テーブル名、追加したい値、追加したい値の型
    function ma_return ($table, $column, $post, $type) {
        try {
            // データベース接続
            include_once "MC-01.php";
            $db = getDB();

            $sum_column = null; // 最終挿入値column
            $sum_post= null; // 最終挿入値post

            for($i = 0; $i < count($post); $i++) {
                // 複数挿入の場合
                if($i >= 1){
                    $sum_column = $sum_column.",";
                    $sum_post = $sum_post.",";
                }
                // column
                $sum_column = $sum_column.$column[$i];
                // 型調べ
                // INSERT
                if($type[$i] == 0) {
                    $sum_post = $sum_post.$post[$i];
                    // CHAR
                } else if($type[$i] == 1) {
                    $sum_post = $sum_post."'".$post[$i]."'";
                    // NCHAR
                } else {
                    $sum_post = $sum_post."N'".$post[$i]."'";
                }
            }
            // SQL文をセット
            $stt = $db->prepare("INSERT INTO ".$table." (".$sum_column.") VALUES(".$sum_post.") ");
            // INSERT命令を実行
            $stt->execute();

            // ユーザIDを取得
            $id = $db->lastINsertID();
            return $id;
        } catch(PDOException $e) {
            die("エラーメッセージ：{$e->getMessage()}");
        }
    }
}
