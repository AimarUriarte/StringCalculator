<?php

namespace Deg540\PHPTestingBoilerplate;

use function PHPUnit\Framework\isEmpty;

class StringCalculator
{
    public function add(String $number):String
    {
        if(empty($number)){
            return 0;
        }
        $stringToExplode = str_replace("\n", ",", $number);
        $separatedString = explode(",", $stringToExplode);

        $sum = 0;
        for($i = 0; $i<count($separatedString);$i++){
            $sum += $separatedString[$i];
        }
        return $sum;
    }

}