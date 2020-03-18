@extends('layouts.app')

@section('script')
    <script>
        $( function() {
            $(".btn-dell").click( function() {
                if( confirm ("本当に削除しますか？") ) {
                //そのままsubmit（削除）
                } else {
                //cancel
                return false;
                }
            });
        });
    </script>
@endsection

@section('content')
<body>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="sdarea" id="sdarea">

    @foreach ($posts as $post)
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
    @endforeach
</body>

<script>
    function deletePost(e) {
        'use strict';
        
        if ( confirm ('本当に削除していいですか?') )document.getElementById('form_' + e.dataset.id).submit();
}
</script>
@endsection

