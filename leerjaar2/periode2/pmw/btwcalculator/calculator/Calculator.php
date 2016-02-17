<?php

/**
 * Created by IntelliJ IDEA.
 * User: Remco
 * Date: 13-1-2016
 * Time: 11:06
 */
class Calculator implements ICalculator
{

    private $btwpercountry = array("NL" => 21, "UK" => 20, "DE" => 19, "FR" => 20, "HON" => 27);

    private $prijs;
    private $btw;
    private $country;

    function __construct($country)
    {
        $this->country = $country;
    }

    function calculateKorting($prijs)
    {
        $korting = 0;

        if($prijs >= 1000 && $prijs < 5000){
            $korting = 3;
        }else if($prijs >= 5000 && $prijs < 7000){
            $korting = 5;
        }else if($prijs >= 7000 && $prijs < 10000){
            $korting = 10;
        }else if($prijs >= 10000 && $prijs <= 50000){
            $korting = 15;
        }
        return $prijs * (1 - ($korting / 100));
    }

    function btwPerCountry($country)
    {
        return $this->btwpercountry[$country];
    }

    function calculateBtw($prijs)
    {
        return $this->calculateKorting($prijs) * (1 + ($this->btwPerCountry($this->country) / 100));
    }

    function calculateCurrency($prijs, $country)
    {
        // TODO: Implement calculateCurrency() method.
    }
}