<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf" content="{{csrf_token()}}">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
    @yield('script')
    @yield('css')
    <script>
        @if(session()->has('msg'))
            alert({{session()->get('msg')}});
            @endif
    </script>
</head>
<body>
<input type="radio" name="open" class="d-none" id="open" >
<input type="radio" name="open" class="d-none" id="close" checked>
<input type="checkbox" name="so" class="d-none" id="so">

<img src="./사진/logo.png" alt="" style="z-index: 123123;width: 400px;height: 100px;object-fit: cover;position: absolute">
<div class="position-fixed menu d-flex h-100">
    <div class="icon_menu position-relative h-100">
        <label for="open" class="d-flex open_label label justify-content-center align-items-center position-absolute"><img src="./사진/open.png" alt="" style="width: 15px;height:75px;"></label>
        <label for="close" class="d-flex close_label label justify-content-center align-items-center position-absolute"><img src="./사진/close.png" alt="" style="width: 30px;height: 150px;"></label>
        <label for="so" class="d-flex soicon justify-content-center align-items-center"><img src="./사진/share.png" alt="" style="width: 20px;height: 20px;"></label>
        <label for="close" class="d-flex so_icon so_1 justify-content-center align-items-center"><img src="./사진/so_1.png" alt="" style="width: 20px;height: 20px;"></label>
        <label for="close" class="d-flex so_icon so_2 justify-content-center align-items-center"><img src="./사진/so_2.png" alt="" style="width: 20px;height: 20px;"></label>
        <label for="close" class="d-flex so_icon so_3 justify-content-center align-items-center"><img src="./사진/so_3.png" alt="" style="width: 20px;height: 20px;"></label>
    </div>
    <div class="menu_bar d-flex justify-content-center align-items-start h-100 flex-column pl-4">
        <p><a href="/">메인화면</a></p>
        <p><a href="{{route('map')}}">특산품 안내</a></p>
        <p><a href="{{route('event')}}">이벤트</a></p>
        <p><a href="{{route('review')}}">구매후기</a></p>
        @if(auth()->user())
            <p><a href="{{route('eset')}}">이벤트 관리</a></p>
            <p><a href="{{route('mset')}}">특산품 관리</a></p>
            @endif
    </div>
</div>

@yield('contents')
