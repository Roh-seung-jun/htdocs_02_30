@extends('layout')

@section('contents')
    <img src="./사진/photo%20(3).jpg" alt="" class="position-fixed w-100 h-100 back_img">

    <div class="h-100 d-flex justify-content-center align-items-center flex-column" style="color: #fff;">
        <form class="w-25 text-center" action="{{route('login')}}" method="post">
            @csrf
            <h2>로그인</h2>
            <input type="text" name="id" class="form-control m-2" placeholder="id">
            <input type="text" name="pass" class="form-control m-2" placeholder="pass">
            <button type="submit" class="btn btn-outline-light">로그인</button>
        </form>
    </div>
    @endsection
