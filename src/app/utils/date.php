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