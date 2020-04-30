@extends('layouts.app')

@section('content')
<body id="body">
    <div class="main">
        <div class="memofield">
            <form action="{{ url('search') }}" method="post" enctype="multipart/form-data" class="memo">
            {{ csrf_field() }}
                <input type="text" name="keyword" class="input spot" placeholder="キーワード">
                    <input type="submit" value="Search" class="SaveButton">
            </form>
        </div>

    </div> <!-- main閉じタグ -->
</body>
<script>
    $(window).on('load',function(){
        $(".searchi").attr("src","css/img/searchf.png");
    });
</script>
@endsection
