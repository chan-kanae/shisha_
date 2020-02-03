<?php
session_start();

// useridをセッションに持たせる
$_SESSION["sessionUserId"] = $_POST["sessionUserId"];
// echo $_SESSION["sessionUserId"];

function redirect(){
    header("Location: mypage.php");
    exit();
}
redirect();

?>