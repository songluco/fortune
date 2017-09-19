<?php
/**
 * Created by PhpStorm.
 * User: songlu
 * Date: 2017/9/13
 * Time: 上午9:54
 */

namespace App\Http\Controllers;


class StrToLowerController extends Controller
{

    public function anyIndex()
    {
        $data = 'UPLOAD_AUDITING_FILES';
        dd(strtolower($data));
        $data_arr = explode('_', $data);


//  array:3 [▼
//  0 => "UPLOAD"
//  1 => "AUDITING"
//  2 => "FILES"
//]

        dd(explode('_', $data));
        dd(str_replace('_', '', $data));
        $str = strtolower(str_replace_array('_', '', $data));
        dd($str);




    }


}