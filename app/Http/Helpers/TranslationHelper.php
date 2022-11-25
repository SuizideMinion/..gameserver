<?php

function Lang($key, $lang = 'DE', $race = 0)
{
    $Value = \App\Models\Translate::where('key', $key)->where('race', $race)->where('lang', $lang)->first();

    if ( $Value )
    {
        return $Value->value;
    }
    else
    {
        return 'Ich bin eine Böse Macht';
    }
}

function getServerData($key)
{
    return \App\Models\ServerData::where('key', $key)->first()->value;
}

function getUserData($key)
{
    return \App\Models\UserData::where('user_id', auth()->user()->id)->where('key', $key)->first()->value;
}

function incrementUserData($id, $key, $value)
{
    \App\Models\UserDatas::where('user_id', $id)->where('key', $key)->increment('value', $value);
}

function timeconversion($sekunden){
    $tag  = floor($sekunden / (3600*24));
    $std  = floor($sekunden / 3600 % 24);
    $min  = floor($sekunden / 60 % 60);
    $sek  = floor($sekunden % 60);
    return ($tag != 0 ? $tag .' ':'') . ($std <= 9 ? '0'.$std:$std) .':'. ($min <= 9 ? '0'.$min:$min) .':'. ($sek <= 9 ? '0'.$sek:$sek);
}

function getImage($name, $path = null, $race = null)
{
    return '/assets/img'. ( $path != null ? '/'. $path:'') .'/'. $race . $name;
}

function number_shorten($number, $precision = 3, $divisors = null) {

    // Setup default $divisors if not provided
    if (!isset($divisors)) {
        $divisors = array(
            pow(1000, 0) => '', // 1000^0 == 1
            pow(1000, 1) => 'K', // Thousand
            pow(1000, 2) => 'M', // Million
            pow(1000, 3) => 'B', // Billion
            pow(1000, 4) => 'T', // Trillion
            pow(1000, 5) => 'Qa', // Quadrillion
            pow(1000, 6) => 'Qi', // Quintillion
        );
    }

    // Loop through each $divisor and find the
    // lowest amount that matches
    foreach ($divisors as $divisor => $shorthand) {
        if (abs($number) < ($divisor * 1000)) {
            // We found a match!
            break;
        }
    }

    // We found our match, or there were no matches.
    // Either way, use the last defined value for $divisor.
    return number_format($number / $divisor, $precision) . $shorthand;
}
