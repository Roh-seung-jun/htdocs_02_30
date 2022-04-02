@extends('layout')
@section('contents')
<img src="./사진/photo%20(3).jpg" alt="" class="position-fixed w-100 h-100 back_img">
<div class="d-flex justify-content-center align-items-center flex-column">
    <img src="./사진/event.png" alt="" style="margin-top: 50px;">
    <div class="stamp">
        <img src="./사진/stamp_1.png" alt="" style="margin-top: 70px;">
    </div>
    <div class="d-flex setBox align-items-center justify-content-between w-50">
        <p class="m-0 cnt ml-5">찾은 카드 수 : 1</p>
        <div class="d-flex justify-content-center align-items-center">
            <button class="btn btn-outline-light m-1 start">게임시작</button>
            <button class="btn btn-outline-light m-1 reload d-none">다시하기</button>
            <button class="btn btn-outline-light m-1 hint">힌트보기</button>
        </div>
        <p class="m-0 time mr-5">남은 시간 : 31초</p>
    </div>
    <div class="card_list d-flex flex-wrap w-50 justify-content-center">
        <div class="card">
            <div class="card_event w-100 h-100 position-relative change">
                <div class="front position-absolute w-100 h-100 d-flex justify-content-center align-items-center"><img
                        src="./사진/card.png" alt=""></div>
                <div class="back position-absolute w-100 h-100 d-flex justify-content-center align-items-center">
                    <img src="./특산품/합천군_돼지고기.jpg" alt="" class="position-absolute w-100 h-100">
                    <p class="">합천군</p>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card_event w-100 h-100 position-relative change">
                <div class="front position-absolute w-100 h-100 d-flex justify-content-center align-items-center"><img
                        src="./사진/card.png" alt=""></div>
                <div class="back position-absolute w-100 h-100 d-flex justify-content-center align-items-center">
                    <img src="./특산품/합천군_돼지고기.jpg" alt="" class="position-absolute w-100 h-100">
                    <p class="">합천군</p>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card_event w-100 h-100 position-relative">
                <div class="front position-absolute w-100 h-100 d-flex justify-content-center align-items-center"><img
                        src="./사진/card.png" alt=""></div>
                <div class="back position-absolute w-100 h-100 d-flex justify-content-center align-items-center">
                    <img src="./특산품/합천군_돼지고기.jpg" alt="" class="position-absolute w-100 h-100">
                    <p class="">돼지고기</p>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card_event w-100 h-100 position-relative">
                <div class="front position-absolute w-100 h-100 d-flex justify-content-center align-items-center"><img
                        src="./사진/card.png" alt=""></div>
                <div class="back position-absolute w-100 h-100 d-flex justify-content-center align-items-center">
                    <img src="./특산품/합천군_돼지고기.jpg" alt="" class="position-absolute w-100 h-100">
                    <p class="">돼지고기</p>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card_event w-100 h-100 position-relative">
                <div class="front position-absolute w-100 h-100 d-flex justify-content-center align-items-center"><img
                        src="./사진/card.png" alt=""></div>
                <div class="back position-absolute w-100 h-100 d-flex justify-content-center align-items-center">
                    <img src="./특산품/합천군_돼지고기.jpg" alt="" class="position-absolute w-100 h-100">
                    <p class="">돼지고기</p>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card_event w-100 h-100 position-relative">
                <div class="front position-absolute w-100 h-100 d-flex justify-content-center align-items-center"><img
                        src="./사진/card.png" alt=""></div>
                <div class="back position-absolute w-100 h-100 d-flex justify-content-center align-items-center">
                    <img src="./특산품/합천군_돼지고기.jpg" alt="" class="position-absolute w-100 h-100">
                    <p class="">돼지고기</p>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card_event w-100 h-100 position-relative">
                <div class="front position-absolute w-100 h-100 d-flex justify-content-center align-items-center"><img
                        src="./사진/card.png" alt=""></div>
                <div class="back position-absolute w-100 h-100 d-flex justify-content-center align-items-center">
                    <img src="./특산품/합천군_돼지고기.jpg" alt="" class="position-absolute w-100 h-100">
                    <p class="">돼지고기</p>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card_event w-100 h-100 position-relative">
                <div class="front position-absolute w-100 h-100 d-flex justify-content-center align-items-center"><img
                        src="./사진/card.png" alt=""></div>
                <div class="back position-absolute w-100 h-100 d-flex justify-content-center align-items-center">
                    <img src="./특산품/합천군_돼지고기.jpg" alt="" class="position-absolute w-100 h-100">
                    <p class="">돼지고기</p>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card_event w-100 h-100 position-relative">
                <div class="front position-absolute w-100 h-100 d-flex justify-content-center align-items-center"><img
                        src="./사진/card.png" alt=""></div>
                <div class="back position-absolute w-100 h-100 d-flex justify-content-center align-items-center">
                    <img src="./특산품/합천군_돼지고기.jpg" alt="" class="position-absolute w-100 h-100">
                    <p class="">돼지고기</p>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card_event w-100 h-100 position-relative">
                <div class="front position-absolute w-100 h-100 d-flex justify-content-center align-items-center"><img
                        src="./사진/card.png" alt=""></div>
                <div class="back position-absolute w-100 h-100 d-flex justify-content-center align-items-center">
                    <img src="./특산품/합천군_돼지고기.jpg" alt="" class="position-absolute w-100 h-100">
                    <p class="">돼지고기</p>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card_event w-100 h-100 position-relative">
                <div class="front position-absolute w-100 h-100 d-flex justify-content-center align-items-center"><img
                        src="./사진/card.png" alt=""></div>
                <div class="back position-absolute w-100 h-100 d-flex justify-content-center align-items-center">
                    <img src="./특산품/합천군_돼지고기.jpg" alt="" class="position-absolute w-100 h-100">
                    <p class="">돼지고기</p>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card_event w-100 h-100 position-relative">
                <div class="front position-absolute w-100 h-100 d-flex justify-content-center align-items-center"><img
                        src="./사진/card.png" alt=""></div>
                <div class="back position-absolute w-100 h-100 d-flex justify-content-center align-items-center">
                    <img src="./특산품/합천군_돼지고기.jpg" alt="" class="position-absolute w-100 h-100">
                    <p class="">돼지고기</p>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card_event w-100 h-100 position-relative">
                <div class="front position-absolute w-100 h-100 d-flex justify-content-center align-items-center"><img
                        src="./사진/card.png" alt=""></div>
                <div class="back position-absolute w-100 h-100 d-flex justify-content-center align-items-center">
                    <img src="./특산품/합천군_돼지고기.jpg" alt="" class="position-absolute w-100 h-100">
                    <p class="">돼지고기</p>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card_event w-100 h-100 position-relative">
                <div class="front position-absolute w-100 h-100 d-flex justify-content-center align-items-center"><img
                        src="./사진/card.png" alt=""></div>
                <div class="back position-absolute w-100 h-100 d-flex justify-content-center align-items-center">
                    <img src="./특산품/합천군_돼지고기.jpg" alt="" class="position-absolute w-100 h-100">
                    <p class="">돼지고기</p>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card_event w-100 h-100 position-relative">
                <div class="front position-absolute w-100 h-100 d-flex justify-content-center align-items-center"><img
                        src="./사진/card.png" alt=""></div>
                <div class="back position-absolute w-100 h-100 d-flex justify-content-center align-items-center">
                    <img src="./특산품/합천군_돼지고기.jpg" alt="" class="position-absolute w-100 h-100">
                    <p class="">돼지고기</p>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card_event w-100 h-100 position-relative">
                <div class="front position-absolute w-100 h-100 d-flex justify-content-center align-items-center"><img
                        src="./사진/card.png" alt=""></div>
                <div class="back position-absolute w-100 h-100 d-flex justify-content-center align-items-center">
                    <img src="./특산품/합천군_돼지고기.jpg" alt="" class="position-absolute w-100 h-100">
                    <p class="">돼지고기</p>
                </div>
            </div>
        </div>
    </div>
</div>
<p class="w-100 text-center" style="z-index: 9123123;color: #ccc;">“Copyright (C) Gyeongsangbuk-do. All Rights Reserved</p>

<div class="modal fade" id="card_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3>이벤트 참여</h3>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <p class="m-0">이름</p>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <p class="m-0">휴대전화 번호</p>
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
