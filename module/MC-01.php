<?PHP
function getDB() :PDO {
    $dsn ='mysql:dbname=ReAp; host=localhost; charset=utf8';
    $usr = 'root';
    $passwd = '';

   // $db = mysqli_connect($host, $usr, $passwd, $dbname);

   try {
        // データベースへの接続を確立
        $db = new PDO($dsn, $usr, $passwd);
        return $db;
    } catch(PDOException $e) {
        echo 'DB接続エラー:'.$e->getMessage();
        return $db;
    }
}