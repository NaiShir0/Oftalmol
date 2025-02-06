<?php

namespace FacturaScripts\Plugins\Oftalmol\src;

/**
 * Description of Utils
 *
 * @author Nai
 */
class Utils {
    public static function CalcularEdad( $fecha ) {
        $fechaNacimiento = new \DateTime($fecha);
        $hoy = new \DateTime();
        $edad = $hoy->diff($fechaNacimiento);
        return $edad->y; // Devuelve la edad en años
    }
}
