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
        
    <div class="main mainpc">
        <div class="memofield">
            <form method="POST" action="update.php" class="memo">
            <!-- <form method="POST" action="https://{$_SERVER['HTTP_HOST']}/shisha_/update.php" class="memo"> -->
                <input type="text" name="userid" class="useridbox" id="useridbox" value="<?=$row["userid"]?>">
                <h1 class="dateBox">Date
                    <input type="text" name="date" value="<?=$row["date"]?>">
                </h1>
                <h1 class="date1Box">Date1
                    <input type="text" name="date1" value="<?=$row["date1"]?>">
                </h1>
                <h1 class="memotitle">Name</h1>
                <input type="text" name="name" class="input name" value="<?=$row["name"]?>">
                <h1 class="memotitle">Spot</h1>
                <input type="text" name="spot" class="input spot" value="<?=$row["spot"]?>">
                <h1 class="memotitle">Flavor</h1>
                <div class="tabox">
                    <textArea name="log" class="log"><?=$row["log"]?></textArea>
                </div>
                <h1 class="memotitle">Feel</h1>
                <div class="tabox">
                    <textArea name="feel" class="feel"><?=$row["feel"]?></textArea>
                </div>
                <input type="hidden" name="id" value="<?=$row["id"]?>">
                <input type="submit" value="Save" class="SaveButton">
            </form>
        </div>

        <?php
        include "menu.php";
        ?>
    </div> <!-- main閉じタグ -->

</body>
</html>

