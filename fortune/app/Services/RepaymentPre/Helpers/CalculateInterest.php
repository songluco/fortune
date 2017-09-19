<?php
/**
 * Created by PhpStorm.
 * User: songlu
 * Date: 2017/9/10
 * Time: 下午9:10
 */

namespace App\Services\RepaymentPre\Helpers;


class CalculateInterest
{
    /**
     * 按日计算利息
     * @param float $amount 期初本金
     * @param float $rate 年化收益率
     * @param int $days 提前还款利息天数
     * @param int $baseDays 计息天数基数
     * @return string
     */
    public function calculateInterestByDays($amount, $rate, $days, $baseDays)
    {
        return displayAmountNoComma($amount * ($rate / 100) * $days / $baseDays);
    }

}