@extends('layout')

@section('script')
    <script>
        page = 1;
        $(window).scroll(()=>{
            const sc = $(window).scrollTop();
            if(sc === $(document).height() - $(window).height()){
                page++;
                $.ajax({
                    data : {
                        page
                    },
                    url: '/load',
                    type : 'post',
                    success : function(res){
                        let text = '';
                        res[0].data.forEach((e,idx)=>{
                            text += `
                            <div class="box">
            <p class="gray">구매일 : ${e['purchase-date']}</p>
            <div class="justify-content-between d-flex align-items-end">
                <h3 class="m-0">${e['product']}</h3>
                <p class="m-0 gray">${e['name']}</p>
            </div>
            <p class="gray content_text">${e['contents'].substr(0,50)}...</p>
            <div class="file_list">
`                           ;
                            res[1][idx].forEach(a=>{
                                text += `<img src="${a['file_name']}" alt="" style="width: 50px;height: 50px;">`;
                            })
                        text +=`</div>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="star position-relative">
                                    ★★★★★
                                    <span style="left:0;width: ${e['score'] * 10}}%;overflow: hidden;color: #ffcc33;" class="position-absolute">★★★★★</span>
                </span>
                <button class="btn btn-outline-light open_review" data-id="${e['id']}">상세보기</button>

            </div>
        </div>
`                        })
                        $('.review_list').append(text);
                    }
                })
            }
        })
        $(document).on('click','.open_review',function(){
            let id = $(this).attr('data-id');
            $('#view').modal('show');
            $.ajax({
                data:{id},
                url:'/show',
                type:'post',
                success : function(res){
                    $('input[name="_shop"]').val(res[0]['shop']);
                    $('input[name="_name"]').val(res[0]['name']);
                    $('input[name="_product"]').val(res[0]['product']);
                    $('input[name="_date"]').val(res[0]['purchase-date']);
                    $('#_contents').val(res[0]['contents']);
                    $('._asdf')[0].style.width = `${res[0]['score'] * 10}%`;

                    let file = ''

                    res[1].forEach(e=>{
                        file += `<img src="${e['file_name']}" alt="" style="width: 50px;height: 50px;">`;
                    })
                    $('._file_list').html(file);
                    $('.next').attr('data-id',res[0]['id']+1);
                    $('.pre').attr('data-id',res[0]['id']-1);
                }
            })
        })
    </script>
    @endsection
@section('contents')
<img src="./사진/photo%20(21).jpg" alt="" class="position-fixed w-100 h-100 back_img">
<div class="d-flex justify-content-center align-items-center flex-column">
    <img src="./사진/review.png" alt="" style="margin-top: 50px;">
    <div class="w-75 d-flex align-items-end" style="color: #fff;padding-bottom: 15px;border-bottom: 2px solid #fff;">
        <h1 class="m-0">R E V I E W</h1>
        <p class="m-0">리뷰작성</p>
    </div>
    <div class="review_list d-flex justify-content-start flex-wrap w-75">
        @foreach($data as $item)
        <div class="box">
            <p class="gray">구매일 : {{$item['purchase-date']}}</p>
            <div class="justify-content-between d-flex align-items-end">
                <h3 class="m-0">{{$item['product']}}</h3>
                <p class="m-0 gray">{{$item['name']}}</p>
            </div>
            <p class="gray content_text">{{mb_substr($item['contents'],0,50)}}...</p>
            <div class="file_list">
                @foreach($item->files as $file)
                <img src="{{$file['file_name']}}" alt="" style="width: 50px;height: 50px;">
                @endforeach
            </div>
            <div class="d-flex justify-content-between align-items-center">
                <span class="star position-relative">
                    ★★★★★
                    <span style="left:0;width: {{$item['score'] * 10}}%;overflow: hidden;color: #ffcc33;" class="position-absolute">★★★★★</span>
                </span>
                <button class="btn btn-outline-light open_review" data-id="{{$item['id']}}">상세보기</button>
            </div>
        </div>
        @endforeach
    </div>
    <button class="btn btn-outline-light position-fixed" style="z-index: 20;left: 90%;top: 90%" data-toggle="modal" data-target="#review_modal">후기작성</button>
    <p class="w-100 text-center" style="z-index: 9123123;color: #ccc;">“Copyright (C) Gyeongsangbuk-do. All Rights Reserved</p>


    <div class="modal fade" id="review_modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>리뷰 작성</h3>
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
                        <textarea name="contents" id="contents" cols="30" rows="4" class="form-control"></textarea>
                    </div>
                    <span class="position-relative star" style="font-size: 2rem;color: #cccccc">
                        ★★★★★
                        <span class="position-absolute asdf" style="left: 0;width: 0;color: #ffcc33;overflow: hidden;cursor: pointer">★★★★★</span>
                        <input type="range" name="score" id="score" step="1" max="10" min="1" value="1" style="left: 0;z-index:3;opacity: 0;" class="position-absolute w-100 h-100">
                    </span>
                    <div class="file_div">
                        <input type="file" name="file" id="file" class="form-control-file file_input">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="closed btn btn-outline-secondary _close">닫기</button>
                    <button class="btn btn-outline-success file_add">파일 추가</button>
                    <button class="btn btn-outline-success review_submit">작성</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="view">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3>후기 시청</h3>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <p class="m-0">이름</p>
                    <input type="text" name="_name" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <p class="m-0">구매처</p>
                    <input type="text" name="_shop" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <p class="m-0">구매품</p>
                    <input type="text" name="_product" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <p class="m-0">구매일</p>
                    <input type="date" name="_date" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <p class="m-0">내용</p>
                    <textarea name="contents" id="_contents" cols="30" rows="4" class="form-control" readonly></textarea>
                </div>
                <span class="position-relative star" style="font-size: 2rem;color: #cccccc">
                        ★★★★★
                        <span class="position-absolute _asdf" style="left: 0;width: 0;color: #ffcc33;overflow: hidden;cursor: pointer" readonly="">★★★★★</span>
                    </span>
                <div class="_file_list">

                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline-success pre open_review">이전글</button>
                <button class="btn btn-outline-success next open_review">다음글</button>
                <button class="closed btn btn-outline-secondary _close">닫기</button>
                <button class="btn btn-outline-success review_submit">작성</button>
            </div>
        </div>
    </div>
</div>
</div>
</body>
</html>
@endsection
