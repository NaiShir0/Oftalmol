<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace FacturaScripts\Plugins\Oftalmol\src;

/**
 * Description of Validations
 *
 * @author Nai
 */
class Validations {

    function validateDecilmal($value) {
        return str_replace(',', '.', $value);
    }

    function validateRange($value) {
        if ($value === "" || $value === null) {
            return "";
        }

        $number = floatval($value);
        if ($number < 0 || $number > 125) {
            return "Error: out of allowed range (0 - 125)";
        }
        return $number;
    }

    function validateLessThan150($value) {
        if ($value >= 150) {
            return "Error: the number must be less than 150";
        }
        return $value;
    }

    function validateDivisibleBy05($value) {
        if ($value % 0.5 !== 0) {
            return "Error: the number must be divisible by 0.5";
        }
        return $value;
    }

    function validateDivisibleBy025($value) {
        if ($value % 0.25 !== 0) {
            return "Error: the number must be divisible by 0.25";
        }
        return $value;
    }

    function validateEmptyField($value) {
        return ($value === "" || $value === null) ? "" : $value;
    }

    function validateZero($value) {
        return ($value == 0) ? 0 : $value;
    }
}
