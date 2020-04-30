<?php
session_start();

if(" {$_SERVER['HTTP_REFERER']} == https://{$_SERVER['HTTP_HOST']}/shisha_/home.php" ){
    $_SESSION["bmUserId"] = $_POST["bmrUserId"];
    echo $_SESSION["bmUserId"];
    echo '</br>';
}
else if(" {$_SERVER['HTTP_REFERER']} == https://{$_SERVER['HTTP_HOST']}/shisha_/mypage.php "){
    $_SESSION["bmUserId"] = $_POST["bmrUserId"];
    echo $_SESSION["bmUserId"];
    echo '</br>';
}

$memo_id = $_POST["memoid"];
$user_id = $_POST["userid"];

echo $memo_id;
echo '</br>';
echo $user_id;
echo '</br>';

include("function.php");
$pdo = db_conn();

// $insert = "INSERT INTO bookmark(memo_id,user_id) VALUES(:memo_id,:user_id)";
$insert = "INSERT INTO bookmark (memo_id,user_id) SELECT :memo_id,:user_id FROM dual WHERE NOT EXISTS ( SELECT user_id FROM bookmark WHERE memo_id = :memo_id AND user_id = :user_id)";
$stmt = $pdo->prepare($insert);  
$stmt->bindValue(':memo_id', $memo_id, PDO::PARAM_STR);
$stmt->bindValue(':user_id', $user_id, PDO::PARAM_STR);
$status = $stmt->execute();
echo 'OK';

//４．データ登録処理後
if($status==false){
    sql_error($stmt);
}
else{
    header("Location: bookmark.php");
    // header("Location: https://{$_SERVER['HTTP_HOST']}/shisha_/bookmark.php");
    exit();
}


?>