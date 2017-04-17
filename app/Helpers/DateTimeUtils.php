<?php 

namespace App\Helpers;
/**
 * Helper to show datetimes, pass from and to unix format
 * Tips
 * Times => use UTC time
 * DateTimes => use Without UTC
 */
use Carbon\Carbon;

class DateTimeUtils
{
    /**
     * Get an integer that represents a day of the week
     *
     * @param $unixDate
     * @return int
     */
    public static function getDayOfWeekFromUnix($unixDate){
        switch(self::datetimeForDatetime($unixDate)->dayOfWeek)
        {
            case Carbon::SUNDAY:    return 1; break;
            case Carbon::MONDAY:    return 2; break;
            case Carbon::TUESDAY:   return 3; break;
            case Carbon::WEDNESDAY: return 4; break;
            case Carbon::THURSDAY:  return 5; break;
            case Carbon::FRIDAY:    return 6; break;
            case Carbon::SATURDAY:  return 7; break;
            default:                return -1; break;
        }
    }

    /**
     * return 00:00
     *
     * @param $intTime
     * @return mixed
     */
    public static function intTimeToStringTime($intTime){
        return sprintf("%'.02d:00", $intTime);
    }

    /**
     * return hour as int
     *
     * @param $unixTime
     * @return mixed
     */
    public static function getUnixTimeToIntTime($unixTime){
        $time = self::datetimeForTime($unixTime);
        return intval($time->format('H'));
    }

    /**
     * return int value in minutes from unix
     *
     * @param $unixTime
     * @return float
     */
    public static function getMinutesFromUnixTime($unixTime){
        return $unixTime / 60; //60 == 1 unix minute
    }

    /**
     * Get a Carbon instance for the current date and time
     * 
     * @return Carbon static
     */
    public static function getDateNow(){
        return Carbon::now();
    }

    /**
     * Create and get a Carbon instance for a value with format
     *
     * @param $format
     * @param $value
     * @return Carbon static|null
     */
    public static function createForSet($format, $value) {
        if($value=="" || $value==null)
            return null;
        else
            return Carbon::createFromFormat($format, $value);
    }

    /**
     * Get a Carbon instance for a value and a date or datetime 
     *
     * @param $value
     * @param string $format
     * @return string
     */
    public static function getDateForGet($value, $format = "") {
        if($value=="0000-00-00" || $value == "0000-00-00 00:00" || $value==null || $value == "")
            return "";
        else
            return self::getDateFormatted($value, $format);
    }

    /**
     * Get time formatted with format defined in constant file
     *
     * @param $unixTime
     * @return string HH:mm from unix
     */
    public static function getTimeFormatted($unixTime){
        $time = self::datetimeForTime($unixTime);
        return $time->format(config('constants.TIME_FORMAT'));
    }
    
    /**
     * Get date formatted with format defined in constant file
     * 
     * @param string $datetime
     * @param string $format
     * @return string
     */
    public static function getDateFormatted($datetime, $format = ""){
        $date = self::getInstance($datetime);
        if($format=="")
            $format = config('constants.DATE_FORMAT');

        return $date->format($format);
    }

    /**
     * Get datetime from UTC because is used for times
     *
     * @param $unixTime
     * @return Carbon static
     */
    private static function datetimeForTime($unixTime) {
        return Carbon::createFromTimestampUTC($unixTime);
    }

    /**
     * Get datetime format from unix datetime
     *
     * @param $unixTime
     * @return Carbon static
     */
    private static function datetimeForDatetime($unixTime) {
        return Carbon::createFromTimestampUTC($unixTime);
    }

    /**
     * Get Carbon instance from string datetime
     *
     * @param string $datetime
     * @return static
     */
    private static function getInstance($datetime) {
        return Carbon::parse($datetime);
    }
}