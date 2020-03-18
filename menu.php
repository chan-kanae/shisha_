<?php
// include("account.php");
// echo $_SERVER['HTTP_HOST'].$_SERVER["REQUEST_URI"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>mypagecon</title>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>
<body>
    <div class="main">
        <div class="tabarea">
            <a href="home.php">
                <img src="css/img/homegol.png" class="tab1">
            </a>
            <a href="index.php">
                <img src="css/img/pencilgol.png" class="tab2">
            </a>
            <form action="mypagecon.php" method="POST" class="mp">
                <input type="text" name="sessionUserId" class="sessionUserId" id="sessionUserId">
                <input type="submit" class="tab3">
                <img src="css/img/humangol.png" class="mpi">
            </form>
            <form action="bookmarkcon.php" method="POST" class="bm">
                <input type="text" name="bmUserId" class="bmUserId" id="bmUserId">
                <input type="submit" class="tab4">
                <img src="css/img/bmgol.png" class="bmi">
            </form>
        </div> 
    </div>
<script>
    const localuserId = localStorage.getItem('lsuserId');
    // console.log(localuserId);
    const sessionUserId = document.getElementById("sessionUserId").value = localuserId;
    const bookmarkUserId = document.getElementById("bmUserId").value = localuserId;
    // console.log("天才天才天才！！！");

    // if("<?php "{$_SERVER['REQUEST_URI']} === /shisha_/home.php" ?>"){
    //     $(".tab1").attr("src","css/img/homef.png");
    // }else{
    //     $(".tab1").attr("src","css/img/homeol.png");
    // }
</script>
</body>
</html>