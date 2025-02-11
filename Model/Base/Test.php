<?php
namespace FacturaScripts\Plugins\Oftalmol\Model\Base;

use FacturaScripts\Core\Model\Base;

class Test extends Base\ModelClass {
    
    use Base\ModelTrait;
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
    public static function primaryColumn(): string {
    }

    #[\Override]
    public static function tableName(): string {
        return '';
    }
}
