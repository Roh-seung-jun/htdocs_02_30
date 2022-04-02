<?php

namespace App\Http\Controllers;

use App\Item;
use App\Map;
use Illuminate\Http\Request;

class MapController extends Controller
{
    public function index(){
        $data = [
            '거제시' => Map::find('거제시'),
            '거창군' => Map::find('거창군'),
            '고성군' => Map::find('고성군'),
            '김해시' => Map::find('김해시'),
            '남해군' => Map::find('남해군'),
            '밀양시' => Map::find('밀양시'),
            '사천시' => Map::find('사천시'),
            '산청군' => Map::find('산청군'),
            '양산시' => Map::find('양산시'),
            '의령군' => Map::find('의령군'),
            '진주시' => Map::find('진주시'),
            '창녕군' => Map::find('창녕군'),
            '창원시' => Map::find('창원시'),
            '통영시' => Map::find('통영시'),
            '하동군' => Map::find('하동군'),
            '함안군' => Map::find('함안군'),
            '함양군' => Map::find('함양군'),
            '합천군' => Map::find('합천군'),
        ];
        return view('sub_1',compact(['data']));
    }
}
