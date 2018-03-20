<?php
/**
 * Created by PhpStorm.
 * User: xiaopeng
 * Date: 2018/3/20
 * Time: 22:38
 */

namespace Calendar\Model;


class LeapYear
{
    public function isLeapYear($year = null) {
        if (null === $year) {
            $year = date('Y');
        }

        return 0 === $year % 400 || (0 === $year % 4 && 0 !== $year % 100);
    }
}