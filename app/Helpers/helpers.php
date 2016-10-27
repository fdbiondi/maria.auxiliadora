<?php

use App\Helpers\DateTimeUtils;

/**
 * @return \App\Entities\User|null
 */
function currentUser()
{
    return auth()->user();
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