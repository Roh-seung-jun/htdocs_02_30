@extends('lay')

@section('script')
    <script>

    </script>
@endsection
@section('contents')
<img src="./사진/photo%20(3).jpg" alt="" class="position-fixed sub_img w-100 h-100 img_1">
    <div class="w-100 d-flex justify-content-center align-items-center flex-column">
        <img src="./사진/event.png" alt="" style="margin-top: 50px">
        <img src="./사진/stamp_1.png" alt="" class="stamp">
        <div class="w-50 d-flex box d-flex justify-content-between align-items-center" style="color:#fff;">
            <p class="m-0 ml-5">찾은 카드 수 : 1</p>
            <div class="d-flex">
                <button class="btn btn-primary start mr-1">게임시작</button>
                <button class="btn btn-primary reload d-none mr-1">다시하기</button>
                <button class="btn btn-primary hint mr-1">힌트보기</button>
            </div>
            <p class="m-0 mr-5 count">남은 시간 : 1분 30초</p>
        </div>
        <div class="w-50 card_list d-flex justify-content-center align-items-center flex-wrap">
            <div class="card">
                <div class="card_event w-100 h-100 position-relative change">
                    <div class="front position-absolute w-100 h-100 d-flex justify-content-center align-items-center">
                        <img src="./사진/card.png" alt="">
                    </div>
                    <div class="back position-absolute w-100 h-100 d-flex justify-content-center align-items-center">
                        <img src="./특산품/합천군_돼지고기.jpg" alt="" class="position-absolute" style="z-index: -3">
                        <p>돼지고기</p>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card_event w-100 h-100 position-relative change">
                    <div class="front position-absolute w-100 h-100 d-flex justify-content-center align-items-center">
                        <img src="./사진/card.png" alt="">
                    </div>
                    <div class="back position-absolute w-100 h-100 d-flex justify-content-center align-items-center">
                        <img src="./특산품/합천군_돼지고기.jpg" alt="" class="position-absolute" style="z-index: -3">
                        <p>돼지고기</p>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card_event w-100 h-100 position-relative">
                    <div class="front position-absolute w-100 h-100 d-flex justify-content-center align-items-center">
                        <img src="./사진/card.png" alt="">
                    </div>
                    <div class="back position-absolute w-100 h-100 d-flex justify-content-center align-items-center">
                        <img src="./특산품/합천군_돼지고기.jpg" alt="" class="position-absolute" style="z-index: -3">
                        <p>돼지고기</p>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card_event w-100 h-100 position-relative">
                    <div class="front position-absolute w-100 h-100 d-flex justify-content-center align-items-center">
                        <img src="./사진/card.png" alt="">
                    </div>
                    <div class="back position-absolute w-100 h-100 d-flex justify-content-center align-items-center">
                        <img src="./특산품/합천군_돼지고기.jpg" alt="" class="position-absolute" style="z-index: -3">
                        <p>돼지고기</p>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card_event w-100 h-100 position-relative">
                    <div class="front position-absolute w-100 h-100 d-flex justify-content-center align-items-center">
                        <img src="./사진/card.png" alt="">
                    </div>
                    <div class="back position-absolute w-100 h-100 d-flex justify-content-center align-items-center">
                        <img src="./특산품/합천군_돼지고기.jpg" alt="" class="position-absolute" style="z-index: -3">
                        <p>돼지고기</p>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card_event w-100 h-100 position-relative">
                    <div class="front position-absolute w-100 h-100 d-flex justify-content-center align-items-center">
                        <img src="./사진/card.png" alt="">
                    </div>
                    <div class="back position-absolute w-100 h-100 d-flex justify-content-center align-items-center">
                        <img src="./특산품/합천군_돼지고기.jpg" alt="" class="position-absolute" style="z-index: -3">
                        <p>돼지고기</p>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card_event w-100 h-100 position-relative">
                    <div class="front position-absolute w-100 h-100 d-flex justify-content-center align-items-center">
                        <img src="./사진/card.png" alt="">
                    </div>
                    <div class="back position-absolute w-100 h-100 d-flex justify-content-center align-items-center">
                        <img src="./특산품/합천군_돼지고기.jpg" alt="" class="position-absolute" style="z-index: -3">
                        <p>돼지고기</p>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card_event w-100 h-100 position-relative">
                    <div class="front position-absolute w-100 h-100 d-flex justify-content-center align-items-center">
                        <img src="./사진/card.png" alt="">
                    </div>
                    <div class="back position-absolute w-100 h-100 d-flex justify-content-center align-items-center">
                        <img src="./특산품/합천군_돼지고기.jpg" alt="" class="position-absolute" style="z-index: -3">
                        <p>돼지고기</p>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card_event w-100 h-100 position-relative">
                    <div class="front position-absolute w-100 h-100 d-flex justify-content-center align-items-center">
                        <img src="./사진/card.png" alt="">
                    </div>
                    <div class="back position-absolute w-100 h-100 d-flex justify-content-center align-items-center">
                        <img src="./특산품/합천군_돼지고기.jpg" alt="" class="position-absolute" style="z-index: -3">
                        <p>돼지고기</p>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card_event w-100 h-100 position-relative">
                    <div class="front position-absolute w-100 h-100 d-flex justify-content-center align-items-center">
                        <img src="./사진/card.png" alt="">
                    </div>
                    <div class="back position-absolute w-100 h-100 d-flex justify-content-center align-items-center">
                        <img src="./특산품/합천군_돼지고기.jpg" alt="" class="position-absolute" style="z-index: -3">
                        <p>돼지고기</p>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card_event w-100 h-100 position-relative">
                    <div class="front position-absolute w-100 h-100 d-flex justify-content-center align-items-center">
                        <img src="./사진/card.png" alt="">
                    </div>
                    <div class="back position-absolute w-100 h-100 d-flex justify-content-center align-items-center">
                        <img src="./특산품/합천군_돼지고기.jpg" alt="" class="position-absolute" style="z-index: -3">
                        <p>돼지고기</p>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card_event w-100 h-100 position-relative">
                    <div class="front position-absolute w-100 h-100 d-flex justify-content-center align-items-center">
                        <img src="./사진/card.png" alt="">
                    </div>
                    <div class="back position-absolute w-100 h-100 d-flex justify-content-center align-items-center">
                        <img src="./특산품/합천군_돼지고기.jpg" alt="" class="position-absolute" style="z-index: -3">
                        <p>돼지고기</p>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card_event w-100 h-100 position-relative">
                    <div class="front position-absolute w-100 h-100 d-flex justify-content-center align-items-center">
                        <img src="./사진/card.png" alt="">
                    </div>
                    <div class="back position-absolute w-100 h-100 d-flex justify-content-center align-items-center">
                        <img src="./특산품/합천군_돼지고기.jpg" alt="" class="position-absolute" style="z-index: -3">
                        <p>돼지고기</p>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card_event w-100 h-100 position-relative">
                    <div class="front position-absolute w-100 h-100 d-flex justify-content-center align-items-center">
                        <img src="./사진/card.png" alt="">
                    </div>
                    <div class="back position-absolute w-100 h-100 d-flex justify-content-center align-items-center">
                        <img src="./특산품/합천군_돼지고기.jpg" alt="" class="position-absolute" style="z-index: -3">
                        <p>돼지고기</p>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card_event w-100 h-100 position-relative">
                    <div class="front position-absolute w-100 h-100 d-flex justify-content-center align-items-center">
                        <img src="./사진/card.png" alt="">
                    </div>
                    <div class="back position-absolute w-100 h-100 d-flex justify-content-center align-items-center">
                        <img src="./특산품/합천군_돼지고기.jpg" alt="" class="position-absolute" style="z-index: -3">
                        <p>돼지고기</p>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card_event w-100 h-100 position-relative">
                    <div class="front position-absolute w-100 h-100 d-flex justify-content-center align-items-center">
                        <img src="./사진/card.png" alt="">
                    </div>
                    <div class="back position-absolute w-100 h-100 d-flex justify-content-center align-items-center">
                        <img src="./특산품/합천군_돼지고기.jpg" alt="" class="position-absolute" style="z-index: -3">
                        <p>돼지고기</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="" style="position: absolute; z-index: 3850939789;left: 50%;top: 95%;transform: translate(-50%,-50%)"><p>Copyright (C) Gyeongsangbuk-do.All Rights Reserved.</p></div>
<div class="modal fade" id="card_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2>이벤트 참여</h2>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <p class="m-0">이름</p>
                    <input type="text" name="name" class="form-control">
                </div>

                <div class="form-group">
                    <p class="m-0">전화번호</p>
                    <input type="text" name="phone" class="form-control">
                </div>

                <div class="form-group">
                    <p class="m-0">점수</p>
                    <input type="number" name="score" class="form-control" readonly>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline-success card_submit">참여</button>
            </div>
        </div>
    </div>
</div>
</body>
</html>
@endsection
