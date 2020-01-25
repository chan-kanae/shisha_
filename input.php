<?php
//1. POSTデータ取得
$name = $_POST["name"];
$date = $_POST["date"];
$date1 = $_POST["date1"];
$spot = $_POST["spot"];
$log = $_POST["log"];
$feel = $_POST["feel"];
$userid = $_POST["userid"];

//2. DB接続します
//*** function化する！  *****************
include("function.php");
$pdo = db_conn();

//３．データ登録SQL作成
$insert = "INSERT INTO memo(name,date,date1,spot,log,feel,userid) VALUES(:name,:date,:date1,:spot,:log,:feel,:userid)";
$stmt = $pdo->prepare($insert);  
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':date', $date, PDO::PARAM_STR);
$stmt->bindValue(':date1', $date1, PDO::PARAM_STR);
$stmt->bindValue(':spot', $spot, PDO::PARAM_STR);
$stmt->bindValue(':log', $log, PDO::PARAM_STR);
$stmt->bindValue(':feel', $feel, PDO::PARAM_STR);
$stmt->bindValue(':userid', $userid, PDO::PARAM_STR);
$status = $stmt->execute();//excuteの結果をいれている
echo '賢いのでDBにINSERTできたんですよね';


//４．データ登録処理後
if($status==false){
    sql_error($stmt);
}
else{
    header("Location: home.php");
    exit();
}
?>
