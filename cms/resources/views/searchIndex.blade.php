@extends('layouts.app')

@section('content')
    <div class="memofield">
        <form action="{{ url('search') }}" method="post" enctype="multipart/form-data" class="memo">
        {{ csrf_field() }}
            <h1 class="memotitle">Keyword</h1>
            <input type="text" name="keyword" class="input spot">
                <input type="submit" value="Search" class="btn btn-success submit-btn">
        </form>
    </div>
<script>
    $(window).on('load',function(){
        $(".searchi").attr("src","css/img/searchf.png");
    });
</script>
@endsection
