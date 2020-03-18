@extends('layouts.app')

@section('content')
<body id="body">
    <div class="header">
        <div class="headpen"></div>
    </div>    
        
    <div class="main">
        <div class="memofield">
            <!-- <form method="POST" action="input.php" class="memo"> -->
            <form action="{{ url('post/input') }}" method="post" enctype="multipart/form-data" class="memo">
            {{ csrf_field() }}
                <!-- <input type="text" name="userid" class="useridbox" id="useridbox">
                <h1 class="dateBox">Date
                    <input type="text" name="date" value="<?php echo date("Y-m-d H:i:s")?>">
                </h1>
                <h1 class="date1Box">Date1
                    <input type="text" name="date1" value="<?php echo date("Y-m-d")?>">
                </h1> -->
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

    </div> <!-- main閉じタグ -->
</body>
@endsection
