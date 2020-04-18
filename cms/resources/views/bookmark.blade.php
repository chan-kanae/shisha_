@extends('layouts.app')

@section('content')
<body>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif


    @if(Session::has('flashmessage'))
        <!-- モーダルウィンドウの中身 -->
        <div class="modal fade" id="myModal" tabindex="-1"
            role="dialog" aria-labelledby="label1" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        {{ session('flashmessage') }}
                    </div>
                    <div class="modal-footer text-center">
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if(Session::has('bmdelmessage'))
        <!-- モーダルウィンドウの中身 -->
        <div class="modal fade" id="myModal" tabindex="-1"
            role="dialog" aria-labelledby="label1" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        {{ session('bmdelmessage') }}
                    </div>
                    <div class="modal-footer text-center">
                    </div>
                </div>
            </div>
        </div>
    @endif


    <div class="sdarea" id="sdarea">
    @foreach ( $posts as $post)
        @if ( $myuserid==$post->user_id )
        <div class="sdbox" id="{{ $post->id }}">
        <div class="iconbox">
            <img src="/uploads/images/{{$post->user->icon_url}}" class="icon">
        </div>
            <div class="sdchild">
                <div class="sdinfo">
                    <div class="uname">{{ $post->user->name }}</div>
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
                    <form action="{{ url('/bookmark/del') }}" method="POST">
                    {{ csrf_field() }}
                        <input type="hidden" name="log_id" value="{{$post->id}}">
                        <button type="submit" class="bukuma bmdel" >
                        </button>
                    </form>
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
                <img src="/uploads/images/{{$post->user->icon_url}}" class="icon">
                </div>
                <div class="sdchild">
                    <div class="sdinfo">
                        <div class="uname">{{ $post->user->name }}</div>
                        <form action="{{ url('/bookmark/del') }}" method="POST">
                        {{ csrf_field() }}
                            <input type="hidden" name="log_id" value="{{$post->id}}">
                            <button type="submit" class="bukuma bmdel" >
                            </button>
                        </form>
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
    // 投稿削除
    $( function() {
        $(".btn-dell").click( function() {
            if( confirm ("本当に削除しますか？") ) {
            } else {
            return false;
            }
        });
    });

    // ブックマーク削除
    $( function() {
        $(".bmdel").click( function() {
            if( confirm ("本当にブックマークから削除しますか？") ) {
            } else {
            return false;
            }
        });
    });

    // モーダルウィンドウ
    $(window).on('load',function(){
        $('#myModal').modal('show');
    });

</script>
@endsection

