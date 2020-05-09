@extends('layouts.app')

@section('content')
<!-- <body> -->
    @if ($errors->any())
    <div class="errors">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="memofield">
        <form action="{{ url('/account/upload') }}" method="post" enctype="multipart/form-data" class="memo">
            {{ csrf_field() }}
            <h1 class="memotitle">Name</h1>
            <input type="text" name="name" class="input spot" value="{{$name}}">

            <h1 class="memotitle">Icon</h1>
            <div class="form-group">
                <input id="fileUploader" type="file" name="img" accept='image/*' enctype="multipart/form-data" multiple="multiple" required autofocus class="account">
            </div>
            <a href="hometl">
                <button type="button" class="btn btn-default submit-btn">Cancel</button>
            </a>
            <button type="submit" class="btn btn-primary submit-btn s-b-save">Save</button>
        </form>
    </div>
    
<!-- </body> -->
@endsection