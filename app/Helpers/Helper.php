<?php

namespace App\Helpers;

use Carbon\Carbon;

class Helper
{
    public static function daysYear($year, $days = '')
    {
        if (checkdate(2, 29, ($year == null) ? date('Y') : $year) == true) {
            $days = 366;
        } else {
            $days = 365;
        }

        return $days;

    }

    public static function dateAniversity($startDate, $antiquity, $date = '')
    {
        $date = Carbon::parse($startDate)->addYear($antiquity);
        return $date;
    }

    public static function dayWeek($date, $day = '')
    {
        if ($date->dayOfWeek === Carbon::SUNDAY) {
            $day = "sunday";
        } else if ($date->dayOfWeek === Carbon::MONDAY) {
            $day = "monday";
        } else if ($date->dayOfWeek === Carbon::TUESDAY) {
            $day = "tuesday";
        } else if ($date->dayOfWeek === Carbon::WEDNESDAY) {
            $day = "wednesday";
        } else if ($date->dayOfWeek === Carbon::THURSDAY) {
            $day = "thursday";
        } else if ($date->dayOfWeek === Carbon::FRIDAY) {
            $day = "friday";
        } else if ($date->dayOfWeek === Carbon::SATURDAY) {
            $day = "saturday";
        }

        return $day;
    }

    public static function dayWeekEs($date, $day = '')
    {

        if ($date->dayOfWeek === Carbon::SUNDAY) {
            $day = "Domingo";
        } else if ($date->dayOfWeek === Carbon::MONDAY) {
            $day = "Lunes";
        } else if ($date->dayOfWeek === Carbon::TUESDAY) {
            $day = "Martes";
        } else if ($date->dayOfWeek === Carbon::WEDNESDAY) {
            $day = "Miercoles";
        } else if ($date->dayOfWeek === Carbon::THURSDAY) {
            $day = "Jueves";
        } else if ($date->dayOfWeek === Carbon::FRIDAY) {
            $day = "Viernes";
        } else if ($date->dayOfWeek === Carbon::SATURDAY) {
            $day = "Sabado";
        }

        return $day;
    }

    public static function dayWeekEsLetra($date, $day = '')
    {

        if ($date->dayOfWeek === Carbon::SUNDAY) {
            $day = "D";
        } else if ($date->dayOfWeek === Carbon::MONDAY) {
            $day = "L";
        } else if ($date->dayOfWeek === Carbon::TUESDAY) {
            $day = "M";
        } else if ($date->dayOfWeek === Carbon::WEDNESDAY) {
            $day = "M";
        } else if ($date->dayOfWeek === Carbon::THURSDAY) {
            $day = "J";
        } else if ($date->dayOfWeek === Carbon::FRIDAY) {
            $day = "V";
        } else if ($date->dayOfWeek === Carbon::SATURDAY) {
            $day = "S";
        }

        return $day;
    }

    public static function monthEsLetra($date, $dateLong = '')
    {
        $meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");

        $fecha = \Carbon\Carbon::parse($date);
        $mes = $meses[($fecha->format('n')) - 1];

        return $mes;
    }

    public static function formatDateLong($date, $dateLong = '')
    {
        $meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");

        $fecha = \Carbon\Carbon::parse($date);
        $mes = $meses[($fecha->format('n')) - 1];
        $dateLong = Helper::dayWeekEs($fecha) . ' ' . $fecha->format('d') . ' de ' . $mes . ' de ' . $fecha->format('Y');
        return $dateLong;
    }

    public static function formatDateText($date, $dateText = '')
    {
        $meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");

        $fecha = \Carbon\Carbon::parse($date);
        $mes = $meses[($fecha->format('n')) - 1];
        $dateText = $fecha->format('d') . ' de ' . $mes . ' de ' . $fecha->format('Y');
        return $dateText;
    }

    public static function formatDate($date, $zona, $day = '', $month = '', $year = '')
    {
        if ($zona == "MEX") {
            $day = substr($date, 0, 2);
            $month = substr($date, 3, 2);
            $year = substr($date, 6, 4);
        } else {
            //2018-02-05
            $day = substr($date, 8, 2);
            $month = substr($date, 5, 2);
            $year = substr($date, 0, 4);
        }
        return Carbon::create($year, $month, $day);
    }

    public static function dateRange($startDate, $endDate, $dates = '')
    {

        $start_date = Carbon::parse($startDate);
        $end_date = Carbon::parse($endDate)->addDay(1);

        $dates = [];
        for (
            $date = $start_date;
            $date->lte($end_date);
            $date->addDay()
        ) {
            $dates[] = $date->toDateString();
        }

        return $dates;
    }

    public static function dateRange2($startDate, $endDate, $dates = '')
    {

        $start_date = Carbon::parse($startDate);
        $end_date = Carbon::parse($endDate);

        $dates = [];
        for (
            $date = $start_date;
            $date->lte($end_date);
            $date->addDay()
        ) {
            $dates[] = $date->toDateString();
        }

        return $dates;
    }

    public static function checkInRange($start_date, $end_date, $evaluame)
    {
        $start_ts = strtotime($start_date);
        $end_ts = strtotime($end_date);
        $user_ts = strtotime($evaluame);
        return (($user_ts >= $start_ts) && ($user_ts <= $end_ts));
    }
}
