<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
    <link rel="stylesheet" href="css/reset.css" />
    <!-- FIrebaseUI CSS -->
    <link
        type="text/css"
        rel="stylesheet"
        href="https://cdn.firebase.com/libs/firebaseui/3.1.1/firebaseui.css"
    />
    <link
        href="https://fonts.googleapis.com/css?family=Muli:400,600|Open+Sans:400,700&display=swap"
        rel="stylesheet"
    />
    <link rel="stylesheet" href="css/login.css" />
    <!-- <link rel="manifest" href="./manifest.json"> -->
    <script>
        if('serviceWorker' in navigator){
            navigator.serviceWorker.register('./sw.js');
        }
    </script>

    <!-- /FIrebaseUI CSS -->
</head>
<body>
    <div class="title">SHISHA Log</div>

    <!-- 認証に必要な要素 -->
    <div class="main">
        <!-- <p class="sign">SHISHA Log</p> -->
        <div class="forgot">利用するにはGooleアカウントログインが必要です</div>
        <div id="firebaseui-auth-container"></div>
        <div id="loader">Loading...</div>
    </div>
    <!-- /認証に必要な要素 -->

    <!-- Firebase -->
    <script src="https://www.gstatic.com/firebasejs/7.2.2/firebase.js"></script>
    <script src="https://cdn.firebase.com/libs/firebaseui/3.5.2/firebaseui.js"></script>
    <!-- /Firebase -->

    <script>
      // Initialize Firebase
    var config = {
        apiKey: "AIzaSyCh6GlERuG6KGhfaLbQ7MhhkSae62zPqYE",
        authDomain: "shisha-log-9ea19.firebaseapp.com",
        databaseURL: "https://shisha-log-9ea19.firebaseio.com",
        projectId: "shisha-log-9ea19",
        storageBucket: "shisha-log-9ea19.appspot.com",
        messagingSenderId: "399008856070",
        appId: "1:399008856070:web:ee87a7044551d89e2e6b87",
        measurementId: "G-W0W7HRFHPD"
    };
    firebase.initializeApp(config);

      //認証機能
    var ui = new firebaseui.auth.AuthUI(firebase.auth());
    var uiConfig = {
        callbacks: {
        signInSuccessWithAuthResult: function(authResult, redirectUrl) {
            return true;
        },
        uiShown: function() {
            document.getElementById("loader").style.display = "none";
        }
        },
        signInFlow: "popup", //認証画面をPOPUP
        signInSuccessUrl: "home.php", //認証後の表示画面
        signInOptions: [
          firebase.auth.GoogleAuthProvider.PROVIDER_ID //Google認証
        ]
    };
    ui.start("#firebaseui-auth-container", uiConfig);
    </script>
</body>
</html>
