<?php

namespace App\Http\Controllers;

use App\File;
use App\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index(){
        $data = [];
        $data['list'] = Review::orderBy('id','DESC')->paginate(10);
        return view('sub_3',compact(['data']))->with('msg','아아');
    }
    public function make(Request $request){
        $input = $request->only(['name','shop','product','purchase-date','score','contents']);
        $id = Review::create($input);
        foreach ($request['files'] as $idx => $file){
            $data = explode(',',$file)[1];
            $url = './reviews/'.time().'_'.$idx.'.jpg';
            file_put_contents($url,base64_decode($data));
            File::create([
                'file_name' => $url,
                'review_id' => $id['id']
            ]);
        }
        return [$id,$id->files];
    }
    public function load(){
        $data = Review::orderBy('id','DESC')->paginate(10);
        $file = [];
        for( $i = 0 ; $i < $data->count();$i++){
            array_push($file,$data[$i]->files);
        }
        return [$data,$file];
    }
    public function join(Request $request){

        print_r(Review::orderBy('id','DESC')->paginate($request['last-key']));
    }
    public function view(Request $request){
        return [Review::find($request['id']),Review::find($request['id'])->files];
    }
}
