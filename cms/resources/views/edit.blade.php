@extends('layouts.app')

@section('content')
<body id="body">
    <div class="header">
        <div class="headpen"></div>
    </div>    
    <div class="main">
        <div class="memofield">
            <!-- <form method="POST" action="input.php" class="memo"> -->
            <form action="{{ url('post/update') }}" method="POST" enctype="multipart/form-data" class="memo">
            {{ csrf_field() }}
                <!-- <input type="text" name="userid" class="useridbox" id="useridbox">
                <h1 class="dateBox">Date
                    <input type="text" name="date" value="<?php echo date("Y-m-d H:i:s")?>">
                </h1>
                <h1 class="date1Box">Date1
                    <input type="text" name="date1" value="<?php echo date("Y-m-d")?>">
                </h1> -->
                <h1 class="memotitle">Name</h1>
                <input type="text" name="name" class="input name" value="{{$post->name}}">
                <h1 class="memotitle">Spot</h1>
                <input type="text" name="spot" class="input spot" value="{{$post->spot}}">
                <h1 class="memotitle">Flavor</h1>
                <div class="tabox">
                    <textArea name="log" placeholder="フレーバーを書き留める" class="log">{{$post->log}}</textArea>
                </div>
                <h1 class="memotitle">Feel</h1>
                <div class="tabox">
                    <textArea name="feel" placeholder="感動を表現する" class="feel">{{$post->feel}}</textArea>
                </div>
                <input type="hidden" name="id" value="{{$post->id}}"> 
                <input type="submit" value="Save" class="SaveButton">
            </form>
        </div>

    </div> <!-- main閉じタグ -->
</body>
@endsection
