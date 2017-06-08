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
 * Datetime Helpers
 */

/**
 * Get the date from a passed value and gives format
 *
 * @param string $value
 * @param string $format
 * @return string
 */
function getDateFrom($value, $format = "")
{
    return DateTimeUtils::get($value, $format);
}

/**
 * Get the time from a passed value
 *
 * @param string $value
 * @return string
 */
function getTimeFrom($value)
{
    return DateTimeUtils::getTimeFormatted($value);
}

/**
 * Get actual Carbon date
 *
 * @return \Carbon\Carbon
 */
function getDateNow()
{
    return DateTimeUtils::getDateNow();
}

/**
 * Get actual date formatted
 *
 * @param string $format
 * @return string
 */
function getDateNowFormatted($format) {
    return DateTimeUtils::getDateNow()->format($format);
}

/**
 * Create date from value
 *
 * @param $value
 * @return \Carbon\Carbon
 */
function getDateForSet($value) {
    return DateTimeUtils::create($value, config('constants.DATE_FORMAT'));
}

/**
 * Get date from value
 *
 * @param $value
 * @return string
 */
function getDateForGet($value) {
    return DateTimeUtils::get($value, config('constants.DATE_FORMAT'));
}

/**
 * Create datetime from value
 *
 * @param $value
 * @return \Carbon\Carbon
 */
function getDateTimeForSet($value) {
    return DateTimeUtils::create($value, config('constants.DATETIME_FORMAT'));
}

/**
 * Get datetime from value
 *
 * @param $value
 * @return string
 */
function getDateTimeForGet($value) {
    return DateTimeUtils::get($value, config('constants.DATETIME_FORMAT'));
}

/**
 * String Manipulation Helpers
 */

/**
 * Convert string to upper case
 *
 * @param $string
 * @return string
 */
function upperCase($string) {
    return mb_strtoupper($string, 'UTF-8');
}

/**
 * Convert string to lower case
 *
 * @param $string
 * @return string
 */
function lowerCase($string) {
    return mb_strtolower($string, 'UTF-8');
}

/**
 * Convert string first letters of words to upper case
 *
 * @param $string
 * @return string
 */
function upperWords($string) {
    return ucwords(lowerCase($string));
}

/**
 * Arrays And Objects Helpers
 */

/**
 * Converts an array to an object recursively
 *
 * @param array $array
 * @return stdClass
 */
function toObject(Array $array) {
    $object = new stdClass();
    foreach ($array as $key => $value) {
        if (is_array($value)) {
            $value = toObject($value);
        }
        $object->$key = $value;
    }
    return $object;
}