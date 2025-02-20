<?php

namespace FacturaScripts\Plugins\Oftalmol\Model;

use FacturaScripts\Plugins\Oftalmol\src\TestTypes;
use FacturaScripts\Plugins\Oftalmol\Model\Base\Test;
use FacturaScripts\Core\Model\Base;

class Autorefractometer extends Test  {
    use Base\ModelTrait;

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
        #[\Override]
    public static function primaryColumn(): string {
             \FacturaScripts\Core\Tools::log()->warning('mi putisima madreeeeeeeeeeeeeeeeeeeeeeee refactometer');
        return 'id';
    }
}
