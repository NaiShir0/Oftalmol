<?php

namespace FacturaScripts\Plugins\Oftalmol\Model;

use FacturaScripts\Plugins\Oftalmol\src\TestTypes;
use FacturaScripts\Plugins\Oftalmol\Model\Base\Test;
use FacturaScripts\Core\Model\Base;

class VisualAcuity extends Test {

    use Base\ModelTrait;

    public $ODfarSCnote;
    public $OSfarSCnote;
    public $FarSCnote;
    public $ODfarCCnote;
    public $OSfarCCnote;
    public $FarCCnote;
    public $FarNote;
    
    public $ODcloseSCnote;
    public $OScloseSCnote;
    public $CloseSCnote;
    public $ODcloseCCnote;
    public $OScloseCCnote;
    public $CloseCCnote;
    public $CloseNote;

    /**
     * Reset the values of all model properties.
     * Set the medical test type.
     */
    #[\Override]
    public function clear() {
        parent::clear();
        $this->idTestType = TestTypes::TEST_TYPE_VISUALACUITY;
    }

    #[\Override]
    public static function tableName(): string {

        return 'oft_visualacuities';
    }

    #[\Override]
    public static function primaryColumn(): string {
        return 'id';
    }

    #[\Override]
    public function save(): bool {
        //validate();
        return parent::save();
    }
}
