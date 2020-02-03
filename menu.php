<?php
include("account.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>mypagecon</title>
</head>
<body>
    <div class="tabarea">
        <a href="home.php">
            <div class="tab1" for="tab1" >
            </div>
        </a>
        <a href="index.php">
            <div class="tab2" for="tab2">
            </div>
        </a>
        <form action="mypagecon.php" method="POST">
            <input type="text" name="sessionUserId" class="sessionUserId" id="sessionUserId">
            <input type="submit" class="tab3">
        </form>
    </div> 
<script>
    const localuserId = localStorage.getItem('lsuserId');
    // console.log(localuserId);
    const sessionUserId = document.getElementById("sessionUserId").value = localuserId;
    // console.log("天才天才天才！！！");
</script>
</body>
</html>