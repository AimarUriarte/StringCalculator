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
        $sum = 0;
        $error = false;
        $errorMsg = "";
        $pos = strpos($number, ",\n");

        if($pos !== false){
            $pos +=1;
            $errorMsg .= "Number expected but \n found at position $pos";
            $error = true;
        }
        $pos = strpos($number, "\n,");
        if($pos !== false){
            $pos +=1;
            $errorMsg .= "Number expected but , found at position $pos";
            $error = true;
        }
        $pos = strpos($number, "\n\n");
        if($pos !== false){
            $pos +=1;
            $errorMsg .= "Number expected but \n found at position $pos";
            $error = true;
        }
        $pos = strpos($number, ",,");
        if($pos !== false){
            $pos +=1;
            $errorMsg .="Number expected but , found at position $pos";
            $error = true;
        }
        if(substr($number, -1)==(",") or substr($number, -1)==("\n")){
            $errorMsg .= "Number expected but EOF found  ";
            $error = true;
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

            for($i = 0; $i<count($separatedString); $i++){
                if($separatedString[$i] < 0){
                    $negatives .= $separatedString[$i] .", "  ;
                }
                else{
                    $sum += $separatedString[$i];
                }

            }
            if(!empty($negatives)){
                $returnNegatives = substr($negatives,0 ,strlen($negatives)-2);
                if($error){
                    $errorMsg .= "\nNegative not allowed: ".$returnNegatives;
                }
                else{
                    return "Negative not allowed: ".$returnNegatives;
                }

            }


        }
        if($error){
            return substr($errorMsg,0,strlen($errorMsg)-2);
        }
        else {
            return $sum;
        }


    }

}