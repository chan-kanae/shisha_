@extends('layouts.app')

@section('content')
<div class="memofield">
    <form action="{{ url('post/input') }}" method="post" enctype="multipart/form-data" class="memo">
    {{ csrf_field() }}
        <h1 class="memotitle">Spot</h1>
        <input type="text" name="spot" class="input spot">
        <h1 class="memotitle">Flavor</h1>
        <div class="tabox">
            <textArea name="log" placeholder="フレーバーを書き留める" class="log" id="search"></textArea>
        </div>                
        <h1 class="memotitle">Feel</h1>
        <div class="tabox">
            <textArea name="feel" placeholder="感動を表現する" class="feel"></textArea>
        </div>
        <input type="submit" value="Save" class="btn btn-primary submit-btn">
    </form>
</div>

<script>
    $(window).on('load',function(){
        $(".tab2").attr("src","css/img/penf.png");
    });
    
</script>
@endsection
