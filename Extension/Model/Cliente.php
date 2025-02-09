<?php
/**
 * This file is part of Oftalmologia plugin for FacturaScripts.
 * FacturaScripts Copyright (C) 2015-2022 Carlos Garcia Gomez <carlos@facturascripts.com>
 * Oftalmologia   Copyright (C) 2022-2022 Clinica Castillo <jquingarcia@gmail.com>
 *                Copyright (C) 2022-2022 Jose Antonio Cuello Principal <yopli2000@gmail.com>
 *
 * This program and its files are under the terms of the license specified in the LICENSE file.
 */
namespace FacturaScripts\Plugins\Oftalmologia\Extension\Model;

use FacturaScripts\Plugins\Oftalmol\Model\Patient;

/**
 * Extension of Cliente
 *
 * @author Clinica Castillo <info@clinicastillo.es>
 * @author Jose Antonio Cuello Principal <yopli2000@gmail.com>
 */
class Cliente
{

    /**
     * Create patient record for client.
     */
    public function saveInsert()
    {
        return function () {
            $patient = new Patient();
            $patient->codcliente = $this->codcliente;
            return $patient->save();
        };
    }

    /**
     * Create patient record for client.
     */
    public function saveUpdate()
    {
        return function () {
            $patient = new Patient();
            if ($patient->loadFromCode($this->codcliente)) {
                return true;
            }

            $patient->codcliente = $this->codcliente;
            return $patient->save();
        };
    }
}
