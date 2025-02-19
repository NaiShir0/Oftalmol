<?php

namespace FacturaScripts\Plugins\Oftalmol\Model;

use FacturaScripts\Plugins\Oftalmol\src\TestTypes;

class Autorefractometer extends Base\Test {


    /**
     * Reset the values of all model properties.
     * Set the medical test type.
     */
    #[\Override]
    public function clear() {
        parent::clear();
        $this->idTestType = TestTypes::TEST_TYPE_AUTOREFRACTOMETER;
    }

    #[\Override]
    public static function tableName(): string {
        return 'oft_refractions';
    }
}
