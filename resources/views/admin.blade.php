@extends('lay')
@section('contents')
    <img src="./사진/photo%20(3).jpg" alt="" class="position-fixed sub_img w-100 h-100 img_1">

<div class="w-100 d-flex justify-content-center align-items-center flex-column" style="height: 100vh">
    <h1 style="color:#fff;">관리자 로그인</h1>
    <form action="{{route('admin')}}" method="post"class="d-flex align-items-center flex-column">
        @csrf
        <input type="text" name="id" class="form-control m-1" placeholder="id" required>
        <input type="text" name="pass" class="form-control m-1" placeholder="password" required>
        <button class="btn btn-outline-light mt-2">로그인</button>
    </form>
</div>

@endsection
