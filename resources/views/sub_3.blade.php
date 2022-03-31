@extends('lay')
@section('script')
    <script>
        page = 1;
        $(window).scroll(function(){
            const sc = $(window).scrollTop();
            if(sc === $(document).height() - $(window).height()){
                page++;
                $.ajax({
                    type : 'post',
                    url : '/load',
                    data : {
                        page,
                        _token : $('meta[name="csrd"]').attr('content')
                    },
                    success : function(res){
                        let text = '';
                        console.log(res);
                        res[0].data.forEach((e,idx)=>{
                            text += `
                            <div class="review_box d-flex flex-column justify-content-between">
                                <p class="gray">${e['purchase-date']}</p>
                                    <div class="d-flex justify-content-between align-items-end">
                                        <h3>${e['product']}</h3>
                                        <p class="gray">${e.name}</p>
                                    </div>
                                    <p class="gray">${e.contents.slice(0,50)}</p>
                                    <div class="img_list">`;
                            res[1][idx].forEach(qe=>{
                                text += `<img src="${qe.file_name}" alt="" style="width: 50px;height: 50px;">`
                            })
                            text +=`
                                    </div>
                                    <div class="d-flex justify-content-between">
                                       <span class="star position-relative" style="font-size: 2rem;color: #ccc">
                    ★★★★★
                    <span style="overflow: hidden;width: ${e.score * 10}%;color: #fff959;position:absolute;left: 0;cursor:pointer;">★★★★★</span>
                </span>
                                        <button class="btn btn-outline-light view" data-id="${e.id}" data-toggle="modal" data-target="#view">상세보기</button>
                                    </div>
                                </div>
                            `;
                        })
                        $('.review_list').append(text);
                    }
                })
            }
        })
    </script>
@endsection
@section('contents')
<img src="./사진/photo%20(21).jpg" alt="" class="position-fixed sub_img w-100 h-100 img_1">
<div class="w-100 d-flex justify-content-center align-items-center flex-column" style="color: #fff;">
    <img src="./사진/review.png" alt="" style="margin-top: 50px">
    <div class="main_text d-flex align-items-end w-75" style="border-bottom: 2px solid #ccc;padding-bottom: 10px;margin-bottom: 40px;">
        <h1 class="m-0">Review</h1>
        <p class="m-0">리뷰 작성</p>
    </div>
    <div class="w-75 review_list d-flex flex-wrap">
        @foreach($data['list'] as $item)
        <div class="review_box d-flex flex-column justify-content-between">
            <p class="gray">{{$item['purchase-date']}}</p>
            <div class="d-flex justify-content-between align-items-end">
                <h3>{{$item['product']}}</h3>
                <p class="gray">{{$item['name']}}</p>
            </div>
            <p class="gray">{{substr($item['contents'],0,50)}}...</p>
            <div class="img_list">
                @foreach($item->files as $file)
                <img src="{{$file['file_name']}}" alt="" style="width: 50px;height: 50px;">
                @endforeach
            </div>
            <div class="d-flex justify-content-between">
                <span class="star position-relative" style="font-size: 2rem;color: #ccc">
                    ★★★★★
                    <span style="overflow: hidden;width: {{$item['score'] * 10}}%;color: #fff959;position:absolute;left: 0;cursor:pointer;">★★★★★</span>
                </span>
                <button class="btn btn-outline-light view" data-id="{{$item['id']}}" data-toggle="modal" data-target="#view">상세보기</button>
            </div>
        </div>

        @endforeach
{{--        <div class="review_box d-flex flex-column justify-content-between">--}}
{{--            <p class="gray">2022-04-04</p>--}}
{{--            <div class="d-flex justify-content-between align-items-end">--}}
{{--                <h3>모험의 서</h3>--}}
{{--                <p class="gray">승준</p>--}}
{{--            </div>--}}
{{--            <p class="gray">contents</p>--}}
{{--            <div class="img_list">--}}
{{--                <img src="./사진/stamp_1.png" alt="" style="width: 50px;height: 50px;">--}}
{{--            </div>--}}
{{--            <div class="d-flex justify-content-between">--}}
{{--                <span class="position-relative">--}}
{{--                    ★★★★★--}}
{{--                    <span class="position-absolute" style="left: 0;width: 0">★★★★★</span>--}}
{{--                </span>--}}
{{--                <button class="btn btn-outline-light">상세보기</button>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="review_box d-flex flex-column justify-content-between">--}}
{{--            <p class="gray">2022-04-04</p>--}}
{{--            <div class="d-flex justify-content-between align-items-end">--}}
{{--                <h3>모험의 서</h3>--}}
{{--                <p class="gray">승준</p>--}}
{{--            </div>--}}
{{--            <p class="gray">contents</p>--}}
{{--            <div class="img_list">--}}
{{--                <img src="./사진/stamp_1.png" alt="" style="width: 50px;height: 50px;">--}}
{{--            </div>--}}
{{--            <div class="d-flex justify-content-between">--}}
{{--                <span class="position-relative">--}}
{{--                    ★★★★★--}}
{{--                    <span class="position-absolute" style="left: 0;width: 0">★★★★★</span>--}}
{{--                </span>--}}
{{--                <button class="btn btn-outline-light">상세보기</button>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="review_box d-flex flex-column justify-content-between">--}}
{{--            <p class="gray">2022-04-04</p>--}}
{{--            <div class="d-flex justify-content-between align-items-end">--}}
{{--                <h3>모험의 서</h3>--}}
{{--                <p class="gray">승준</p>--}}
{{--            </div>--}}
{{--            <p class="gray">contents</p>--}}
{{--            <div class="img_list">--}}
{{--                <img src="./사진/stamp_1.png" alt="" style="width: 50px;height: 50px;">--}}
{{--            </div>--}}
{{--            <div class="d-flex justify-content-between">--}}
{{--                <span class="position-relative">--}}
{{--                    ★★★★★--}}
{{--                    <span class="position-absolute" style="left: 0;width: 0">★★★★★</span>--}}
{{--                </span>--}}
{{--                <button class="btn btn-outline-light">상세보기</button>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="review_box d-flex flex-column justify-content-between">--}}
{{--            <p class="gray">2022-04-04</p>--}}
{{--            <div class="d-flex justify-content-between align-items-end">--}}
{{--                <h3>모험의 서</h3>--}}
{{--                <p class="gray">승준</p>--}}
{{--            </div>--}}
{{--            <p class="gray">contents</p>--}}
{{--            <div class="img_list">--}}
{{--                <img src="./사진/stamp_1.png" alt="" style="width: 50px;height: 50px;">--}}
{{--            </div>--}}
{{--            <div class="d-flex justify-content-between">--}}
{{--                <span class="position-relative">--}}
{{--                    ★★★★★--}}
{{--                    <span class="position-absolute" style="left: 0;width: 0">★★★★★</span>--}}
{{--                </span>--}}
{{--                <button class="btn btn-outline-light">상세보기</button>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
</div>
</div>
{{--<div class="" style="position: absolute; z-index: 3850939789;left: 50%;top: 95%;transform: translate(-50%,-50%)"><p>Copyright (C) Gyeongsangbuk-do.All Rights Reserved.</p></div>--}}
<button class="btn btn-outline-light position-fixed" style="top: 95%;left: 95%;z-index: 9809;" data-toggle="modal" data-target="#review">후기 작성</button>
<div class="modal fade" id="review" style="color: #000;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2>후기작성</h2>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <p class="m-0">이름</p>
                    <input type="text" name="name" class="form-control">
                </div>

                <div class="form-group">
                    <p class="m-0">구매처</p>
                    <input type="text" name="shop" class="form-control">
                </div>
                <div class="form-group">
                    <p class="m-0">구매품</p>
                    <input type="text" name="product" class="form-control">
                </div>
                <div class="form-group">
                    <p class="m-0">구매일</p>
                    <input type="date" name="date" class="form-control">
                </div>
                <div class="form-group">
                    <p class="m-0">내용</p>
                    <textarea name="contents" id="" cols="30" rows="4" class="form-control"></textarea>
                </div>
                <span class="star position-relative" style="font-size: 2rem;color: #ccc">
                    ★★★★★
                    <span style="overflow: hidden;width: 0;color: red;position:absolute;left: 0;cursor:pointer;">★★★★★</span>
                    <input type="range" value="1" max="10" min="1" step="1" name="score" style="position:absolute;left: 0;pointer-events: painted;opacity: 0" class="w-100 m-0 h-100">
                </span>
                <div class="file_div">
                    <input type="file" name="file" id="file" class="form-control-file file_input" accept=".jpg">
                </div>
            <div class="modal-footer">
                <button class="close btn-outline-secondary btn">닫기</button>
                <button class="btn btn-light file_add">파일추가</button>
                <button class="btn btn-outline-success review_submit">등록</button>
            </div>
        </div>
    </div>
</div>
</div>
    <div class="modal fade" id="view" style="color: #000;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2>후기작성</h2>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <p class="m-0">이름</p>
                        <input type="text" name="name" class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <p class="m-0">구매처</p>
                        <input type="text" name="shop" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <p class="m-0">구매품</p>
                        <input type="text" name="product" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <p class="m-0">구매일</p>
                        <input type="date" name="date" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <p class="m-0">내용</p>
                        <textarea name="contents" id="" cols="30" rows="4" class="form-control" readonly></textarea>
                    </div>
                    <span class="star position-relative" style="font-size: 2rem;color: #ccc">
                    ★★★★★
                    <span style="overflow: hidden;width: 0;color: red;position:absolute;left: 0;cursor:pointer;">★★★★★</span>
                </span>
                    <div class="file_list">

                    </div>
                    <div class="modal-footer">
                        <button class="close btn-outline-secondary btn">닫기</button>
                        <button class="back_page view btn btn-outline-success">이전글</button>
                        <button class="next view btn btn-outline-success">다음글</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

@endsection
