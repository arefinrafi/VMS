<?php


namespace App;


class Helper
{

    static function calculateTax($amount){
        if($amount > 0){
            if($amount > 0 && $amount <= 50000)
                return 2;
            else if($amount > 50000 &&  $amount <= 1500000)
                return 3;
            else if ($amount > 1500000 && $amount <= 3000000)
                return 4;
            else if($amount > 3000000 && $amount <= 5000000)
                return 5;
            else if($amount > 5000000 && $amount <= 700000)
                return 5;
            else if($amount > 700000 && $amount <= 1000000)
                return 6;
            else if($amount > 1000000 && $amount <= 1500000)
                return 7;
            else
                return 10;
        }
    }
}