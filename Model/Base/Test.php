<?php

namespace FacturaScripts\Plugins\Oftalmol\Model\Base;

use FacturaScripts\Core\Model\Base;
use FacturaScripts\Plugins\Oftalmol\src\Constants;

abstract class Test extends Base\ModelClass {


    /**
     *
     * @var int
     */
    public $id;

    /**
     *
     * @var int
     */
    public $idSpeciality;

    /**
     *
     * @var int
     */
    public $idTestType;

    /**
     *
     * @var int
     */
    public $idExpedient;

    /**
     *
     * @var date
     */
    public $date;

    /**
     *
     * @var string
     */
    public $generalNotes;

    /**
     *
     * @var string
     */
    public $professionalNote;

    #[\Override]
    public function clear() {
        parent::clear();
        $this->idSpeciality = Constants::SPECIALITE_OPHTALMOLOGY;
        $this->creationDate = date(self::DATE_STYLE);
        $this->creationTime = date(self::HOUR_STYLE);
        $this->modificationDate = date(self::DATE_STYLE);
        $this->modificationTime = date(self::HOUR_STYLE);
    }

   
}
