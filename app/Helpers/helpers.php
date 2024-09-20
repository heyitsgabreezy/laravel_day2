<?php

use Carbon\Carbon;

function format_fullname ($firstName, $middleName, $lastName, $suffix, $isReversed, $isCapitalized) {

    $fullName = $isReversed
        ?  implode(', ', [
                $lastName,
                "$firstName $middleName $suffix"
            ])
        : implode(' ', [
                $firstName,
                $middleName,
                $lastName,
                $suffix,
            ]);
    
    return $isCapitalized ? strtoupper($fullName) : $fullName;
}

function compare_dates ($date1, $date2) {

    if ($date1 == $date2) {
        $message = "Date: $date1";
    } else {
        $date1 = strtotime($date1);
        $date2 = strtotime($date2);

        if ($date1 < $date2) {
            $message = "Period covered from " . Carbon::parse($date1)->format('Y-m-d') . " to " . Carbon::parse($date2)->format('Y-m-d');
        } else {
            $message = "Period covered from " . Carbon::parse($date2)->format('Y-m-d') . " to " . Carbon::parse($date1)->format('Y-m-d');
        }
    }

    return $message;
}

function format_report_date ($date, $option) {

    switch ($option) {
        case 1:
            $message = Carbon::parse($date)->format('l, F j, Y');
            break;

        case 2:
            $message = Carbon::parse($date)->format('j F Y - l');
            break;

        case 3:
            $message = "Today is " . Carbon::parse($date)->format('l, F j, Y');
            break;

        default:
            $message = "0000-00-00";
            break;
    }

    return $message;
}