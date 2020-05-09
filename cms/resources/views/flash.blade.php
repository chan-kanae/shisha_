@extends('layouts.app')

@section('content')
<!-- <body id="body"> -->
    @if(Session::has('flashmessage'))
        <!-- モーダルウィンドウの中身 -->
        <div class="modal fade" id="myModal" tabindex="-1"
            ole="dialog" aria-labelledby="label1" aria-hidden="true">
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
    <nav class="navbar navbar-light bg-light mb-5">
        <a class="navbar-brand" href="#">Flashメッセージ（デモ）</a>
    </nav>
    <div class="container">
        <form action="{{url('flash')}}" method="post">
            {{ csrf_field() }}
            <div class="form-group row">
                <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Email">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10 offset-sm-2">
                    <button type="submit" class="btn btn-primary">登録</button>
                </div>
            </div>
        </form>
    </div><!-- /container -->
<!-- </body> -->
@endsection
