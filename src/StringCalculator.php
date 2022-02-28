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
        $pos = strpos($number, ",\n");

        if($pos !== false){
            $pos +=1;
            return "Number expected but \n found at position $pos";
        }
        $pos = strpos($number, "\n,");
        if($pos !== false){
            $pos +=1;
            return "Number expected but , found at position $pos";
        }
        $pos = strpos($number, "\n\n");
        if($pos !== false){
            $pos +=1;
            return "Number expected but \n found at position $pos";
        }
        $pos = strpos($number, ",,");
        if($pos !== false){
            $pos +=1;
            return "Number expected but , found at position $pos";
        }
        else{
            $stringToExplode = str_replace("\n", ",", $number);
            $separatedString = explode(",", $stringToExplode);

            $sum = 0;
            for($i = 0; $i<count($separatedString);$i++){
                $sum += $separatedString[$i];
            }
            return $sum;

        }

    }

}