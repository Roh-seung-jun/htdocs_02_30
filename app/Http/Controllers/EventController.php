<?php

namespace App\Http\Controllers;

use App\Event;
use App\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function index(){
        return view('sub_2');
    }
    public function join($phone){
        if(Event::find($phone)){
            print_r(Event::find($phone));
        }else{
            print_r('조회정보가 없습니다.');
        }
    }
    public function make(Request $request){
        $id = Event::find($request['phone']);
        $input = $request->only(['name','phone','score']);
        $input['cnt'] = 1;
        $input['date'] = date('Y-m-d');
        if($id){
            $first = new DateTime($input['date']);
            $second = new DateTime($id['date']);
            $diff = $first->diff($second);
            if($diff->d === 0){
                return ['하루에 한번만 참여 가능합니다.',$id['cnt']];
            }elseif($diff->d >= 2) {
                $id->update($input);
                return ['이벤트에 참여해주셔서 감사합니다.', $id['cnt']];
            }else{
                $input['cnt'] += $id['cnt'];
                $input['score'] += $input['score'];
                $id->update($input);
                if($id['cnt'] === 3) return ['축하합니다. 3일연속 출석하여 경품선정 대상자가 되었습니다.',3];
                return ['이벤트에 참여해주셔서 감사합니다.',$id['cnt']];
            }
        }else{
            Event::create($input);
            return ['이벤트에 참여해주셔서 감사합니다.',1];
        }
    }
    public function admin(){
        return view('admin');
    }
    public function login(Request $request){
        $user = User::find($request['id']);
        if(!$user || $user['pass'] !== $request['pass']) return back()->with('msg','아이디 또는 비밀번호가 일치하지 않습니다.');
        Auth::login($user);
        return redirect('/')->with('msg','관리자님 환영합니다.');
    }
    public function set(){
        return view('eset');
    }
}
