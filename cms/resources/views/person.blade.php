@extends('layouts.app')

@section('content')
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
                    <form action="{{ url('person') }}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="log_userid" value="{{$post->user->id}}">
                        <button type="submit" class="submitButton">
                            <img src="{{$post->user->icon_url}}" class="icon">
                        </button>
                    </form>
                </div>

                <div class="sdchild">
                    <div class="sdinfo">
                        <form action="{{ url('person') }}" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" name="log_userid" value="{{$post->user->id}}">
                            <button type="submit" class="submitButton">
                                <div class="uname">{{ $post->user->name }}</div>
                            </button>
                        </form>
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
                    </div>
                    <div class="uspot">{{ $post->spot }} にて</div>
                    <div class="ulog">{{ $post->log }}</div>
                    <div class="ufeel">{{ $post->feel }}</div>
                    <div class="udate">{{ $post->created_at }}</div>
                </div>
            </div>
        @else
            <div class="sdbox" id="{{ $post->id }}">
                <div class="iconbox">
                    @if( $post->user->icon_url == null )
                        <form action="{{ url('person') }}" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" name="log_userid" value="{{$post->user->id}}">
                            <button type="submit" class="submitButton">
                                <div class="uicon"></div>
                            </button>
                        </form>
                    @else
                    <form action="{{ url('person') }}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="log_userid" value="{{$post->user->id}}">
                        <button type="submit" class="submitButton">
                            <img src="{{$post->user->icon_url}}" class="icon">
                        </button>
                    </form>
                    @endif
                </div>
                <div class="sdchild">
                    <div class="sdinfo">
                        <form action="{{ url('person') }}" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" name="log_userid" value="{{$post->user->id}}">
                            <button type="submit" class="submitButton">
                                <div class="uname">{{ $post->user->name }}</div>
                            </button>
                        </form>
                        <form action="{{ url('/bookmark') }}" method="POST">
                            {{ csrf_field() }}
                        <input type="hidden" name="post_id" value="{{$post->id}}">
                        <button type="submit" class="bukuma" >
                        </button>
                    </form>
                    </div>
                    <div class="uspot">{{ $post->spot }} にて</div>
                    <div class="ulog">{{ $post->log }}</div>
                    <div class="ufeel">{{ $post->feel }}</div>
                    <div class="udate">{{ $post->created_at }}</div>
                </div>
            </div>
        @endif
    @endforeach


<script>
    $(window).on('load',function(){
        $(".tab1").attr("src","css/img/homee.png");
    });

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

