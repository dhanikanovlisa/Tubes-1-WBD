<?php

function turnToHourAndMinute($minute){
    $hour = floor($minute / 60);
    $minute = $minute % 60;

    return [
        "hour" => $hour,
        "minute" => $minute,
    ];
}

function turnIntoMinute($hour, $minute){
    return $hour * 60 + $minute;
}