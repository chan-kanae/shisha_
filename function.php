<?php
//XSS対応（ echoする場所で使用！それ以外はNG ）
function h($str){
    return htmlspecialchars($str, ENT_QUOTES);
}

//DB接続： db_conn()
function db_conn(){
try {
    // return new PDO('mysql:dbname=mydb;charset=utf8;host=localhost','root','root');
    return new PDO('mysql:dbname=chan-kanae_shisha_log;charset=utf8;host=mysql57.chan-kanae.sakura.ne.jp','chan-kanae','kanae1358'); //さくらインターネットの時はここをかえる
    } catch (PDOException $e) {
    exit('DB Connection Error:'.$e->getMessage());
    }
}

//SQLエラー: sql_error($stmt)
function sql_error($stmt){
    $error = $stmt->errorInfo();
    exit("SQLError:".$error[2]);
}

//リダイレクト: redirect($file_name)
// function redirect($file_name){
//     header("Location: ".$file_name);
//     exit();
// }

?>