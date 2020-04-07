@extends('layouts.app')

@section('content')
<body>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <div class="sdarea" id="sdarea">
    @foreach ( $myposts as $mypost)
        <div class="sdbox" id="{{ $mypost->id }}">
            <div class="iconbox">
                <div class="uicon"></div>
            </div>
            <div class="sdchild">
                <div class="sdinfo">
                    <div class="uname">{{ $mypost->name }}</div>
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
                    <!-- <form action="bookmarkregi.php" method="POST">
                        <input type="text" name="bmrUserId" value="${getlsuserId}" class="hide">
                        <input type="text" name="memoid" value="${js_array[i].id}" class="hide">
                        <input type="text" name="userid" value="${lsuserId}" class="hide">
                        <input type="submit" class="bukuma">
                    </form> -->
                </div>
                <div class="uspot">{{ $mypost->spot }} にて</div>
                <div class="ulog">{{ $mypost->log }}</div>
                <div class="ufeel">{{ $mypost->feel }}</div>
                <div class="uid">{{ $mypost->userid }}</div>
                <div class="udate">{{ $mypost->created_at }}</div>
            </div>
        </div>
    @endforeach
</body>

<script>
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
