<?php

namespace FacturaScripts\Plugins\Oftalmol\Model;
use FacturaScripts\Core\Model\Base\ModelTrait;

use FacturaScripts\Plugins\Oftalmol\src\TestTypes;
use FacturaScripts\Plugins\Oftalmol\src\Constants;


class Autorefractometer extends Base\Test {

    use ModelTrait;

    /**
     * Reset the values of all model properties.
     * Set the medical test type.
     */
    public function clear() {
        parent::clear();
        $this->idTestType = TestTypes::TEST_TYPE_AUTOREFRACTOMETER;
        $this->idSpeciality = Constants::SPECIALITE_OPHTALMOLOGY;
        $this->date = date(self::DATETIME_STYLE);
    }
}
