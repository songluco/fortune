<?php
/**
 * Created by PhpStorm.
 * User: songlu
 * Date: 2017/9/8
 * Time: 下午5:33
 */

namespace App\Services\RepaymentPre\Helpers;


trait LogAbout{

    /**
     * 记录日志
     * @param $data 日志信息
     * 日志名称以下划线分割
     */
    public function log($data)
    {
        if(is_array($data) || is_object($data)){
            $data = json_encode($data, JSON_UNESCAPED_UNICODE);
        }
        writeLog(strtolower(get_class()), 'debug', $data);
    }

    /**
     * 记录日志（静态方法调用）
     * @param $data 日志信息
     * 日志名称以下划线分割
     */
    public static function logStatic($data)
    {
        if(is_array($data) || is_object($data)){
            $data = json_encode($data, JSON_UNESCAPED_UNICODE);
        }
        writeLog(strtolower(get_called_class()), 'debug', $data);
    }

}