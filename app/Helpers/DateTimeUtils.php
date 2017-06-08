<?php 

namespace App\Helpers;

use Carbon\Carbon;

class DateTimeUtils
{
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
    public static function create($value, $format) {
        if($value=='' || $value==null)
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
    public static function get($value, $format = '') {
        if($value=='0000-00-00' || $value == '0000-00-00 00:00' || $value==null || $value == '')
            return '';
        else
            return self::getDateFormatted($value, $format);
    }

    /**
     * Get time formatted with format defined in constant file
     *
     * @param $value
     * @return string HH:mm from unix
     */
    public static function getTimeFormatted($value){
        $time = self::createDate($value);
        return $time->format(config('constants.TIME_FORMAT'));
    }
    
    /**
     * Get date formatted with format defined in constant file
     * 
     * @param string $value
     * @param string $format
     * @return string
     */
    public static function getDateFormatted($value, $format = ''){
        $date = self::createDate($value);

        if($format=='') {
            $format = config('constants.DATE_FORMAT');
        }

        return $date->format($format);
    }

    /**
     * Get Carbon instance from string datetime
     *
     * @param $value
     * @return Carbon static
     */
    private static function createDate($value){
        return Carbon::parse($value);
    }
}