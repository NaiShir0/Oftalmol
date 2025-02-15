<?php

/**
 * This file is part of Oftalmologia plugin for FacturaScripts.
 * FacturaScripts Copyright (C) 2015-2022 Carlos Garcia Gomez <carlos@facturascripts.com>
 * Oftalmologia   Copyright (C) 2022-2022 Clinica Castillo <jquingarcia@gmail.com>
 *                Copyright (C) 2022-2022 Jose Antonio Cuello Principal <yopli2000@gmail.com>
 *
 * This program and its files are under the terms of the license specified in the LICENSE file.
 */

namespace FacturaScripts\Plugins\Oftalmol\Model;

use FacturaScripts\Plugins\Oftalmol\src\TestTypes;

class Shiascopy extends Base\Test {

    /**
     * Reset the values of all model properties.
     * Set the medical test type.
     */
    public function clear() {
        parent::clear();
        $this->idTestType = TestTypes::TEST_TYPE_SHIASCOPY;
    }

    #[\Override]
    public static function tableName(): string {
        return 'oft_refractions';
    }
}
