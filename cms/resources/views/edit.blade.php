@extends('layouts.app')

@section('content')
<div class="memofield">
    <form action="{{ url('post/update') }}" method="POST" enctype="multipart/form-data" class="memo">
        {{ csrf_field() }}
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
        <input type="submit" value="Save" class="btn btn-primary submit-btn">
    </form>
</div>
@endsection