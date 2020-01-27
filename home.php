<?php
// DB接続する
include("function.php");
$pdo = db_conn();

// セレクト文＿データ取得
$select = "SELECT * FROM memo";
$stmt2 = $pdo->prepare($select);
$status2 = $stmt2->execute();
// echo $status2;

// jsonにしてjsにわたす
// while($result[] = $stmt2->fetch(PDO::FETCH_ASSOC));
$json = json_encode ($stmt2->fetchAll());
// echo'json形式にできてるよ！天才！';
// echo $json;
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

    

<script>
    // jsでfor文まわしてデータ表示
    const json = <?=json_encode($json)?>;
    // console.log(json);
    const js_array = JSON.parse(json);
    console.log(js_array,"JSON parseできてるよ！叶恵さん天才！一人でデバッグできてる！");
    console.log("挙動-動いてる-！これは正義！");
    // window.onload = function(){
        // $("#savedata").empty();
        // for(let i=0; i<js_array.length ;i++){
        //     const datahtml =
        //     "<tr class = " +
        //     js_array[i].id +
        //     " ><td>" +
        //     js_array[i].name +
        //     "</td><td>" +
        //     js_array[i].date +
        //     "</td><td>" +
        //     js_array[i].date1 +
        //     "</td><td>" +
        //     js_array[i].spot +
        //     "</td><td>" +
        //     js_array[i].log +
        //     "</td><td>" +
        //     js_array[i].feel +
        //     "</td><td>" +
        //     js_array[i].userid +
        //     "</td><td>" +
        //     "<button class='delete' value='delete' data-key='" + js_array[i].id + "' data-userid='" + js_array[i].id + "'>削除</button>" +
        //     "</td></tr>";
            // $("#savedata").append(datahtml);
        // };
    // };

</script>
    <?php
        include "menu.html";
    ?>
</body>
</html>