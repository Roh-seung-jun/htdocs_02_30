<?php

namespace App\Http\Controllers;

use App\File;
use App\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index(){
        $data = Review::orderBy('id','DESC')->paginate(10);
        return view('sub_3',compact(['data']));
    }

    public function submit(Request $request){
        $input = $request->only(['name','score','contents','shop','product']);
        $input['purchase-date'] = $request['date'];
        $review = Review::create($input);
        foreach ($request['files'] as $idx => $file){
            $img = base64_decode(explode(',',$file)[1]);
            $url = './특산품/'.time().'_'.$idx.'.jpg';
            file_put_contents($url,$img);
            $input = [
                'review_id' => $review['id'],
                'file_name' => $url
            ];
            File::create($input);
        }
        return ['구매후기가 등록되었습니다.',$review];
    }

    public function load(Request $request){
        $file = [];
        $data = Review::orderBy('id','DESC')->paginate(10);
        foreach ($data as $item){
            array_push($file,$item->files);
        }
        return [$data,$file];
    }

    public function show(Request $request){
        return [Review::find($request['id']),Review::find($request['id'])->files];
    }
}
