@extends('layout')
@section('contents')
    <img src="./사진/photo%20(24).jpg" alt="" class="position-fixed w-100 h-100 back_img">

    <div class="w-100 d-flex justify-content-center align-items-center flex-column">
        <h1 class="" style="color: #fff;margin-top: 100px">
            이벤트 현황 조회
        </h1>
        <div class="w-25 h-25">
            <form action="{{route('eset')}}" method="get" class="d-flex">
                @csrf
                <input type="date" class="form-control w-75" name="date">
                <button class="btn btn-outline-light" type="submit">검색</button>
            </form>
        </div>
        <table class="table w-75" style="color: #fff; margin-top: 50px;text-align: center">
            <thead>
            <tr>
                <th>이름</th>
                <th>휴대전화</th>
                <th>점수</th>
                <th>날짜</th>
                <th>연속 출석일</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $item)
                @if($item['cnt'] == 3)
                <tr style="background: rgba(11,208,236,0.36)">
                    <td>{{$item['name']}}</td>
                    <td>{{$item['phone']}}</td>
                    <td>{{$item['score']}}</td>
                    <td>{{$item['date']}}</td>
                    <td>{{$item['cnt']}}</td>
                </tr>
                @else
                    <tr>
                        <td>{{$item['name']}}</td>
                        <td>{{$item['phone']}}</td>
                        <td>{{$item['score']}}</td>
                        <td>{{$item['date']}}</td>
                        <td>{{$item['cnt']}}</td>
                    </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
