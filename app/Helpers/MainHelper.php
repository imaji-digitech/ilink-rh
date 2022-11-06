<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

if (!function_exists('array_to_object')) {

    /**
     * Convert Array into Object in deep
     *
     * @param array $array
     * @return
     */
    function array_to_object($array)
    {
        return json_decode(json_encode($array));
    }
}
if (!function_exists('eloquent_to_options')) {
    function eloquent_to_options($array, $value='id', $title='title')
    {
        $arr = array();
        foreach ($array as $index => $a) {
            $arr[$index]['value'] = $a->$value;
            $arr[$index]['title'] = $a->$title;
        }
        return $arr;
    }
}
if (!function_exists('month_name')) {
    function month_name($month)
    {
        $monthName = ['', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        return $monthName[$month];
    }
}

if (!function_exists('numberToRomanRepresentation')) {
    function numberToRomanRepresentation($number)
    {
        $map = array('M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1);
        $returnValue = '';
        while ($number > 0) {
            foreach ($map as $roman => $int) {
                if ($number >= $int) {
                    $number -= $int;
                    $returnValue .= $roman;
                    break;
                }
            }
        }
        return $returnValue;
    }
}
if (!function_exists('empty_fallback')) {

    /**
     * Empty data or null data fallback to string -
     *
     * @return string
     */
    function empty_fallback($data)
    {
        return ($data) ? $data : "-";
    }
}

if (!function_exists('create_button')) {

    function create_button($action, $model)
    {
        $action = str_replace($model, "", $action);
        return ['submit_text' => ($action == "update") ? "Update" : "Submit", 'submit_response' => ($action == "update") ? "Updated." : "Submited.", 'submit_response_notyf' => ($action == "update") ? "Data " . $model . " Berhasil di Update" : "Data " . $model . " Berhasil di Tambahkan"];
    }
}
if (!function_exists('blank_model')) {
    function blank_model($array)
    {
        $data = [];
        foreach ($array as $arr) {
            $data[$arr] = null;
        }
        return $data;
    }
}

if (!function_exists('form_model')) {
    function form_model($model, $dataId=null)
    {
        return ($dataId != null) ? $model::find($dataId)->only($model::getForm()) : blank_model($model::getForm());
    }
}
if (!function_exists('generateRandomString')){
    function generateRandomString($length = 10) {
        $characters = 'abcdefghijklmnopqrstuvwxyz';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}

if (!function_exists('thousand_format')) {
    function thousand_format($integer)
    {

        if ((int) $integer == $integer) {
            return number_format($integer,'0',',','.');
        }
        else{
            return number_format($integer,'2',',','.');
        }

    }
}

if (!function_exists('get_date_on_month')){
    function get_date_on_month($value=0,$date = null){
        if ($date==null){
            $now = Carbon::now();
            $start = (new DateTime($now->format('Y-m-d')))->modify('first day of this month');
            $end = (new DateTime($now->format('Y-m-d')))->modify('first day of next month');
        }
        else{
            $start = (new DateTime($date))->modify('first day of this month');
            $end = (new DateTime($date))->modify('first day of next month');
        }

        $interval = DateInterval::createFromDateString('1 day');
        $period = new DatePeriod($start, $interval, $end);
        $temp=[];
        $dateList=[];
        foreach ($period as $dt) {
            $temp[intval($dt->format("d"))] = $value;
            $dateList[] = $dt->format("d");
        }
        return [$dateList, $temp];
    }
}


