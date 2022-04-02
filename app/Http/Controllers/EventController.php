<?php

namespace App\Http\Controllers;

use App\Event;
use DateTime;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(){
        return view('sub_2');
    }
    public function submit(Request $request){
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
                return  ['이벤트에 참여해주셔서 감사합니다.',1];
            }else if($diff->d === 0 ){
                return ['하루에 한번만 참여가능합니다.',$find['cnt']];
            }else{
                $input['cnt'] += $find['cnt'];
                $input['score'] += $input['score'];
                $find->update($input);
                if($input['cnt'] === 3)return ['“축하합니다. 3일연속 출석하여 경품선정 대상자가 되었습니다.',$find['cnt']];
                return ['이벤트에 참여해주셔서 감사합니다.',$find['cnt']];
            }
        }else{
            Event::create($input);
            return ['이벤트에 참여해주셔서 감사합니다.',1];
        }
    }
}
