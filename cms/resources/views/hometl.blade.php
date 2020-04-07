@extends('layouts.app')

@section('content')
<body>
    <div class="sdarea" id="sdarea">
    @foreach ( $posts as $post)
        @if ( $myuserid==$post->userid )
        <div class="sdbox" id="{{ $post->id }}">
            <div class="iconbox">
                <div class="uicon"></div>
            </div>
            <div class="sdchild">
                <div class="sdinfo">
                    <div class="uname">{{ $post->name }}</div>
                    <form action="{{ url('post/edit/'.$post->id) }}" method="POST">
                    {{ csrf_field() }}
                        <button type="submit" class="edit">
                        </button>
                    </form>
                    <form action="{{ url('post/delete/'.$post->id) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                        <button type="submit" class="delete btn-dell" onClick="deletePost(this);">
                        </button>
                    </form>
                    <!-- <form action="{{ url('/bookmark/'.$post->id) }}" method="POST"> -->
                    <form action="{{ url('/bookmark') }}" method="POST">
                    {{ csrf_field() }}
                        <input type="hidden" name="post_id" value="{{$post->id}}">
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
                <div class="uspot">{{ $post->spot }} にて</div>
                <div class="ulog">{{ $post->log }}</div>
                <div class="ufeel">{{ $post->feel }}</div>
                <div class="uid">{{ $post->userid }}</div>
                <div class="udate">{{ $post->created_at }}</div>
            </div>
        </div>
        @else
            <div class="sdbox" id="{{ $post->id }}">
                <div class="iconbox">
                    <div class="uicon"></div>
                </div>
                <div class="sdchild">
                    <div class="sdinfo">
                        <div class="uname">{{ $post->name }}</div>
                    </div>
                    <div class="uspot">{{ $post->spot }} にて</div>
                    <div class="ulog">{{ $post->log }}</div>
                    <div class="ufeel">{{ $post->feel }}</div>
                    <div class="uid">{{ $post->userid }}</div>
                    <div class="udate">{{ $post->created_at }}</div>
                </div>
            </div>
        @endif
    @endforeach
</body>

<script>
    // 投稿削除確認
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

