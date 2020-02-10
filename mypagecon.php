<?php
session_start();

// useridをセッションに持たせる
$_SESSION["sessionUserId"] = $_POST["sessionUserId"];
// echo $_SESSION["sessionUserId"];

function redirect(){
    header("Location: mypage.php");
    // header("Location: https://{$_SERVER['HTTP_HOST']}/shisha_/mypage.php");
    exit();
}
redirect();

?>