<?php
session_start();

// おまじない＿現在地の時間を表示する
date_default_timezone_set('Asia/Tokyo');
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
            <form method="POST" action="input.php" class="memo">
            <!-- <form method="POST" action="https://{$_SERVER['HTTP_HOST']}/shisha_/input.php" class="memo"> -->
                <input type="text" name="userid" class="useridbox" id="useridbox">
                <h1 class="dateBox">Date
                    <input type="text" name="date" value="<?php echo date("Y-m-d H:i:s")?>">
                </h1>
                <h1 class="date1Box">Date1
                    <input type="text" name="date1" value="<?php echo date("Y-m-d")?>">
                </h1>
                <h1 class="memotitle">Name</h1>
                <input type="text" name="name" class="input name">
                <h1 class="memotitle">Spot</h1>
                <input type="text" name="spot" class="input spot">
                <h1 class="memotitle">Flavor</h1>
                <div class="tabox">
                    <textArea name="log" placeholder="フレーバーを書き留める" class="log"></textArea>
                </div>
                <h1 class="memotitle">Feel</h1>
                <div class="tabox">
                    <textArea name="feel" placeholder="感動を表現する" class="feel"></textArea>
                </div>
                <!-- <div class="sbb"> -->
                    <input type="submit" value="Save" class="SaveButton">
                <!-- </div> -->
            </form>
        </div>

        <?php
        include "menu.php";
        ?>
    </div> <!-- main閉じタグ -->

<script>
    $(window).on('load',function(){
        $(".tab2").attr("src","css/img/penf.png");
    });

    const getlsuserId = localStorage.getItem('lsuserId');
    // console.log(getlsuserId);
    const lsuserId = document.getElementById("useridbox").value=getlsuserId;
    // console.log(lsuserId);

      //----------------------------------------------------
      //Sign Out
      //----------------------------------------------------
    // document.querySelector("#out").onclick = function () {
    //     firebase.auth().signOut().then(function () {
    //     location.href = "login.html";
    //     }).catch(function (error) {
    //         alert("Out Error");
    //     });
    // };
    
    </script>

<script src="main.js"></script>
</body>
</html>