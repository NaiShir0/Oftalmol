<?php

namespace FacturaScripts\Plugins\Oftalmol\Model;

use FacturaScripts\Plugins\Oftalmol\src\TestTypes;
use FacturaScripts\Plugins\Oftalmol\src\Constants;

class VisualAcuity extends Base\Test {


    /**
     * Reset the values of all model properties.
     * Set the medical test type.
     */
    #[\Override]
    public function clear() {
        parent::clear();
        $this->idTestType = TestTypes::TEST_TYPE_VISUALACUITY;
        $this->idSpeciality = Constants::SPECIALITE_OPHTALMOLOGY;
        $this->creationDate = date(self::DATE_STYLE);
        $this->creationTime = date(self::HOUR_STYLE);
    }

    #[\Override]
    public static function tableName(): string {
        return 'oft_visualacuities';
    }
}
