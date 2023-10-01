<?php
function listofDate(){
    $minutes = [];
    for ($i = 0; $i < 31; $i++) {
        $minutes[] = $i+1;
    }
    return $minutes;
}

function listofMonth(){
    $minutes = [];
    for ($i = 0; $i < 12 ; $i++) {
        $minutes[] = $i+1;
    }
    return $minutes;
}

function listofYear(){
    $minutes = [];
    for ($i = 1949; $i < 2024 ; $i++) {
        $minutes[] = $i+1;
    }
    return $minutes;
}

function parseDate($date){
    $date = str_replace("'", '', $date);
    $date = explode("-", $date);

    if (count($date) === 3) {
        return [
            "year" => $date[0],
            "month" => $date[1],
            "date" => $date[2],
        ];
    } else {
        return null;
    }
}
