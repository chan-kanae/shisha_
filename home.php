<?php
session_start();

// DB接続
// include("account.php");
include("function.php");
$pdo = db_conn();

// セレクト文＿データ取得
$select = "SELECT * FROM memo ORDER BY date DESC";
$stmt2 = $pdo->prepare($select);
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
        <div class="headhome"></div>
    </div>

    <div class="main mainpc">
        <div class="sdarea" id="sdarea">
            <input type="text" name="lsuserIdbox" class="lsuserIdbox" id="lsuserIdbox">
            <!-- データぶちこむぜえぇぇぇぇッッッッ！！！ -->
        </div>
    </div>
    


<script>
    const getlsuserId = localStorage.getItem('lsuserId');
    // console.log(getlsuserId);
    const lsuserId = document.getElementById("lsuserIdbox").value=getlsuserId;
    // console.log(lsuserId);

    // jsでfor文まわしてデータ表示
    const json = <?=json_encode($json)?>;
    // console.log(json);
    const js_array = JSON.parse(json);
    // console.log(js_array);
    console.log("JSON parseできてるよ！天才");
    console.log("挙動-動いてる-！\nこれは正義！");

    window.onload = function(){
    //ログインしているuseridとメモのuidが一致する場合、編集アイコンと削除アイコンを表示
        for(let i=0; i<js_array.length; i++){
            const memouserId = js_array[i].userid;
            // console.log(memouserId);
            if(lsuserId==memouserId){
                const dataHtmlTrue=
                `<div class="sdbox" id=${js_array[i].id}>
                    <div class="iconbox">
                        <div class="uicon"></div>
                    </div>
                    <div class="sdchild">
                        <div class="sdinfo">
                            <div class="uname">${js_array[i].name}</div>
                            <a href="edit.php?id= + ${js_array[i].id} + ">
                                <button class='edit' data-key=${js_array[i].id}>
                                </button>
                            </a>
                            <a href="delete.php?id= + ${js_array[i].id} + ">
                                <button class='delete' data-key=${js_array[i].id}>
                                </button>
                            </a>
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
            }else{
                const dataHtmlFalse=
                `<div class="sdbox" id=${js_array[i].id}>
                    <div class="iconbox">
                        <div class="uicon"></div>
                    </div>
                    <div class="sdchild">
                        <div class="sdinfo">
                            <div class="uname">${js_array[i].name}</div>
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
                $("#sdarea").append(dataHtmlFalse);
            }
        };
    console.log("制御できてるうううぅぅぅッッッ！！\n\n泣いていいよ");
    };
    console.log("末恐ろしいな。こんなところまできたのか。");

</script>
    <?php
        include "menu.php";
    ?>
</body>
</html>
