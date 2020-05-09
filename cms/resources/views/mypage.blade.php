@extends('layouts.app')

@section('content')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <div class="sdarea" id="sdarea">
    @foreach ( $myposts as $mypost)
        <div class="sdbox" id="{{ $mypost->id }}">
                <div class="iconbox">
                    <form action="{{ url('person') }}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="log_userid" value="{{$mypost->user->id}}">
                        <button type="submit" class="">
                            <img src="/uploads/images/{{$mypost->user->icon_url}}" class="icon">
                        </button>
                    </form>
                </div>
            <div class="sdchild">
                <div class="sdinfo">
                    <form action="{{ url('person') }}" method="POST">
                        {{ csrf_field() }}
                            <input type="hidden" name="log_userid" value="{{$mypost->user->id}}">
                            <button type="submit" class="">
                                <div class="uname">{{ $mypost->user->name }}</div>
                            </button>
                        </form>
                    <form action="{{ url('post/edit/'.$mypost->id) }}" method="POST">
                        {{ csrf_field() }}
                        <button type="submit" class="edit">
                        </button>
                    </form>
                    <form action="{{ url('post/delete/'.$mypost->id) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" class="delete btn-dell" onClick="deletePost(this);">
                        </button>
                    </form>
                    <form action="{{ url('/bookmark') }}" method="POST">
                        {{ csrf_field() }}
                        <button type="submit" class="bukuma" >
                        </button>
                    </form>
                </div>
                <div class="uspot">{{ $mypost->spot }} にて</div>
                <div class="ulog">{{ $mypost->log }}</div>
                <div class="ufeel">{{ $mypost->feel }}</div>
                <div class="udate">{{ $mypost->created_at }}</div>
            </div>
        </div>
    @endforeach

<script>
    // メニューバー色変更
    $(window).on('load',function(){
        $(".mpi").attr("src","css/img/humann.png");
    });

    $( function() {
        $(".btn-dell").click( function() {
            if( confirm ("本当に削除しますか？") ) {
            } else {
            return false;
            }
        });
    });
</script>

@endsection
