<?php
namespace FacturaScripts\Plugins\Oftalmol\Model;

use FacturaScripts\Core\Model\Base;


class Expedient extends Base\ModelClass {
    use Base\ModelTrait;
    
    /**
     * Strings variables
     * @var string
     */
    public $releaseDate;
    public $creationDate;
    public $modificationDate;

    /**
     * Primary keyS
     *
     * @var int
     */
    public $id;

    /**
     * Link to Motivo model
     *
     * @var int
     */
    public $idReason;
     /**
     * Link to Patient model.
     *
     * @var string
     */
    public $codcliente;
    
    public function clear() {
        parent::clear();
        $this->creationDate = date('d-m-Y');
        $this->modificationDate = date('d-m-Y');
        
    }
    
    #[\Override]
    public static function primaryColumn(): string {
        return 'id';
    }

    #[\Override]
    public static function tableName(): string {
        return 'oft_expedients';
    }
}
