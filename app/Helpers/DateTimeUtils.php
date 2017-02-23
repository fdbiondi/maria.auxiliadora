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
     * return day of week id for database
     */
    public static function getDayOfWeekFromUnix($unixDate){
        switch(self::datetimeForDatetime($unixDate)->dayOfWeek)
        {
            case Carbon::SUNDAY:    return 7; break;
            case Carbon::MONDAY:    return 1; break;
            case Carbon::TUESDAY:   return 2; break;
            case Carbon::WEDNESDAY: return 3; break;
            case Carbon::THURSDAY:  return 4; break;
            case Carbon::FRIDAY:    return 5; break;
            case Carbon::SATURDAY:  return 6; break;
        }
    }

    /**
     * return 00:00
     */
    public static function intTimeToStringTime($intTime){
        return sprintf("%'.02d:00", $intTime);
    }

    /**
     * return hour as int
     */
    public static function getUnixTimeToIntTime($unixTime){
        $time = DateTimeUtils::datetimeForTime($unixTime);
        return intval($time->format('H'));
    }

    /**
     * return int value in minutes from unix
     */
    public static function getMinutesFromUnixTime($unixTime){
        return $unixTime / 60; //60 == 1 unix minute
    }

    /**
     * return HH:mm from unix
     */
    public static function getTimeFormatted($unixTime){
        $time = DateTimeUtils::datetimeForTime($unixTime);
        return $time->format(config('constants.TIME_FORMAT'));
    }

    /**
     * return dd/mm/yyyy from uniX
     */
    public static function getDateFormatted($unixDate, $format = ""){
        $date = DateTimeUtils::datetimeForTime($unixDate." 00:00");
        if($format=="")
            $format = config('constants.DATE_FORMAT');

        return $date->format($format);
    }

    /**
     * return dd/mm/yyyy H:i
     */
    public static function getDateTimeFormatted($unixDate, $format = ""){
        $date = DateTimeUtils::datetimeForTime($unixDate);
        if($format=="")
            $format = config('constants.DATETIME_FORMAT');

        return $date->format($format);
    }

    /**
     * return ISO 8601 from unix datetime
     */
    public static function getDatetimeISO8601FromUnix($unixDatetime){
        $date = DateTimeUtils::datetimeForTime($unixDatetime);
        return $date->toIso8601String();
    }

    /**
     * return unix
     */
    public static function getUnixFromTime($time){
        return DateTimeUtils::unixForTime($time);
    }

    /**
     * return unix
     */
    public static function getUnixFromDate($date,$format=""){
        return self::unixForDatetime($date." 00:00",$format);
    }

    /**
     * return unix
     */
    public static function getUnixDateTimeNow(){
        return Carbon::now()->timestamp;
    }

    /**
     * return unix
     */
    public static function getUnixDateNow(){
        return Carbon::today("UTC")->timestamp;
    }

    /**
     * return unix
     */
    public static function getUnixFromDateTime($datetime){
        //test when i need this
        return self::unixForDatetime($datetime);
    }

    //Get datetime from UTC because is used for times
    private static function datetimeForTime($unixTime){
        return Carbon::createFromTimestampUTC($unixTime);
    }
    //Get datetime format from unix datetime
    private static function datetimeForDatetime($unixTime){
        return Carbon::createFromTimestampUTC($unixTime);
    }
    //Get unix format for store time (UTC)
    private static function unixForTime($time){
        return Carbon::createFromFormat("Y-m-d H:i", "1970-01-01 $time","UTC")->timestamp;
    }

    private static function unixForDatetime($datetime, $format=""){
        if($format=="")
            $format = config('constants.DATETIME_FORMAT');

        return Carbon::createFromFormat($format, $datetime,"UTC")->timestamp;

    }
}