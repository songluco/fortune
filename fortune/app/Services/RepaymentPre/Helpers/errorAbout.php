<?php
/**
 * Created by PhpStorm.
 * User: songlu
 * Date: 2017/9/10
 * Time: 下午10:04
 */

namespace App\Services\RepaymentPre\Helpers;


use App\Services\RepaymentPre\RepaymentPreException;

trait errorAbout
{
    public function error($data)
    {
        throw new RepaymentPreException(myJsonEncode($data));
    }

}