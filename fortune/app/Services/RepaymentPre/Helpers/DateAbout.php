<?php
namespace App\Services\RepaymentPre\Helpers;

/**
 * Created by PhpStorm.
 * User: songlu
 * Date: 2017/8/3
 * Time: 上午11:35
 */
class DateAbout
{

    /**
     * 求两个日期之间相差的天数
     * 备注:针对1970年1月1日之后的日期
     * @param $dayOne DateTime 日期一
     * @param $dayTwo DateTime 日期二
     * @return float
     */
    public static function diffBetweenTwoDays($dayOne, $dayTwo)
    {
        $secondOne = strtotime($dayOne);
        $secondTwo = strtotime($dayTwo);

        if ($secondOne < $secondTwo) {
            $tmp = $secondTwo;
            $secondTwo = $secondOne;
            $secondOne = $tmp;
        }
        return ($secondOne - $secondTwo) / 86400;
    }

    /**
     * 将日期转换为数组
     * @param $date DateTime 日期
     * @return array
     */
    public static function changeDateToArray($date)
    {
        return date_parse($date);
    }

    /**
     * （根据还款时间段的开始日期和还款日）计算还款时间段的结束日
     * @param $startDate DateTime 还款时间段的开始日期
     * @param $repaymentDay int 还款日
     * @return bool|string
     */
    public static function calculateRepaymentPeriodEndDate($startDate, $repaymentDay)
    {
        $startDateArr = self::changeDateToArray($startDate);
        if($startDateArr['day'] >= $repaymentDay){
            $endDate = date('Y-m-d',mktime(0, 0, 0, $startDateArr['month'] + 1, $repaymentDay, $startDateArr['year']));
        }else{
            $endDate = date('Y-m-d',mktime(0, 0, 0, $startDateArr['month'], $repaymentDay, $startDateArr['year']));
        }
        return $endDate;
    }

    /**
     * 一次性还本付息还款时间段
     * @param $startDate DateTime 起息日期
     * @param $endDate DateTime 结束日期
     * @return mixed
     */
    public static function FixRate($startDate, $endDate)
    {
        $period['no'] = 1;
        $current_period = 1;
        $period['serials'][$current_period]['serials_no'] = 1;
        $period['serials'][$current_period]['start'] = $startDate;
        $period['serials'][$current_period]['end'] = $endDate;
        $period['serials'][$current_period]['days'] = self::diffBetweenTwoDays($startDate, $endDate);
        return $period;
    }

    /**
     * 按月付息还款时间段
     * @param $startDate DateTime 开始日期
     * @param $endDate DateTime 结束日期
     * @param $repaymentDay int 每月还款日
     * @return mixed
     */
    public static function MonthlyInterest($startDate, $endDate, $repaymentDay)
    {
        //第一期的时间段
        $i = 1;
        $serials[$i]['serial_no'] = 1;
        $serials[$i]['start'] = $startDate;
        $serials[$i]['end'] = self::calculateRepaymentPeriodEndDate($startDate, $repaymentDay);
        $currentPeriodEndDate = $serials[$i]['end'];
        $serials[$i]['days'] = self::diffBetweenTwoDays($serials[$i]['start'],$serials[$i]['end']);
        //第二期以及第二期之后的 日期
        while(strtotime($currentPeriodEndDate) < strtotime($endDate)){
            $i = $i + 1;
            $serials[$i]['serial_no'] = $i;
            $serials[$i]['start'] = $currentPeriodEndDate;
            //第二期以及第二期之后的结束日期
            $endDate2 = self::calculateRepaymentPeriodEndDate($currentPeriodEndDate, $repaymentDay);
            $serials[$i]['end'] = (strtotime($endDate2) >= strtotime($endDate)) ? $endDate : $endDate2;
            $currentPeriodEndDate = $serials[$i]['end'];
            $serials[$i]['days'] = self::diffBetweenTwoDays($serials[$i]['start'],$serials[$i]['end']);
        }
        $Monthly['serials'] = $serials;
        $Monthly['no'] = count($serials);
        return $Monthly;
    }





}