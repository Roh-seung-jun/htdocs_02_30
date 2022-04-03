<?php

namespace App\Http\Controllers;

use App\Event;
use App\Item;
use App\Map;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SetController extends Controller
{
    public function admin(){
        return view('admin');
    }
    public function login(Request $request){
        $user = User::find($request['id']);
        if(!$user || $user['pass'] !== $request['pass']){
            return back()->with('msg','입력하진 정보가 올바르지 않습니다.');
        }
        Auth::login($user);
        return redirect('/')->with('msg','환영합니다.');
    }
    public function logout(){
        Auth::logout(auth()->user());
        return redirect('/');
    }
    public function mset(){
        $data = Map::all();
        return view('mset',compact(['data']));
    }
    public function eset(Request $request){
        $data = Event::all();
        if($request['date']){
            $data = Event::where('date',$request['date'])->get();
        }
        return view('eset',compact(['data']));
    }

    public function setMap(Request $request){
        foreach ($request['item'] as $idx => $itemData){
            $item = Item::find($request['item_id'][$idx]);
            $item->update([
               'item' => $itemData,
                'map_id' => $request['map_id']
            ]);
        }
        if($request['file_name']){
            $time = time();
            $request['file_name']->move(base_path('./특산품/'),$time.'.jpg');
            $map = Map::find($request['map_id']);
            $map->update([
                'most' => $request['item'][0],
                'file_name' => $time.'.jpg'
            ]);
        }
        return back();
    }
}
