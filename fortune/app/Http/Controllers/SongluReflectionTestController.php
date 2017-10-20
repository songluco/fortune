<?php
/**
 * Created by PhpStorm.
 * User: songlu
 * Date: 2017/9/18
 * Time: 上午10:38
 */

namespace App\Http\Controllers;


class SongluReflectionTestController extends Controller
{

    public function anyIndex()
    {
        $class = new \ReflectionClass('App\Services\SongluReflectionTest\PersonTwo'); // 建立 Person这个类的反射类
        $instance = $class->newInstanceArgs(); // 相当于实例化Person 类
        $methods = $class->getMethods(\ReflectionProperty::IS_PUBLIC);// 获取Person 类中的public方法
        foreach ($methods as $method) {
            if($method->name == 'eat'){
                echo $method->name . '<br />';
            }
            //执行的时候,两种方式都能够实现
            //通过反射只能执行类中的公共方法。私有和受保护的方法都不能够执行。
//            $method->invoke(new $method->class, $method->name);
            $method->invoke($instance, $method->name); //执行方法
        }
        dd(222);
    }

}