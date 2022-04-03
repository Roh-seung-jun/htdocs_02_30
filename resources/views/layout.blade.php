<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta id="csrf" content="{{csrf_token()}}">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <script src="./js/jquery-3.6.0.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/script.js"></script>
    @yield('script')
    <script>
        @if(session()->has('msg'))
            alert('{{session()->get('msg')}}');
        @endif
    </script>
</head>
<body style="height: 100vh">
<input type="radio" name="open" id="open" class="d-none" >
<input type="radio" name="open" id="close" class="d-none" checked>
<input type="checkbox" name="icon" id="icon" class="d-none">
<img src="./사진/text.png" alt="" class="position-absolute">
<div class="position-fixed menu d-flex h-100">
    <div class="icon_box position-relative d-flex flex-column">
        <label for="open" class="d-flex justify-content-center align-items-center position-absolute open_label _open"><img src="./사진/open.png"
                                                                                                                           alt=""></label>
        <label for="close" class="d-flex justify-content-center align-items-center position-absolute open_label _close"><img src="./사진/close.png"
                                                                                                                             alt=""></label>
        <label for="icon" class="d-flex justify-content-center align-items-center share">
            <img src="./사진/share.png" alt="">
        </label>
        <label for="icon" class="d-flex justify-content-center align-items-center so_1 so">
            <img src="./사진/so_1.png" alt="">
        </label>
        <label for="icon" class="d-flex justify-content-center align-items-center so_2 so">
            <img src="./사진/so_2.png" alt="">
        </label>
        <label for="icon" class="d-flex justify-content-center align-items-center so_3 so">
            <img src="./사진/so_3.png" alt="">
        </label>
    </div>
    <div class="menu_box h-100 d-flex flex-column">
        <p><a href="{{route('/')}}">메인 페이지</a></p>
        <p><a href="{{route('map')}}">특산품 안내</a></p>
        <p><a href="{{route('event')}}">이벤트</a></p>
        <p><a href="{{route('review')}}">구매후기</a></p>
        @if(auth()->user())
            <p><a href="{{route('logout')}}">로그아웃</a></p>
            <p><a href="{{route('mset')}}">특산품 관리</a></p>
            <p><a href="{{route('eset')}}">이벤트 관리</a></p>
        @else
            <p><a href="{{route('admin')}}">로그인</a></p>
        @endif
    </div>
</div>

@yield('contents')
