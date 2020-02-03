<?php
//1. POSTデータ取得 insert.phpからコピーしてきた
$id = $_GET["id"]; //POSTではなくGET
echo $id;
echo '</br>';

//2. DB接続します
//*** function化する！  *****************
include("function.php");
$pdo = db_conn();
echo "接続OK";
echo '</br>';


//３．データ登録SQL作成
$sql="DELETE FROM memo WHERE id=:id"; //デリートの時はこれ、変数を直接書くのはNG
echo "SQL文OK";
echo '</br>';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();
echo $status;
echo '</br>';
echo "削除DONE";


//４．データ登録処理後
if($status==false){
    sql_error($stmt);
}else{
    function redirect(){
        header("Location: home.php");
        exit();
    }
    redirect();
}
?>
