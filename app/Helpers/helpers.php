<?php

use App\Helpers\DateTimeUtils;
use Carbon\Carbon;

/**
 * @return \App\Entities\User|null
 */
function currentUser()
{
    return auth()->user();
}

function showLogUser() {
    return currentUser()->name . " " . currentUser()->last_name;
}

/**
 * @return string
 */
function getAppLanguage()
{
    return trans('general.language');
}

/**
 * @return mixed
 */
function getServerHostName()
{
    return Request::server("HTTP_HOST");
}

/**
 * @param $number
 * @param $decimals
 * @return string return formated number
 */
function numberFormatted($number, $decimals = 2, $currencySymbol = false)
{
    $number = number_format($number, $decimals, config('constants.DEC_POINT'), config('constants.THOUSANDS_SEP'));
    if ($currencySymbol)
        return config('constants.CURRENCY_SYMBOL') . $number;
    else
        return $number;
}

//Time
function getTimeFormatted($unixTime)
{
    return DateTimeUtils::getTimeFormatted($unixTime);
}

function getTimeInt($unixTime)
{
    return DateTimeUtils::getUnixTimeToIntTime($unixTime);
}

function getUnixFromTime($time)
{
    return DateTimeUtils::getUnixFromTime($time);
}

//Date
function getDateFormatted($unixDate)
{
    if ($unixDate == 0)
        return "";
    else
        return DateTimeUtils::getDateFormatted($unixDate);
}

function getDateForSet($value) {
    if($value=="" || $value==null)
        return null;
    else
        return Carbon::createFromFormat('d/m/Y',$value);
}

function getDateForGet($value){
    if($value=="0000-00-00" || $value==null || $value=="")
        return "";
    else
        return Carbon::parse($value)->format('d/m/Y');
}

//Datetime
function getDateTimeForSet($value) {
    if($value=="" || $value==null)
        return null;
    else
        return Carbon::createFromFormat('d/m/Y H:i',$value);
}

function getDateTimeForGet($value){
    if($value=="0000-00-00" || $value==null || $value=="")
        return "";
    else
        return Carbon::parse($value)->format('d/m/Y H:i');
}