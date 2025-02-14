<?php

namespace FacturaScripts\Plugins\Oftalmol\Model;

use FacturaScripts\Core\Model\Base;
use FacturaScripts\Plugins\Oftalmol\src\Constants;

/**
 * Description of Notes
 *
 * @author Nai
 */
class Note extends Base\ModelClass {

    use Base\ModelTrait;

    /** Evolution description.
     *
     * @var string
     */
    public $description;

    /**
     *
     * @var string
     */
    public $creationDate;

    /**
     * Primary key
     *
     * @var type
     */
    public $id;

    /**
     * Link to Expediente model
     *
     * @var int
     */
    public $idExpedient;
    public $idTestType;

    /**
     * Reset the values of all model properties.
     */
    public function clear() {
        parent::clear();
        $this->idSpeciality = Constants::SPECIALITE_OPHTALMOLOGY;
        $this->creationDate = date(self::DATE_STYLE);
        $this->creationTime = date(self::HOUR_STYLE);
    }

    /*
     * Returns the name of the column that is the model's primary key.
     *
     * @Return string
     */

    #[\Override]
    public static function primaryColumn(): string {
        return 'id';
    }

    /**
     * Returns the name of the table that uses this model.
     *
     * @return string
     */
    #[\Override]
    public static function tableName(): string {
        return 'oft_notes';
    }

    /**
     * Returns the url where to see / modify the data.
     *
     * @param string $type
     * @param string $list
     *
     * @return string
     */
    public function url(string $type = 'auto', string $list = 'List'): string {
        $list = 'EditExpedient?code=' . $this->idExpedient . '&active=Edit';
        return parent::url($type, $list);
    }
}
