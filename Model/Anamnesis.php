<?php

namespace FacturaScripts\Plugins\Oftalmol\Model;

use FacturaScripts\Core\Model\Base;

/**
 * Description of Anamnesis
 *
 * @author Nai
 */
class Anamnesis extends Base\ModelClass {

    use Base\ModelTrait;

    /**
     * Evolution description.
     *
     * @var string
     */
    public $Evolution;

    /**
     *
     * @var string
     */
    public $fecha;

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
    public $idexpediente;

    /**
     * Reset the values of all model properties.
     */
    public function clear() {
        parent::clear();
        $this->fecha = date(self::DATE_STYLE);
    }

    /**
     * This function is called when creating the model table. Returns the SQL
     * that will be executed after the creation of the table. Useful to insert values
     * default.
     *
     * @return string
     */
    public function install(): string {
        new Expediente();
        return parent::install();
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
        return 'oft_anamnesis';
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
        $list = 'EditExpediente?code=' . $this->idexpediente . '&active=Edit';
        return parent::url($type, $list);
    }
}
