<?php
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
        
    <div class="main">    
    <form method="POST" action="input.php">
        <div class="useridBox">Userid<input type="text" name="userid" class="userid" id="useridbox"></div>
        <div class="dateBox">Date<input type="text" name="date" value="<?php echo date("Y-m-d H:i:s")?>"></div>
        <div class="date1Box">Date1<input type="text" name="date1" value="<?php echo date("Y-m-d")?>"></div>
        <div>Name<input type="text" name="name"></div>
        <div>Spot<input type="text" name="spot"></div>
        <div>Log<textArea name="log"></textArea></div>
        <div>Feel<textArea name="feel"></textArea></div>
        <input type="submit" value="送信">

        <!-- <div id="buttonbox">
            <input type="submit" value="Save" id="save">
            <button type=button id="clear">Clear</button>
        </div> -->

    </form>

        <?php
        include "menu.html";
        ?>
    </div> <!-- main閉じタグ -->

    <!-- メニューバー -->
    <!-- <div class="tabarea">
        <div class="tab1" for="tab1">
            <h1>Memo</h1>
        </div>
        <div class="tab2" for="tab2">
            <h2>SaveData</h2>
        </div>
    </div> -->
            

    <!-- google map api -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh6GlERuG6KGhfaLbQ7MhhkSae62zPqYE"
    ></script>
    
    <script src="https://www.gstatic.com/firebasejs/7.2.2/firebase.js"></script>
    <script>
    var firebaseConfig = {
        apiKey: "AIzaSyCh6GlERuG6KGhfaLbQ7MhhkSae62zPqYE",
        authDomain: "shisha-log-9ea19.firebaseapp.com",
        databaseURL: "https://shisha-log-9ea19.firebaseio.com",
        projectId: "shisha-log-9ea19",
        storageBucket: "shisha-log-9ea19.appspot.com",
        messagingSenderId: "399008856070",
        appId: "1:399008856070:web:ee87a7044551d89e2e6b87",
        measurementId: "G-W0W7HRFHPD"
    };
      // Initialize Firebase
    firebase.initializeApp(firebaseConfig);
      // firebase.analytics();

      // リアルタイム通信;
    let newPostRef;
      //  firebase.database().ref('users/' +userId);
    //   console.log(newPostRef);

      //----------------------------------------------------
      // Login Check
      //----------------------------------------------------
      //Firebase ログインチェック処理
    let userId, userName, userImg;
    firebase.auth().onAuthStateChanged(function (user) {
        //ログインしていればuserへデータを取得
        if (user) {
            user = firebase.auth().currentUser; //
            userId = user.uid;
            // newPostRef=firebase.database().ref();
            newPostRef = firebase.database().ref("users/" + "posts/");
            userName = user.displayName;
            userImg = user.photoURL;
            
            console.log=userId;
            document.getElementById("useridbox").value=userId;
        } else {
          //Not Login
        location.href = "login.php";
        }
      }); //ログインチェックの閉じタグ

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