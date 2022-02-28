<?php

namespace Deg540\PHPTestingBoilerplate;

use function PHPUnit\Framework\assertEmpty;
use function PHPUnit\Framework\assertEquals;
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
        if(substr($number, -1)==(",") or substr($number, -1)==("\n")){
            return "Number expected but EOF found";
        }

        else{
            $pos = strpos($number, "//");
            if($pos !== false){

                $stringToExplode = explode("\n", $number);

                $separatedString = preg_split('/[,;| ]/', $stringToExplode[1], null, PREG_SPLIT_NO_EMPTY);


            }
            else{
                $stringToExplode = str_replace("\n", ",", $number);
                $separatedString = explode(",", $stringToExplode);

            }
            $negatives = "";
            $sum = 0;
            for($i = 0; $i<count($separatedString); $i++){
                if($separatedString[$i] < 0){
                    $negatives .= $separatedString[$i] .", "  ;
                }
                else{
                    $sum += $separatedString[$i];
                }

            }
            if(empty($negatives)){
                return $sum;
            }
            else{

                $returnNegatives = substr($negatives,0 ,strlen($negatives)-2);

                return "Negative not allowed: ".$returnNegatives;

            }

        }


    }

}