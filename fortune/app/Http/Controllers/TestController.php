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







        $a = ["Animal" => "horse, hello word", "Type" => "mammal hello world !"];
//        dd(ucwords($a['Animal'])); // Horse, Hello Word
//        dd(ucfirst($a['Animal'])); //"Horse,hello word"


        dd(array_map('ucwords', $a));
/*
array:2 [▼
  "Animal" => "Horse, Hello Word"
  "Type" => "Mammal Hello World !"
]
*/

        //字符串按照逗号分割成数组
        $a_arr = explode(',', $a['Animal']);
        //数组里面的内容按照逗号拼接成字符串
        $a_str = implode(',', $a);
        dd($a_str);









        $b_result = implode(',', $a);

        $result = implode('  |||||   ', $a);
        dd($result);






//        ucwords();
//
//        $result = array_map('strtolower', $a);
//        dd($result);

//        strtoupper();


//        array_map("")
//            strtoupper();




        $a = ["Animal" => "horse", "Type" => "mammal"];
        $result = array_map(function($item){
            if($item == 'abc'){
                return 'equal abc !';
            }else{
                return "not equal abc, i'm " . $item;
            }
        }, $a);

        dd($result);

        dd($a);



        $one_to_five_array = range(1, 5);
        $six_to_ten_array = range(6, 10);
        $result = array_map(function($item, $itemTwo){
            return $item * $itemTwo;
        }, $one_to_five_array, $six_to_ten_array);

        dd($result);



        dd($one_to_five_array);


        $result = array_map(function($param) {return $param+$param ;}, $array);
        dd($result);


        $array = range(1, 5);
        dd($array);

        dd(phpinfo());

        dd(strlen('UgixBazXckpsMClz6Hul7gxSpisErbk6'));


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