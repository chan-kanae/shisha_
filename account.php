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
            //   console.log(user);
            //   console.log('user入りましたよ')

        } else {
          //Not Login
        location.href = "login.php";location.href = "login.php";
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
