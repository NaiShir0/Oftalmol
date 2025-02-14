<?php

namespace FacturaScripts\Plugins\Oftalmol\Model;

use FacturaScripts\Core\Model\Base;

/**
 * Description of Notes
 *
 * @author Nai
 */
class Reason extends Base\ModelClass {

    use Base\ModelTrait;

    public $id;
    public $reasonName;
            

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
        return 'oft_reasons';
    }

    /**
     * Returns the url where to see / modify the data.
     *
     * @param string $type
     * @param string $list
     *
     * @return string
     */
    /*public function url(string $type = 'auto', string $list = 'List'): string {
        $list = 'EditExpediente?code=' . $this->idexpediente . '&active=Edit';
        return parent::url($type, $list);
    }*/
}
