<?php

namespace FacturaScripts\Plugins\Oftalmol\src;

/**
 * Description of Utils
 *
 * @author Nai
 */
class Utils {
    public static function CalculateAge( $date ) {
        $birthDate = new \DateTime($date);
        $today = new \DateTime();
        $age = $today->diff($birthDate);
        return $age->y; // Devuelve la edad en años
    }
}
