<?php

namespace App\Http\Controllers;

use App\Event;
use App\Review;
use DateTime;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function eventPost(Request $request){
        if($request['name'] == null || $request['phone'] == null || $request['score'] == null) return print_r('{"message" :오류가 발생했습니다. 다시시도 해주세요.}');
        $input = $request->only(['name','phone','score']);
        $input['date'] = date('Y-m-d');
        $input['cnt'] = 1;
        $find = Event::find($request['phone']);
        if($find){
            $first = new dateTime($input['date']);
            $second = new dateTime($find['date']);
            $diff = $first->diff($second);
            if($diff->d >= 2){
                $find->update($input);
                return  print_r('{"message" : 이벤트에 참여해주셔서 감사합니다}');
            }else if($diff->d === 0 ){
                return print_r('{"message" : 하루에 한번만 참여가능합니다.}');
            }else{
                $input['cnt'] += $find['cnt'];
                $input['score'] += $input['score'];
                $find->update($input);
                return print_r('{"message" : 이벤트에 참여해주셔서 감사합니다}');
            }
        }else{
            Event::create($input);
            return print_r('{"message" : 이벤트에 참여해주셔서 감사합니다}.');
        }
    }

    public function phone($phone){
        $join = Event::find($phone);
        if(!$join)return print_r('출석정보가 없습니다.');
        $text = '{"message" : [';
        for ($i = $join['cnt']; $i > 0; $i--){
            $text .= date('Y-m-d',strtotime($join['date'] .'-'.$i.' day')).',';
        }
        $text .= ']}';
        return print_r($text);
    }

    public function reviewPost(Request $request){
        $input = $request->only(['name','score','contents','shop','product','purchase-date']);
        if( null == $request['name'] ||  null == $request['score'] ||  null == $request['contents'] ||  null == $request['shop'] ||  null == $request['product'] ||  null == $request['purchase-date'])return print_r('필수 입력값이 누락되었습니다.');
        if(!is_numeric($request['score'])) return print_r('{"message" : 오류가 발생했습니다.다시 시도해주세요.}');
        if(DateTime::createFromFormat('Y-m-d',$request['purchase-date']) == false) return print_r('{"message" : 오류가 발생했습니다.다시 시도해주세요.(날짜 포맷 YYYY-MM-DD)}');
        $review = Review::create($input);
        return print_r('{"mssage" : "구매후기가 등록되었습니다."}');
    }

    public function review(Request $request){
        if(!Review::find($request['last-key']))return print_r('{"mssage" : "오류가 발생했습니다.다시 시도해주세요."}');
        $a = Review::orderBy('id','DESC')->skip(Review::all()->count() - $request['last-key'])->take(10)->get();
        foreach ($a as $item){
            $item['photo'] = Review::find($item['id'])->files;
        }
        return $a;
    }

    public function view($id){
        $data = Review::find($id);
        if(!$data) return print_r('{"message": "구매 후기를 찾을 수 없습니다."}');
        $text = '"name": '.$data['name'].',
"product": '.$data['product'].',
"shop": '.$data['shop'].',
"purchase-date": '.$data['purchase-date'].',
"contents": '.$data['contents'].',
"score": '.$data['score'].'
"photos" :[
';
        foreach ($data->files as $file){
            $text .= '{file : '.$file['file_name'].'},';
        }
        return print_r($text.'
        ]');
    }
}
