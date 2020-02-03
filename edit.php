<?php

$id = $_GET["id"];
// echo $id;
// echo '</br>';

include("function.php");
$pdo = db_conn();

$stmt = $pdo->prepare("SELECT * FROM memo WHERE id=:id");
$stmt->bindValue(":id",$id, PDO::PARAM_INT);
$status = $stmt->execute();
if($status==false){
    sql_error($stmt);
}
$row = $stmt->fetch();//$row["id"]

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
    <title>SHISHA Log</title>
    <script src="js/jquery-2.1.3.min.js"></script>
    <link rel="stylesheet" href="css/reset.css" />
    <link rel="stylesheet" href="css/style.css" />
</head>
<body id="body">
    <div class="header">
        <div class="headpen"></div>
    </div>    
        
    <div class="main">    
    <form method="POST" action="update.php">
        <input type="text" name="userid" class="useridbox" id="useridbox" value="<?=$row["userid"]?>">
        <div class="dateBox">Date<input type="text" name="date" value="<?=$row["date"]?>"></div>
        <div class="date1Box">Date1<input type="text" name="date1" value="<?=$row["date1"]?>"></div>
        <div>Name<input type="text" name="name" value="<?=$row["name"]?>"></div>
        <div>Spot<input type="text" name="spot" value="<?=$row["spot"]?>"></div>
        <div>Log<input name="log" value="<?=$row["log"]?>"></input></div>
        <div>Feel<input name="feel" value="<?=$row["feel"]?>"></input></div>
        <input type="hidden" name="id" value="<?=$row["id"]?>">
        <input type="submit" value="送信">
    </form>

        <?php
        include "menu.php";
        ?>
    </div> <!-- main閉じタグ -->

</body>
</html>

