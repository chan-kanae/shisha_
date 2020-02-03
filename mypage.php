<?php
session_start();

include("function.php");
$pdo = db_conn();
$myuserId = $_SESSION["sessionUserId"];

// セレクト文＿データ取得
$select = "SELECT * FROM memo WHERE userid=:myuserId ORDER BY id DESC ";
$stmt2 = $pdo->prepare($select);
$stmt2 -> bindValue(':myuserId',$myuserId);
$status2 = $stmt2->execute();
// echo $status2;

// jsonにしてjsにわたす
$json = json_encode ($stmt2->fetchAll());
?>


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SHISHA Log</title>
    <script src="js/jquery-2.1.3.min.js"></script>
    <link rel="stylesheet" href="css/reset.css" />
    <link rel="stylesheet" href="css/style.css" />
</head>
<body>
    <div class="header">
        <div class="headhuman"></div>
    </div>
    <div class="main">
        <div class="sdarea" id="sdarea">
            <!-- データぶちこむぜえぇぇぇぇッッッッ！！！ -->
        </div>
    </div><!-- main閉じタグ -->

<script>
    // jsでfor文まわしてデータ表示
    const json = <?=json_encode($json)?>;
    // console.log(json);
    const js_array = JSON.parse(json);
    console.log(js_array,"JSON parseできてるよ！叶恵さん天才！一人でデバッグできてる！");
    console.log("挙動-動いてる-！\nこれは正義！");


    window.onload = function(){
        for(let i=0; i<js_array.length; i++){
            const dataHtmlTrue=
            `<div class="sdbox" id=${js_array[i].id}>
                <div class="iconbox">
                    <div class="uicon"></div>
                </div>
                <div class="sdchild">
                    <div class="sdinfo">
                        <div class="uname">${js_array[i].name}</div>
                        <button class='edit' value='edit'
                        data-key=${js_array[i].id} data-userid=${js_array[i].userid}>
                        </button>
                        <button class='delete' value='delete'
                        data-key=${js_array[i].id} data-userid=${js_array[i].userid}>
                        </button>
                    </div>
                    <div class="uspot">${js_array[i].spot} にて</div>
                    <div class="ulog">${js_array[i].log}</div>
                    <div class="ufeel">${js_array[i].feel}</div>
                    <div class="uid">${js_array[i].userid}</div>
                    <div class="udate1">${js_array[i].date1}</div>
                    <div class="udate">${js_array[i].date}</div>
                </div>
            </div>
            `
            $("#sdarea").append(dataHtmlTrue);
        }
    }

</script>

    <?php
        include "menu.php";
    ?>
</body>
</html>