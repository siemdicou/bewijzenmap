<?php

/**
 * Created by IntelliJ IDEA.
 * User: Remco
 * Date: 13-1-2016
 * Time: 11:06
 */
interface ICalculator
{

    function calculateKorting($prijs);
    function btwPerCountry($country);
    function calculateBtw( $prijs);
    function calculateCurrency($prijs, $country);

}