<?php

namespace App\Http\Models;

class MyModel
{
    protected function filterToRule($baseRule = null, $filter = array(), $dateField = null, $beginDate = null, $endDate = null)
    {
        $ruleField = array();
        $ruleValue = array();
        //載入基本條件
        if (!is_null($baseRule) and is_string($baseRule)) {
            $ruleField[] = $baseRule;
        } else {
            $ruleField[] = '1=1';
        }
        //建立非日期的組合條件
        if (is_array($filter) and count($filter) >= 1) {
            foreach ($filter as $key => $value) {
                $ruleField[] = "$key = ?";
                $ruleValue[] = $value;
            }
        }
        // Date => DateTime
        if (!is_null($beginDate) and strlen($beginDate) == 10) {
            $beginDate = date_format(date_create($beginDate), "Y-m-d 00:00:00");
        }
        if (!is_null($endDate) and strlen($endDate) == 10) {
            $endDate = date_format(date_create($endDate), "Y-m-d 23:59:59");
        }
        //建立日期的組合條件
        if (!is_null($beginDate) and !is_null($endDate)) {
            $ruleField[] = "$dateField BETWEEN ? AND ?";
            $ruleValue[] = $beginDate;
            $ruleValue[] = $endDate;
        } elseif (!is_null($beginDate)) {
            $ruleField[] = "$dateField >= ?";
            $ruleValue[] = $beginDate;
        } elseif (!is_null($endDate)) {
            $ruleField[] = "$dateField <= ?";
            $ruleValue[] = $endDate;
        }
        $ruleField_str = join(' AND ', $ruleField);
        //回傳
        return array('ruleFieldStr' => $ruleField_str,
                'ruleValueArray' => $ruleValue);
    }

    protected function rowNumOffset($page = 1, $rowNum = 20)
    {
        return ($page > 1)? $rowNum * ($page - 1): 0;
    }

}
