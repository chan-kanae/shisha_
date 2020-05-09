@extends('layouts.app')

@section('content')
<!-- <body id="body">         -->
    <!-- <div class="main"> -->
        <div class="memofield">
            <form action="{{ url('post/input') }}" method="post" enctype="multipart/form-data" class="memo">
            {{ csrf_field() }}
                <h1 class="memotitle">Spot</h1>
                <input type="text" name="spot" class="input spot">
                <h1 class="memotitle">Flavor</h1>
                <div class="tabox">
                    <!-- <input type="text" name="log" placeholder="フレーバーを書き留める" class="memo" id="search"></input> -->
                    <textArea name="log" placeholder="フレーバーを書き留める" class="log" id="search"></textArea>
                    <!-- <input type="text" name="output" class="input spot" id="output" value=""></input> -->
                </div>
                
                <h1 class="memotitle">Feel</h1>
                <div class="tabox">
                    <textArea name="feel" placeholder="感動を表現する" class="feel"></textArea>
                </div>
                <input type="submit" value="Save" class="btn btn-primary submit-btn">
            </form>
        </div>
    <!-- </div> -->
<!-- </body> -->
<script>
    $(window).on('load',function(){
        $(".tab2").attr("src","css/img/penf.png");
    });
    
    // $("#output").val=$json;
</script>
<!-- <script src="{{ asset('js/ajax.js') }}"></script> -->
@endsection
