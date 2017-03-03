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
 * @return string containing the name and last name of the logged user
 */
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

//Time formatted
function getTimeFormatted($unixTime)
{
    return DateTimeUtils::getTimeFormatted($unixTime);
}

//Date formatted
function getDateFormatted($unixDate)
{
    if ($unixDate == 0)
        return "";
    else
        return DateTimeUtils::getDateFormatted($unixDate);
}

function getDateNow() {
    return DateTimeUtils::getDateNow();
}

//Date for set and get
function getDateForSet($value) {
    return DateTimeUtils::createForSet(config('constants.DATE_FORMAT'),$value);
}

function getDateForGet($value){
    return DateTimeUtils::getDateForGet($value);
}

//Datetime for set and get
function getDateTimeForSet($value) {
    return DateTimeUtils::createForSet(config('constants.DATETIME_FORMAT'),$value);
}

function getDateTimeForGet($value){
    return DateTimeUtils::getDateForGet($value, config('constants.DATETIME_FORMAT'));
}