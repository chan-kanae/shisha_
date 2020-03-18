<?php
$id = $_POST["id"];
$name = $_POST["name"];
$date = $_POST["date"];
$date1 = $_POST["date1"];
$spot = $_POST["spot"];
$log = $_POST["log"];
$feel = $_POST["feel"];
$userid = $_POST["userid"];
// echo "POST_OK";
// echo '</br>';

//2. DB接続
include("function.php");
$pdo = db_conn();
// echo "接続OK";
// echo '</br>';

//３．データ登録SQL作成
$sql="UPDATE memo SET name=:name, date=:date, date1=:date1, spot=:spot, log=:log, feel=:feel, userid=:userid WHERE id=:id";
echo "UPDATE文OK";
echo '</br>';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':date', $date, PDO::PARAM_STR);
$stmt->bindValue(':date1', $date1, PDO::PARAM_STR);
$stmt->bindValue(':spot', $spot, PDO::PARAM_STR);
$stmt->bindValue(':log', $log, PDO::PARAM_STR);
$stmt->bindValue(':feel', $feel, PDO::PARAM_STR);
$stmt->bindValue(':userid', $userid, PDO::PARAM_STR);
$status = $stmt->execute();
// echo "実行OK";
// echo '</br>';


//４．データ登録処理後
if($status==false){
    sql_error($stmt);
}else{
    function redirect(){
        header("Location: home.php");
        // header("Location: https://{$_SERVER['HTTP_HOST']}/shisha_/home.php");
        exit();
    }
    redirect();
}
?>
