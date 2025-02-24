<?php

namespace FacturaScripts\Plugins\Oftalmol\Model\Base;

use FacturaScripts\Core\Model\Base;
use FacturaScripts\Core\Session;
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
    public $nick;

    #[\Override]
    public function clear() {
        parent::clear();
        $this->idSpeciality = Constants::SPECIALITE_OPHTALMOLOGY;
        $this->creationDate = date(self::DATE_STYLE);
        $this->creationTime = date(self::HOUR_STYLE);
        $this->modificationDate = date(self::DATE_STYLE);
        $this->modificationTime = date(self::HOUR_STYLE);
        $this->nick = Session::user()->nick;
    }

    #[\Override]
    public function delete(): bool {
        // add audit log
        Tools::log(Constants::LOG_OFTALMOL)->warning('testDeleted', [
            '%tipoPrueba%' => $this->modelClassName(),
            '%idPrueba%' => $this->primaryColumnValue(),
            '%nombrePrueba%' => $this->primaryDescription(),
            //'model-class' => $this->modelClassName(),
            //'model-code' => $this->primaryColumnValue(),
            'DatosPrueba' => $this->toArray()
        ]);
        return parent::delete();
    }

    #[\Override]
    public function save(): bool {
        // add audit log
        /*Tools::log(Constants::LOG_OFTALMOL)->info('testUpdated', [
            '%tipoPrueba%' => $this->modelClassName(),
            '%idPrueba%' => $this->primaryColumnValue(),
            '%nombrePrueba%' => $this->primaryDescription(),
            //'model-class' => $this->modelClassName(),
            //'model-code' => $this->primaryColumnValue(),
            'model-data' => $this->toArray()
        ]);*/
        return parent::save();
    }
}
