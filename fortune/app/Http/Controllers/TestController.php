<?php
/**
 * Created by PhpStorm.
 * User: songlu
 * Date: 2017/9/8
 * Time: 下午5:12
 */

namespace App\Http\Controllers;


use App\Services\RepaymentPre\Helpers\LogAbout;
use Songluco\InterestCenter\Tools\DateAbout\DateAbout;

class TestController extends Controller
{
    public function anyIndex()
    {

        $data = [
            'a'=>'ok','b'=>'hello world', 'c'=>'你好'
        ];



//        $data = (object)$data;

        if(is_object($data) || is_array($data)){
            $data = json_encode($data, JSON_UNESCAPED_UNICODE);
        }
        dd($data);

    }




}