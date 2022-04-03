@extends('layout')
@section('contents')
    <img src="./사진/photo%20(17).jpg" alt="" class="position-fixed w-100 h-100 back_img">

    <div class="w-100 d-flex justify-content-center align-items-center flex-column">
        <h1 class="" style="color: #fff;margin-top: 100px">특산품 정보 변경</h1>
        <table class="table w-75" style="color: #fff; margin-top: 50px;">
            <thead>
            <tr>
                <th>지역명</th>
                <th>대표 특산품</th>
                <th>이미지 경로</th>
                <th>특사품</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $idx => $item)
            <tr>
                <td>{{$item['id']}}</td>
                <td>{{$item['most']}}</td>
                <td>{{$item['file_name']}}</td>
                <td>
                    @foreach($item->items as $t)
                    {{$t['item']}},
                        @endforeach
                </td>
                <td><button class="btn btn-success" data-target="#map_{{$idx}}" data-toggle="modal">변경</button></td>
            </tr>

            <div class="modal fade" id="map_{{$idx}}">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3>변경</h3>
                        </div>
                        <form action="{{route('setMap')}}" method="post" enctype="multipart/form-data">
                            @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <p class="m-0">특산품</p>
                                @foreach($item->items as $t)
                                    @if($item['most'] == $t['item'])
                                    <input type="text" name="item[]" class="form-control" readonly value="{{$t['item']}}">
                                    @else
                                        <input type="text" name="item[]" class="form-control" value="{{$t['item']}}">
                                        @endif
                                        <input type="text" name="item_id[]" class="d-none" value="{{$t['id']}}">
                                @endforeach
                                <input type="text" class="d-none" name="map_id" value="{{$item['id']}}">
                            </div>
                            <div class="form-group">
                                <p class="m-0">이미지 변경</p>
                                <input type="file" name="file_name" class="form-control-file">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-outline-success">변경</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
