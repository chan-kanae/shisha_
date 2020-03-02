<?php
session_start();

// useridをセッションに持たせる
$_SESSION["bmUserId"] = $_POST["bmUserId"];
// echo $_SESSION["bmUserId"];

function redirect(){
    header("Location: bookmark.php");
    // header("Location: https://{$_SERVER['HTTP_HOST']}/shisha_/mypage.php");
    exit();
}
redirect();

?>